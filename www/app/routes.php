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
	$test = Setting::get('photo');

	return View::make('home');
});


Route::get('/blog/{slug}', function($slug){

    $slug = trim(strtolower($slug));
    $post = Post::where('slug', '=', $slug)->firstOrFail();

    return View::make('posts.show', array('post' => $post));

});

Route::get('/blog', function(){

	//todo: make pagination default a config value
    if(Auth::check())
        $posts = Post::paginate(6);
    else
        $posts = Post::where('published', '=', true)->paginate(6);

	return View::make('posts.index', array('posts' => $posts));

});

Route::resource('posts', 'PostsController');
Route::resource('projects', 'ProjectsController');


Route::get('/contact', function(){
	return View::make('contact');
});

Route::post('/contact', function(){

});

Route::get('/login', function(){
   return View::make('login');
});

Route::post('/login', function(){
    if(Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
    {
        return Redirect::intended('/');
    }
    else
    {
        return Redirect::to('/login')->with(Input::all());
    }
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('/');
});

//Routes that are only accessible to somebody logged in
Route::group(array('before' => 'auth'), function()
{
    Route::get('/files', function(){
       return View::make('admin/files');
    });

    Route::post('/files', function(){

        $basePath = public_path() . Config::get('app.develpr.imagePath');

        if (Input::hasFile('image'))
        {
            if(File::exists($basePath . Input::file('image')->getClientOriginalName()) && !Input::get('override'))
                throw new \Symfony\Component\HttpFoundation\File\Exception\FileException;
            else
            {
                Input::file('image')->move($basePath, Input::file('image')->getClientOriginalName());
            }
            return Redirect::to('/files');
        }
    });

    //Handle configuration options
    Route::resource('configurations', 'ConfigurationsController');

});
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
