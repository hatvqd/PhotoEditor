<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return "vu quoc dat";
});

Route::get('/welcome', function() {
    return view('welcome');
});


//Route::resource('photo', 'PhotoController');

Route::get('photo/process/{parentcategory}/{category}/{fx}', 
		['as' => 'photo.processImage', 'uses' => 'PhotoController@processImage']);

Route::get('photo/parentcategory/', 
		['as' => 'photo.parentcategory', 'uses' => 'PhotoController@getAllParentCategory']);

Route::get('photo/categroy/{parent_category_id}/parentcategory', 
		['as' => 'photo.categroy.parentcategory', 'uses' => 'PhotoController@getCategoryByParentCategory']);

Route::get('photo/{category_id}/category', 
		['as' => 'photo.by.cateogry', 'uses' => 'PhotoController@getPhotosByCategory']);

Route::get('photo/{photo_id}/show', 
		['as' => 'photo.', 'uses' => 'PhotoController@showPhoto']);

Route::post('photo/processimage', 
		['as' => 'photo.processimage2', 'uses' => 'PhotoController@processImage2']);
