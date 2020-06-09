<?php

namespace App\Http\Controllers\API\_Public\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginLookupRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\NewSignupRequest;
use App\User;
use App\Models\Organisation;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use URL;

class AuthController extends Controller {

    use AuthenticatesUsers;

	

    public function newSignup(NewSignupRequest $request)
    {

        $payload = $request->all();

        try {

            DB::beginTransaction();
            // create new user account for this first user
            $user = new User();
            $user->first_name	 = $payload['firstName'];
            $user->last_name 	 = $payload['lastName'];
            $user->email 		 = $payload['email'];
            $user->password 	 = bcrypt($payload['password']);                     
            $user->save();

            // give new admin user their role
            $user->assignRole('admin');
			
			
			$organisation = Organisation::first();

			 // associate new admin user with organisation
            $user->organisations()->attach($organisation->id);
			
			
            DB::commit();

            return response()->json([
                'status' => 'success',
                'errors' => false,
                'payload' => null
            ], 200);
            
        } catch (Exception $e) {

            DB::rollBack();
            
        }

    }

    public function loginLookup(LoginLookupRequest $request)
    {
        
        try {
            
            $user = User::where('email', $request->email ? $request->email : null)
                ->first();

            if ($user) {

                return response()->json([
                    'status' => 'success',
                    'errors' => null,
                    'payload' => [
                        'login_lookup_success' => true,
                        'account_locked' => $user->account_locked ? true : false
                    ]
                ], 200);

            } else {

                if (method_exists($this, 'hasTooManyLoginAttempts') and $this->hasTooManyLoginAttempts($request)) {
                    
                    $this->fireLockoutEvent($request);

                    $seconds = $this->limiter()->availableIn($this->throttleKey($request));

                    return response()->json([
                        'status' => 'error',
                        'errors' => [
                            'Too many login attempts. Please try again in ' . $seconds . ' seconds.',
                        ],
                        'payload' => null,
                    ], 403);

                }

                $this->incrementLoginAttempts($request);

                return response()->json([
                    'status' => 'formError',
                    'errors' => [
                        'email' => [ 
                            'We couldn\'t find your  account.'
                        ]
                    ],
                    'payload' => null,
                ], 404);

            }

        } catch (Exception $e) {

            return response()->json([
                'status' => 'error',
                'errors' => [
                    $e->getMessage()
                ],
                'payload' => null,
            ], 500);
            
        }

    }

    public function login(LoginRequest $request)
    {

        if (method_exists($this, 'hasTooManyLoginAttempts') and $this->hasTooManyLoginAttempts($request)) {
            
            $this->fireLockoutEvent($request);

            $seconds = $this->limiter()->availableIn($this->throttleKey($request));

            return response()->json([
                'status' => 'error',
                'errors' => [
                    'Too many login attempts. Please try again in ' . $seconds . ' seconds.',
                ],
                'payload' => null,
            ], 403);

        }

        if ($this->attemptLogin($request)) {
			
			auth()->attempt($request->only('email','password'));
			$roles= auth()->user()->roles()->get()->pluck('name');
			
			$payload = collect(
								$roles
								);
			$main_role=$this->getUserMainRole($payload);
			
            return response()->json([
                'status' => 'success',
                'errors' => false,				
                'payload' => [
                    'users' => auth()->user(),
                    'main_role' => $main_role
                   
                ]
            ], 200);

        }

        $this->incrementLoginAttempts($request);

        return response()->json([
            'status' => 'error',
            'errors' => [
                'Login failed - please check your password',
            ],
            'payload' => null,
        ], 403);

    }
	
	private function getUserMainRole($roles){
		
			$type='web';
		
		if($roles->contains('superadmin')){
			
			$type='superadmin';
		}
		if($roles->contains('admin')){
			
			$type='admin';
		}
		
		return $type;
	}

}