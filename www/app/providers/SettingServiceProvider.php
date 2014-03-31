<?php namespace Develpr;

use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider {

	public function register()
	{
		$this->app['setting'] = $this->app->share(function($app)
		{
			return new Setting;
		});
	}

}