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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin','as' => 'admin.'], function(){

    Route::get('categories',['as' => 'categories.index','uses' => 'CategoriesController@index']);
    Route::get('categories/create',['as' => 'categories.create','uses' => 'CategoriesController@create']);
    Route::post('categories/store',['as' => 'categories.store','uses' => 'CategoriesController@store']);
    Route::get('categories/edit/{id}',['as' => 'categories.edit','uses' => 'CategoriesController@edit']);
    Route::post('categories/update/{id}',['as' => 'categories.update','uses' => 'CategoriesController@update']);
    Route::get('categories/destroy/{id}',['as' => 'categories.destroy','uses' => 'CategoriesController@destroy']);

});