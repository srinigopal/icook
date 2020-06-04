<?php

//index
Route::get('/', '_Admin\IndexController@index')->name('admin.index');


Route::prefix('organisation')->group(function () {
	
    Route::get('/', '_Admin\OrganisationController@index')->name('admin.organisation.index');
    Route::get('/add', '_Admin\OrganisationController@add')->name('admin.organisation.add');
    Route::get('/edit/{id}', '_Admin\OrganisationController@edit')->name('admin.organisation.edit');
	
});

Route::prefix('cuisine')->group(function () {
	
    Route::get('/', '_Admin\CuisineController@index')->name('admin.cuisine.index');
    Route::get('/add', '_Admin\CuisineController@add')->name('admin.cuisine.add');
	
});


Route::prefix('category')->group(function () {
	
    Route::get('/', '_Admin\CategoryController@index')->name('admin.category.index');
    Route::get('/add', '_Admin\CategoryController@add')->name('admin.category.add');
	
});


Route::prefix('food')->group(function () {
	
    Route::get('/', '_Admin\FoodController@index')->name('admin.food.index');
    Route::get('/add', '_Admin\FoodController@add')->name('admin.food.add');
	
});


Route::get('users', '_Admin\UserController@index')->name('admin.users.index');