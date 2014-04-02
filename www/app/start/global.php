<?php

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

Project::updating(function($project){

    $originalSlug = $project->slug;

	$slug = Str::slug($project->title);
    $project->slug = $slug;

	//Need to add a rewrite!
	if($originalSlug != $slug)
	{
		$redirect = new Develpr\Redirect;
		$redirect->source = $originalSlug;
		$redirect->resource_id = $project->id;
		$redirect->type = 'project';

		$redirect->save();
	}
});

Post::updating(function($post){
	$originalSlug = $post->slug;

    $slug = Str::slug($post->title);
    $post->slug = $slug;

	//Need to add a rewrite!
	if($originalSlug != $slug)
	{
		$redirect = new Develpr\Redirect;
		$redirect->source = $originalSlug;
		$redirect->resource_id = $post->id;
		$redirect->type = 'post';

		$redirect->save();
	}

});


Develpr\Redirect::saved(function($redirect){
	Redis::set('redirect.' . $redirect->type . ":". $redirect->source, $redirect->resource_id);
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
 * Handle 404
 */
App::missing(function($exception)
{
    return Response::view('errors.missing', array(), 404);
});


