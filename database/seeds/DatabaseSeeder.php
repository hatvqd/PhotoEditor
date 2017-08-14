<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(ParentCategorySeeder::class);
    	$this->call(CategoryTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
    }
}
