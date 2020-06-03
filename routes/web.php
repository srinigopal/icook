<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');
//public routes
foreach (File::allFiles(__DIR__.'/_public') as $file) {
    require $file->getPathname();
}

//routes requiring auth
Route::group(['middleware' => [  'auth:web' ]], function() {
	
	

  //admin routes - organisation admin role
    Route::group([
        'prefix' => 'admin'
    ], function() {

        //admin routes
        foreach (File::allFiles(__DIR__.'/_admin') as $file) {
            require $file->getPathname();
        }

    });

   //admin routes - organisation admin role
    Route::group([
        'prefix' => 'management'
    ], function() {

        //admin routes
        foreach (File::allFiles(__DIR__.'/_management') as $file) {
            require $file->getPathname();
        }

    });
   
   
   
   
   
//Route::get('/admin/organization', 'OrganizationController@index')->name('organisation.list');
//Route::get('/admin/organization/add', 'OrganizationController@store')->name('organisation.add');
});