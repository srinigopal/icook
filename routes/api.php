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