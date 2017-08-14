<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//DB::table('categories')->delete();

    	DB::table('categories')->insert([
    		[
	        	'name' => "Tình yêu",
	            'code' => 'love',
	            'image_path' => 'montage/love/portrait.jpg',
	            'is_enable' => '1',
	            'parent_category_id' => '1'
        	],
        	[
	        	'name' => "Sinh nhật",
	        	'code' => 'birthday',
	        	'image_path' => 'montage/birthday/cover-wood-frame.jpg',
	            'is_enable' => '1',
	            'parent_category_id' => '1'
        	],
        	[
	        	'name' => "Trẻ em",
	        	'code' => 'child',
	        	'image_path' => 'montage/child/painting.jpg',
	            'is_enable' => '1',
	            'parent_category_id' => '1'
       		],
        	[
	        	'name' => "Thiên nhiên",
	        	'code' => 'natural',
	        	'image_path' => 'montage/nature/street-art.jpg',
	            'is_enable' => '1',
	            'parent_category_id' => '1'
       		],
        	[
	        	'name' => "Noel",
	        	'code' => 'noel',
	            'image_path' => '/photo/montage/noel/street-art.jp',
	            'is_enable' => '1',
	            'parent_category_id' => '1'
       		]
        ]);
    }
}
