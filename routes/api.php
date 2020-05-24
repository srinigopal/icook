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
		
	
	
		// student
        Route::group(['prefix' => 'student'], function () {
			
            Route::get('/{id}', 'API\_Private\Student\StudentController@index');	
            Route::post('/profile', 'API\_Private\Student\StudentController@store');			

        });
		
		// studentclass
        Route::group(['prefix' => 'studentclass'], function () {
			
			Route::get('/', 'API\_Private\Studentclass\StudentClassController@index');	
			Route::get('/{id}', 'API\_Private\Studentclass\StudentClassController@edit');	
            Route::post('/', 'API\_Private\Studentclass\StudentClassController@store');			
			Route::patch('/', 'API\_Private\Studentclass\StudentClassController@update');	
		});
		
		// studentclass
        Route::group(['prefix' => 'studentsubject'], function () {
			
			Route::get('/', 'API\_Private\Studentsubject\StudentSubjectController@index');	
			Route::get('/{id}', 'API\_Private\Studentsubject\StudentSubjectController@edit');	
            Route::post('/', 'API\_Private\Studentsubject\StudentSubjectController@store');			
			Route::patch('/', 'API\_Private\Studentsubject\StudentSubjectController@update');	
		});
		
		// teacher
        Route::group(['prefix' => 'teacher'], function () {
			
            Route::get('/{id}', 'API\_Private\Teacher\TeacherController@index');	
            Route::post('/profile', 'API\_Private\Teacher\TeacherController@store');
			
          
        });
		
		
		// studentclass
        Route::group(['prefix' => 'syllabus'], function () {
			
			Route::get('/', 'API\_Private\syllabus\SyllabusController@index');	
			Route::get('/{id}', 'API\_Private\syllabus\SyllabusController@edit');	
            Route::post('/', 'API\_Private\syllabus\SyllabusController@store');			
			Route::patch('/', 'API\_Private\syllabus\SyllabusController@update');	
			Route::post('/filepload', 'API\_Private\syllabus\SyllabusController@fileupload');			
		});
		
		// subjectTeacher
        Route::group(['prefix' => 'subjecteacher'], function () {
			
			Route::get('/', 'API\_Private\SubjectTeacher\SubjectTeacherController@index');	
			Route::get('/{id}', 'API\_Private\SubjectTeacher\SubjectTeacherController@edit');	
            Route::post('/', 'API\_Private\SubjectTeacher\SubjectTeacherController@store');			
			Route::patch('/', 'API\_Private\SubjectTeacher\SubjectTeacherController@update');	
		});
		
		
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