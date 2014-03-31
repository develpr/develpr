<?php namespace Develpr\Facades;

use Illuminate\Support\Facades\Facade;

class Setting extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'setting';
	}

}