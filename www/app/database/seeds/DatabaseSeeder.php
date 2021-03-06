<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		if( App::environment() === 'development' )
    		{
        		$this->call('PostsTableSeeder');
        		$this->call('ProjectsTableSeeder');
		}

        	$this->call('UsersTableSeeder');
        	$this->call('ConfigurationsTableSeeder');
	}

}
