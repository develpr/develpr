<?php namespace Develpr;

use \Redis;
use \Configuration;

/**
 * Class Setting
 * @package Develpr
 */
class Setting{

	public function get($key)
	{
		$configuration = Redis::get('configuration.' . strtolower($key));

		if(!$configuration)
		{
			$configuration = Configuration::where('key', '=', $key)->first();
			if($configuration)
            {
                Redis::set('configuration.' . strtolower($key), $configuration->value);
                $configuration = $configuration->value;
            }
        }

		if(is_null($configuration))
			return false;

		return $configuration;

	}

}