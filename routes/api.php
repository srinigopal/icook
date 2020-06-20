<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([ 'middleware' => 'auth:sanctum'], function () {
		
		Route::get('/config', 'API\_Private\ConfigProfile');

		/*Route::get('/config', function () {

			$payload = collect([
				'user' => Auth::user()->getConfig()
			]);

			return $payload;
		});
		*/
	
		Route::get('/user', function () {

			$payload = collect([
				'user' => Auth::user()->getConfig()
			]);

			return $payload;
		});
	// organization	
      
		
});
		Route::group(['prefix' => 'organisation'], function () {
			
			Route::get('/', 'API\_Private\Organisation\OrganisationController@index');	
			Route::get('/{id}', 'API\_Private\Organisation\OrganisationController@edit');	
            Route::post('/', 'API\_Private\Organisation\OrganisationController@store');			
			Route::patch('/', 'API\_Private\Organisation\OrganisationController@update');	
		});
		
		
		Route::group(['prefix' => 'category'], function () {
			
			Route::get('/', 'API\_Private\Category\CategoryController@index');	
			Route::get('/{id}', 'API\_Private\Category\CategoryController@edit');	
            Route::post('/', 'API\_Private\Category\CategoryController@store');			
			Route::patch('/', 'API\_Private\Category\CategoryController@update');	
		});
		
		
		Route::group(['prefix' => 'cuisine'], function () {
			
			Route::get('/', 'API\_Private\Cuisine\CuisineController@index');	
			Route::get('/{id}', 'API\_Private\Cuisine\CuisineController@edit');	
            Route::post('/', 'API\_Private\Cuisine\CuisineController@store');			
			Route::patch('/', 'API\_Private\Cuisine\CuisineController@update');	
		});
		
		Route::group(['prefix' => 'food'], function () {
			
			Route::get('/', 'API\_Private\Food\FoodController@index');	
			Route::get('/{id}', 'API\_Private\Food\FoodController@edit');	
            Route::post('/', 'API\_Private\Food\FoodController@store');			
			Route::patch('/', 'API\_Private\Food\FoodController@update');	
		});
		
		
		Route::group(['prefix' => 'attribute'], function () {
			
			Route::get('/', 'API\_Private\Attribute\AttributeController@index');	
			Route::get('/{id}', 'API\_Private\Attribute\AttributeController@edit');	
            Route::post('/', 'API\_Private\Attribute\AttributeController@store');			
			Route::patch('/', 'API\_Private\Attribute\AttributeController@update');	
		});
		
				Route::group(['prefix' => 'attributevalue'], function () {
			
			Route::get('/', 'API\_Private\AttributeValue\AttributeValueController@index');	
			Route::get('/{id}', 'API\_Private\AttributeValue\AttributeValueController@edit');	
            Route::post('/', 'API\_Private\AttributeValue\AttributeValueController@store');			
			Route::patch('/', 'API\_Private\AttributeValue\AttributeValueController@update');	
		});
	// auth
    Route::group(['prefix' => 'auth'], function () {

        // process new signup
        Route::post('signup', 'API\_Public\Auth\AuthController@newSignup');
        Route::post('login', 'API\_Public\Auth\AuthController@login');
        Route::post('login-lookup', 'API\_Public\Auth\AuthController@loginLookup');

       
    });

 

	Route::post('/login',function(Request $request){
		
		$data =$request->validate([
			'email'=>'required',
			'password'=>'required',
		]);
		
		$user = User::where('email', $request->email)->first();

		if (! $user || ! Hash::check($request->password, $user->password)) {
			throw ValidationException::withMessages([
				'email' => ['The provided credentials are incorrect.'],
			]);
		}

		return $user->createToken('my2-token')->plainTextToken;
		
	});
	
		
	Route::post('/logout',function(Request $request){
		auth()->logout();
		return response('');
		
	});