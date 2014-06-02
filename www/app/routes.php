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
	return View::make('home')->with(array(
        'project' => Project::random()->published()->first(),
        'post' => Post::orderBy('created_at', 'desc')->published()->first()
    ));
});


Route::get('/download-projects', function(){

	$phindle = new Develpr\Phindle\Phindle(array(
		'title' => "Kevin Mitchell's Projects from Develpr.com",
		'publisher' => "Develpr",
		'creator' => 'Kevin Mitchell',
		'language' => \Develpr\Phindle\OpfRenderer::LANGUAGE_ENGLISH_US,
		'subject' => 'Computers',
		'description' => 'A number of projects that Kevin Mitchell has completed.',
		'path'	=> storage_path() . '/ebooks',
		'isbn'  => '123456789123456',
		'staticResourcePath'    => public_path(),
		'cover'	=> '/Users/shoelessone/Sites/phindle/www/public/img/me_mohawk.jpg',
		'kindlegenPath'		=> '/usr/local/bin/kindlegen',
        'downloadImages'    => true,
	));

	$projects = Project::all();

	foreach($projects as $project)
	{
		/** @var Project $project */

		/** @var Illuminate\View\View $html */
		$html = View::make('projects.book')->with(array('project' => $project))->render();

		$content = new \Develpr\Phindle\Content();

		$content->setHtml($html)->setTitle($project->title)->setPosition(1)->setUniqueIdentifier('project_' . $project->id);

		$phindle->addContent($content);

	}

	$phindle->process();

    return Response::download(storage_path() . '/ebooks/' . $phindle->getAttribute('uniqueId') . '.mobi', 'Kevin_Mitchell-Develpr-Projects.mobi');

});

Route::get('/blog/{slug}', function($slug){

	if(is_numeric($slug))
		$post = Post::find($slug);
	if(!is_numeric($slug) || !$post) //it's possible that the title was numeric
	{
		$slug = trim(strtolower($slug));

		$post = Post::where('slug', '=', $slug)->firstOrFail();
	}

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

Route::get('/kevin', function(){
    return View::make('kevin');
});
Route::get('/kev', function(){
    return Redirect::to('/kevin', 301);
});
Route::get('/kevinmitchell', function(){
    return Redirect::to('/kevin', 301);
});
Route::get('/kevin-mitchell', function(){
   return Redirect::to('/kevin', 301);
});

Route::get('/contact', function(){
	return View::make('contact');
});

Route::post('/contact', function(){

	//if this was set, then we know that somebody either unhid it, or a robot filled out this form.
	//aka honeypot. Not perfect, but yolo
	if(Input::has('human'))
		return Redirect::to('/contact');

	$validator = Validator::make(
		array(
			'email' => Input::get('email'),
			'name' => Input::get('name'),
			'message' => Input::get('message'),
			'verify'	=> Input::get('verify')
		),
		array(
			'email' => 'required|email',
			'name' => 'required',
			'message' => 'required|min:8',
			'verify'	=> 'required'
		)
	);

	if($validator->fails())
		return Redirect::to('/contact')->withErrors($validator);

	$input = Input::all();
	Mail::send('emails.contact', Input::all(), function($message) use ($input)
	{
		$message->to($input['email'], $input['name'])->subject('Message from Develpr.com Contact form');
	});

    return Redirect::to('/contact')->with(array('success' => "Sent!"));
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
    Route::put('/configurations', 'ConfigurationsController@massUpdate');
});


Route::get('sitemap', function(){

	// create new sitemap object
	$sitemap = App::make("sitemap");

	// set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
	// by default cache is disabled
	$sitemap->setCache(false);

	$posts = Post::orderBy('created_at', 'desc')->get();
	$projects = Project::orderBy('created_at', 'desc')->get();

	$first = $posts->first();

	// add item to the sitemap (url, date, priority, freq)
	$sitemap->add(URL::to('/'), $first->created_at, '1.0', 'weekly');
	$sitemap->add(URL::to('/kevin'), Configuration::find(4)->modified_at, '0.9', 'monthly');

	// add every post to the sitemap
	foreach ($posts as $post)
	{
		$sitemap->add($post->getUrl(), $post->modified_at, .6, "weekly");
	}

	// add every project to the sitemap
	foreach ($projects as $project)
	{
		$sitemap->add($project->getUrl(), $project->modified_at, .8, "monthly");
	}

	// show your sitemap (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
	return $sitemap->render('xml');

});
