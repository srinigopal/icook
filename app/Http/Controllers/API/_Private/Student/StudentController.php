<?php

namespace App\Http\Controllers\API\_Private\Student;

//use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use App\Models\StudentProfile;
use App\Models\StudentClass;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Requests\Student\ProfileRequest;
class StudentController extends ApiController
{
	
	public function index($id)
    {

        $profile = StudentProfile::where('user_id', $id)
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
			$class = StudentClass::where('id', $request->studentClassId)
						->first();

            if (!$class) {
				
              return $this->notFoundErrorResponse('Student Class not found', 404);
            }	
			
			
			$profile = StudentProfile::where('user_id', $user->id)->first();
			
			if (!$profile) {
				// start by creating a new profile
				$profile = new StudentProfile();
			}
            $profile->user_id 			= $user->id;      
            $profile->organisation_id 	= $user->organisationGetCurrent();      
            $profile->register_no 		= $request->has('registerNo') ? $request->input('registerNo') :null;
			$profile->roll_no			= $request->has('rollNo') ? $request->input('rollNo') :null;            
			$profile->date_of_birth		= $request->has('dateOfBirth') ? $request->input('dateOfBirth') :null;            
			$profile->gender			= $request->has('gender') ? $request->input('gender') :'male';            
			$profile->student_class_id	= $request->has('studentClassId') ? $request->input('studentClassId') :null;              
            $profile->save();
			
			DB::commit();

			return  $this->successResponse($profile);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
}
