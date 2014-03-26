<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/projects/{slug}', function($slug){

    $slug = trim(strtolower($slug));
    $project = Project::where('slug', '=', $slug)->firstOrFail();

    return View::make('projects.show', array('project' => $project));

});

Route::get('/blog/{slug}', function($slug){

    $slug = trim(strtolower($slug));
    $post = Post::where('slug', '=', $slug)->firstOrFail();

    return View::make('posts.show', array('post' => $post));

});

Route::get('/blog', function($slug){

	return View::make('posts.index', array('projects' => Posts::all()));

});

Route::resource('posts', 'PostsController');
Route::resource('projects', 'ProjectsController');


/**
 *
function slug($title, $separator = '-', $removeWords = false)
{

$title = static::ascii($title);

// Convert all dashes/undescores into separator
$flip = $separator == '-' ? '_' : '-';

$title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

// Remove all characters that are not the separator, letters, numbers, or whitespace.
$title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

//If an array of words to be removed was passed in
if($removeWords !== false && is_array($removeWords))
{
$title = explode(' ', $title);
$removeWords = array_map('strtolower', $removeWords);
$title = array_diff($title, $removeWords);
$title = implode($separator, $title);
}

// Replace all separator characters and whitespace by a single separator
$title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

return trim($title, $separator);
}
 */
