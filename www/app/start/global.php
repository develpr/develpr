<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';

/**
 * Handle creationg of slugs
 */
Project::creating(function($project){
    $slug = Str::slug($project->title);
    $project->slug = $slug;
});

Post::creating(function($post){
    $slug = Str::slug($post->title);
    $post->slug = $slug;
});

//todo: work through redirect logic, redundancy is present!!

Project::saved(function($project){
    $redirect = Develpr\Redirect::where('source', '=', $project->getUrl())->first();
    if($redirect)
        $redirect->delete();
    Redis::del('redirect:' . $project->getUrl());
});

Post::saved(function($post){
    $redirect = Develpr\Redirect::where('source', '=', $post->getUrl())->first();
    if($redirect)
        $redirect->delete();
    Redis::del('redirect:' . $post->getUrl());
});

Project::updating(function($project){

    $originalSlug = $project->slug;
    $originalUrl = $project->getUrl();

	$slug = Str::slug($project->title);
    $project->slug = $slug;

	//Need to add a rewrite!
	if($originalSlug != $slug)
	{
		//We aren't getting too fancy, and if you've changed multiple items to have the same title
		//Then we're going to take over the previous redirect - old links may point to the wrong
		//new content, but at least there won't be a 404.
		$redirect = Develpr\Redirect::where('source', '=', $originalUrl)->first();
		
		if(!$redirect)		
			$redirect = new Develpr\Redirect;
		
		$redirect->source = $originalUrl;
		$redirect->resource_id = $project->id;
		$redirect->type = 'project';

		$redirect->save();
	}
});

Post::updating(function($post){
	$originalSlug = $post->slug;
    $originalUrl = $post->getUrl();

    $slug = Str::slug($post->title);
    $post->slug = $slug;

	//Need to add a rewrite!
	if($originalSlug != $slug)
	{
		//We aren't getting too fancy, and if you've changed multiple items to have the same title
		//Then we're going to take over the previous redirect - old links may point to the wrong
		//new content, but at least there won't be a 404.
		$redirect = Develpr\Redirect::where('source', '=', $originalUrl)->first();
		
		if(!$redirect)		
			$redirect = new Develpr\Redirect;

		$redirect->source = $originalUrl;
		$redirect->resource_id = $post->id;
		$redirect->type = 'post';

		$redirect->save();
	}

});


Develpr\Redirect::saved(function($redirect){
    Redis::del('redirect:' . $redirect->source);
	Redis::set('redirect:' . $redirect->source, $redirect->resource_id);
});

Configuration::saved(function($configuration){
    Redis::set('configuration.' . strtolower($configuration->key), $configuration->value);
    return true;
});

Configuration::deleted(function($configuration){
    Redis::del('configuration.' . strtolower($configuration->key));
    return true;
});

/**
 * We will handle missing models by checking to see if a previous title existed with the slug we are looking for
 */
App::error(function(ModelNotFoundException $e)
{
    $path = Request::path();

    $id = Redis::get('redirect:/' . $path);

    if(is_null($id))
        return Response::view('errors.missing', array(), 404);

    //todo: this could be improved - checking a string on an exception we don't control feels "loose"
    if($e->getModel() == "Project")
        $resource = Project::findOrFail($id);
    else if($e->getModel() == "Post")
        $resource = Post::findOrFail($id);

    if(!$resource)
        return Response::view('errors.missing', array(), 404);

    return Redirect::to($resource->getUrl(), 301);

});

/**
 * Handle 404
 */
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});



