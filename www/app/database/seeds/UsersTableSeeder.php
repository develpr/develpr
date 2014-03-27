<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
        DB::table('users')->delete();

        User::create(array(
            'email'         => 'kevin@develpr.com',
            'password'      => Hash::make('password123'),
            'first_name'    => 'Kevin',
            'last_name'     => 'Mitchell'
        ));

	}

}