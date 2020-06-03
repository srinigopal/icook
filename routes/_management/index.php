<?php

//index
Route::get('/', '_Management\IndexController@index')->name('management.index');


Route::prefix('organisation')->group(function () {
	
    Route::get('/', '_Management\OrganisationController@index')->name('management.organisation.index');
    Route::get('/add', '_Management\OrganisationController@add')->name('management.organisation.add');
	
});

Route::prefix('cuisine')->group(function () {
	
    Route::get('/', '_Management\CuisineController@index')->name('management.cuisine.index');
    Route::get('/add', '_Management\CuisineController@add')->name('management.cuisine.add');
	
});


Route::prefix('category')->group(function () {
	
    Route::get('/', '_Management\CategoryController@index')->name('management.category.index');
    Route::get('/add', '_Management\CategoryController@add')->name('management.category.add');
	
});


Route::prefix('food')->group(function () {
	
    Route::get('/', '_Management\FoodController@index')->name('management.food.index');
    Route::get('/add', '_Management\FoodController@add')->name('management.food.add');
	
});


