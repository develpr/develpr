<?php

class ProjectsController extends \BaseController {

    public function __construct()
    {
        $this->beforeFilter('auth', array('except' => array('index', 'show')));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//todo: make pagination default size a config value

        if(Auth::check())
            $projects = Project::orderBy('created_at', 'desc')->paginate(6);
        else
            $projects = Project::orderBy('created_at', 'desc')->where('published', '=', true)->paginate(6);


        return View::make('projects.index', array('projects' => $projects));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projects.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $project = new Project;

        $project->fill(Input::all());

        $project->user_id = Auth::user()->id;

        $project->save();

        return Redirect::to('/projects/' . $project->slug);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        if(is_numeric($id))
            $project = Project::find($id);
        if(!is_numeric($id) || !$project) //it's possible that the title was numeric
        {
            $slug = trim(strtolower($id));
            $project = Project::where('slug', '=', $slug)->firstOrFail();
        }

        return View::make('projects.show', array('project' => $project));
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
            $project = Project::findOrFail($id);
        else
        {
            $slug = trim(strtolower($id));
            $project = Project::where('slug', '=', $slug)->firstOrFail();
        }

        return View::make('projects.edit', array('project' => $project));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$project = Project::findOrFail($id);

        $project->fill(Input::all());

        $project->user_id = Auth::user()->id;

        $project->save();

        return Redirect::to('/projects/' . $project->slug);

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