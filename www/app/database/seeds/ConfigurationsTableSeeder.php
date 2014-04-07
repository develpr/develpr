<?php

class ConfigurationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('configurations')->delete();

		Configuration::create(array(
			'key'		=> 'photo',
			'value'		=> '/img/me.png',
			'user_id'	=> 1,
			'visible'	=> true
		));

		Configuration::create(array(
			'key'		=> 'looking',
			'value'		=> '0',
			'user_id'	=> 1,
			'visible'	=> true
		));

		Configuration::create(array(
			'key'		=> 'intro',
			'value'		=> "Hi, I'm Kevin. I'm a software engineer living Oakland California. I occasionally have something useful to say or interesting to share, and this is the place for me to do it.",
			'user_id'	=> 1,
			'visible'	=> true
		));
	}

}