<?php

class PostsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $post = new Post;

        $post->fill(Input::all());

        $post->user_id = Auth::user()->id;

        $post->save();

        return Redirect::to('/blog/' . $post->slug);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        if(is_numeric($id))
            $post = Post::findOrFail($id);
        else
        {
            $slug = trim(strtolower($id));
            $post = Post::where('slug', '=', $slug)->firstOrFail();
        }

        return View::make('posts.edit', array('post' => $post));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
        $post = Post::findOrFail($id);

        $post->fill(Input::all());

        $post->user_id = Auth::user()->id;

        $post->save();

        return Redirect::to('/blog/' . $post->slug);

    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}