<?php

class ConfigurationsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('configurations')->delete();

		Configuration::create(array(
			'key'		=> 'photo',
			'value'		=> '/img/me.jpg',
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

        Configuration::create(array(
            'key'		=> 'aboutKevin',
            'value'		=> "<p>Hi, I'm Kevin. I'm a software engineer living Oakland California. I occasionally have something useful to say or interesting to share, and this is the place for me to do it.</p>",
            'user_id'	=> 1,
            'visible'	=> true
        ));

        Configuration::create(array(
            'key'		=> 'aboutKevinLooking',
            'value'		=> "<p>And I'm looking!</p>",
            'user_id'	=> 1,
            'visible'	=> true
        ));
	}

}