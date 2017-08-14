<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('image_path')->nullable();
            $table->integer('is_enable')->nullable();
            $table->integer('parent_category_id')->unsigned();;
            
            $table->timestamps();
        });
        
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent_category_id')->references('id')->on('parent_categories');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
