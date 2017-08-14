<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('photos')->delete();

        DB::table('photos')->insert([
    		[
	        	'name' => "book.jpg",
	        	'path' => '/montage/birthday',
	            'width' => '600',
	            'height' => '600',
	            'frame_w' => '60',
	            'frame_h' => '80',
	            'category_id' => '2'
        	],
        	[
	        	'name' => "conference.jpg",
	        	'path' => '/montage/',
	            'width' => '600',
	            'height' => '600',
	            'frame_w' => '60',
	            'frame_h' => '80',
	            'category_id' => '3'
        	]
        ]);
    }
}
