<?php

class PostsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('posts')->delete();

        Post::create(array(
            'title'		=> 'Making Morsel: Python for the Arduino Yun',
            'body' 	    => '<p>Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.</p>',
            'slug'		=> Str::slug('Making Morsel: Python for the Arduino Yun'),
            'teaser'	=> "<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo.</p>",
            'user_id'   => 1,
            'published' => true
        ));
	}

}