<?php

namespace App\Http\Controllers\API\_Private\Studentsubject;

//use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\StudentProfile;
use App\Models\StudentClass;
use App\Models\StudentSubject;
use Auth;
use App\Serializers\APISerializer;
use DB;
use App\User;
use App\Http\Requests\Studentsubject\StudentSubjectRequest;
use App\Transformers\StudentSubject\EditStudentSubjectTransformer;
use League\Fractal\Resource\Item;
class StudentSubjectController extends ApiController
{
    

    public function index()
    {

        $student_classes = StudentSubject::get();

        if (! $student_classes) {
			return $this->notFoundErrorResponse('Student subject not found', 404);	
          

        }

         return  $this->successResponse($student_classes);

    }

    public function store(StudentSubjectRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			
			$class = StudentClass::where('id', $request->studentClassId)
						->first();

            if (!$class) {
				
              return $this->notFoundErrorResponse('Student Class not found', 404);
            }	
			$studentSubject = new StudentSubject();			
			$studentSubject->student_class_id 	= $class->id;
            $studentSubject->organisation_id 	= Auth::user()->organisationGetCurrent();    
            $studentSubject->name 	       		= $request->has('name') ? $request->input('name') :null;			  
            $studentSubject->desciption 		= $request->has('desciption') ? $request->input('desciption') :null;			
            $studentSubject->save();
			
			DB::commit();

			return  $this->successResponse($studentSubject);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }

    public function edit(Request $request)
    {
        // ID from GET request
        $studentSubjectId = $request->id;

        try {
            $service = StudentSubject::where('id', $studentSubjectId)            
                ->first();
			if (!$service) {
				
              return $this->notFoundErrorResponse('Student Subject not found', 404);
            }	
            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditStudentSubjectTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Student subject not found', 404);
        }

        return  $this->successResponse($payload);

    }
    public function update(Request $request)
    {
        $payload = $request->all();
		try {


            
            DB::beginTransaction();
			
            $studentSubject = StudentSubject::where('id', $request->id)
            ->first();

            if (!$studentSubject) {
                
            return $this->notFoundErrorResponse('Student Subject id not found', 404);
            }	
            		
            $studentSubject->organisation_id 	= Auth::user()->organisationGetCurrent();    
            $studentSubject->name 	        = $request->has('name') ? $request->input('name') :null;			  
            $studentSubject->desciption 	= $request->has('desciption') ? $request->input('desciption') :null;			
            $studentSubject->save();
			
			DB::commit();

			return  $this->successResponse($studentSubject);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
}
