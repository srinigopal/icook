<?php

namespace App\Http\Controllers\API\_Private\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\TeacherProfile;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests\Teacher\ProfileRequest;

class TeacherController extends ApiController
{
     public function index($id)
    {

        $profile = TeacherProfile::where('user_id', $id)
			->first();

        if (! $profile) {
			return $this->notFoundErrorResponse('User not found', 404);	
          

        }

         return  $this->successResponse($profile);

    }
	
	
    public function store(ProfileRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();

			$user = User::where('id', $request->id)
						->first();

            if (! $user) {
				
               return $this->notFoundErrorResponse('User not found', 404);

            }	
			
			$profile = TeacherProfile::where('user_id', $user->id)->first();
			
			if (!$profile) {
				// start by creating a new profile
				$profile = new TeacherProfile();
			}
            $profile->user_id 			= $user->id;      
            $profile->organisation_id 	= $user->organisationGetCurrent();                   
			$profile->date_of_birth		= $request->has('dateOfBirth') ? $request->input('dateOfBirth') :null;            
			$profile->date_of_joining		= $request->has('dateOfJoining') ? $request->input('dateOfJoining') :null;            
			$profile->designation		= $request->has('designation') ? $request->input('designation') :null;            
			$profile->gender			= $request->has('gender') ? $request->input('gender') :'male';            
			$profile->name			= 'test';            
			
			$profile->save();
			DB::commit();

			return  $this->successResponse($profile);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
}
