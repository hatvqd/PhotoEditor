<?php

use Illuminate\Database\Seeder;

class ParentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parent_categories')->delete();

        DB::table('parent_categories')->insert([
    		[
	        	'name' => "Chèn ảnh",
	            'code' => 'montage',
	            'is_enable' => '1'
        	]
        ]);
    }
}
