<?php

class ConfigurationsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$configurations = Configuration::all();

		return View::make('configurations.edit')->with(array('configurations' => $configurations));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $configuration = new Configuration;
        $configuration->user_id = Auth::user()->id;
        $configuration->key = Input::get('key');
        $configuration->visible = true;

        $configuration->save();

        return Response::json(true);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

	}

    /**
     * Updates the specified resources in storage.
     *
     * @return Response
     */
    public function massUpdate()
    {
        foreach(Input::all() as $key => $newValue)
        {
            if(Setting::get($key) !== false && $newValue !== Setting::get($key))
            {
                $configuration = Configuration::where('key', '=', strtolower($key))->first();  //todo: do this better

                //If no configuration was loaded, then this configuration doesn't exist so shouldn't be updated
                if(!$configuration)
                    continue;

                $configuration->value = $newValue;
                $configuration->save();
            }
        }

        return Redirect::to('/configurations');
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