<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ProjectsTableSeeder extends Seeder {

	public function run()
	{
        DB::table('projects')->delete();

        $data = array(
            'title'		=> 'Making Morsel: Python for the Arduino Yun',
            'body' 	    => '<p>Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.</p>',
            'teaser'	=> "<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo.</p>",
            'repo'      => 'http://www.github.com/develpr/develpr-static',
            'user_id'   => 1,
            'published' => true,
            'quote'     => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo.'
        );

		$words = array('A', 'Fate', 'Ferry', 'The', "Hello", "Cat", "Kevin", "TYPO3", "German", "Facebook", "Virtual", "Telephone", "Apple", "Computers", "Programming", "PHP", "Africa", "SCUBA");

		$elements = array('<p>Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>','<p>Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Nulla vitae elit libero, a pharetra augue. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus.</p>', '<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo.</p>', '<p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam quis risus eget urna mollis ornare vel eu leo.</p>', '<img src="http://farm4.staticflickr.com/3738/12898917765_7bfdd9c341_b.jpg" alt="" />', '<img src="http://farm4.staticflickr.com/3672/12732908365_897ebabc2d_b.jpg" alt="" />');

		$teasers = array('<p>Maecenas sed diam eget.</p>','<p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>','<p>Donec ullamcorper nulla non metus auctor fringilla. Maecenas sed diam eget risus varius blandit sit amet non magna.</p>', '<img src="http://farm4.staticflickr.com/3738/12898917765_7bfdd9c341_b.jpg" alt="" />', '<img src="http://farm4.staticflickr.com/3672/12732908365_897ebabc2d_b.jpg" alt="" />', '<img src="http://farm3.staticflickr.com/2848/12729748115_e67154d376_b.jpg". alt="" />');


		for($i = 0; $i < 830; $i++)
		{
			$titleCount = rand(6, 12);
			$title = "";
			for($j = 0; $j < $titleCount; $j++)
			{
				$title .= $words[rand(0,count($words)-1)] . ' ';
			}

			$content = "";
			$contentCount = rand(3, 7);
			for($j = 0; $j < $contentCount; $j++)
			{
				$content .= $elements[rand(0,count($elements)-1)] . ' ';
			}

			$teaser = "";
			$teaserCount = rand(2, 3);
			for($j = 0; $j < $teaserCount; $j++)
			{
				$teaser .= $teasers[rand(0,count($teasers)-1)] . ' ';
			}


			$data['title'] = $title;
			$data['body'] = $content;
			$data['teaser'] = $teaser;

			Project::create($data);

		}

//        $table->string('title')->unique();
//        $table->string('slug')->unique();
//        $table->text('teaser');
//        $table->text('body');
//        $table->integer('user_id');
//        $table->boolean('published')->default(0);
//        $table->string('repo');
//        $table->text('quote');
	}

}