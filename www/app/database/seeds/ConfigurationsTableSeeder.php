<?php

class ConfigurationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('configurations')->delete();

		Configuration::create(array(
			'key'		=> 'photo',
			'value'		=> '/uploads/images/me.png',
			'user_id'	=> 1,
			'visible'	=> true
		));

		Configuration::create(array(
			'key'		=> 'looking',
			'value'		=> '1',
			'user_id'	=> 1,
			'visible'	=> true
		));
	}

}