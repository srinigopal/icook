<?php

namespace App\Http\Controllers\API\_Private\Studentclass;

//use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\StudentProfile;
use App\Models\StudentClass;
use Auth;
use App\Serializers\APISerializer;
use DB;
use App\User;
use App\Http\Requests\Studentclass\StudentclassRequest;
use App\Transformers\Studentclass\EditStudentClassTransformer;
use League\Fractal\Resource\Item;
class StudentClassController extends ApiController
{
    

    public function index()
    {

        $student_classes = StudentClass::get();

        if (! $student_classes) {
			return $this->notFoundErrorResponse('Student class not found', 404);	
          

        }

         return  $this->successResponse($student_classes);

    }

    public function store(StudentclassRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			$studentClass = new StudentClass();			
            $studentClass->organisation_id 	= Auth::user()->organisationGetCurrent();    
            $studentClass->name 	        = $request->has('name') ? $request->input('name') :null;			  
            $studentClass->numeric_name 	= $request->has('numericName') ? $request->input('numericName') :null;			
            $studentClass->save();
			
			DB::commit();

			return  $this->successResponse($studentClass);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }

    public function edit(Request $request)
    {
        // ID from GET request
        $studentClassId = $request->id;

        try {
            $service = StudentClass::where('id', $studentClassId)            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('Student Class not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditStudentClassTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Student class not found', 404);
        }

        return  $this->successResponse($payload);

    }
    public function update(Request $request)
    {
        $payload = $request->all();
		try {


            
            DB::beginTransaction();
			
            $studentClass = StudentClass::where('id', $request->id)
            ->first();

            if (!$studentClass) {
                
            return $this->notFoundErrorResponse('Student Class id not found', 404);
            }	
            		
            $studentClass->organisation_id 	= Auth::user()->organisationGetCurrent();    
            $studentClass->name 	        = $request->has('name') ? $request->input('name') :null;			  
            $studentClass->numeric_name 	= $request->has('numericName') ? $request->input('numericName') :null;			
            $studentClass->save();
			
			DB::commit();

			return  $this->successResponse($studentClass);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
}
