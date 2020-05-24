<?php

namespace App\Http\Controllers\API\_Private\Syllabus;

//use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\StudentProfile;
use App\Models\StudentClass;
use App\Models\StudentSubject;
use App\Models\Syllabus;
use Auth;
use App\Serializers\APISerializer;
use DB;
use App\User;
use App\Http\Requests\Syllabus\SyllabusRequest;
use App\Transformers\Syllabus\EditSyllabusTransformer;
use League\Fractal\Resource\Item;
class SyllabusController extends ApiController
{
    

    public function index()
    {

        $student_classes = Syllabus::get();

        if (! $student_classes) {
			return $this->notFoundErrorResponse('Syllabus not found', 404);	
          

        }

         return  $this->successResponse($student_classes);

    }

    public function store(SyllabusRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			
			$class = StudentClass::where('id', $request->studentClassId)
						->first();

            if (!$class) {
				
              return $this->notFoundErrorResponse('Student Class not found', 404);
            }	
			
			$studentSubject = StudentSubject::where('id', $request->studentSubjectId)
						->first();

            if (!$studentSubject) {
				
              return $this->notFoundErrorResponse('Student Subject not found', 404);
            }	
			
			$syllabus = new Syllabus();			
			$syllabus->student_class_id 	= $class->id;
			$syllabus->student_subject_id 	= $studentSubject->id;
            $syllabus->organisation_id 		= Auth::user()->organisationGetCurrent();    
            $syllabus->name 	       		= $request->has('name') ? $request->input('name') :null;			  
            $syllabus->desciption 		    = $request->has('desciption') ? $request->input('desciption') :null;			
            $syllabus->save();
			
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
            $service = Syllabus::where('id', $studentSubjectId)            
                ->first();
			if (!$service) {
				
              return $this->notFoundErrorResponse('Student Subject not found', 404);
            }	
            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditSyllabusTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Syllabus not found', 404);
        }

        return  $this->successResponse($payload);

    }
    public function update(Request $request)
    {
        $payload = $request->all();
		try {


            
            DB::beginTransaction();
			
			$class = StudentClass::where('id', $request->studentClassId)
						->first();

            if (!$class) {
				
              return $this->notFoundErrorResponse('Student Class not found', 404);
            }	
			
			$studentSubject = StudentSubject::where('id', $request->studentSubjectId)
						->first();

            if (!$studentSubject) {
				
              return $this->notFoundErrorResponse('Student Subject not found', 404);
            }	
			
			
            $syllabus = Syllabus::where('id', $request->id)
            ->first();

            if (!$syllabus) {
                
            return $this->notFoundErrorResponse('Syllabus id not found', 404);
            }	
            		
            $syllabus->organisation_id 		= Auth::user()->organisationGetCurrent();    
			$syllabus->student_class_id 	= $class->id;
			$syllabus->student_subject_id 	= $studentSubject->id;
            $syllabus->name 	       		= $request->has('name') ? $request->input('name') :null;			  
            $syllabus->desciption 			= $request->has('desciption') ? $request->input('desciption') :null;			
            $syllabus->save();
			
			DB::commit();

			return  $this->successResponse($syllabus);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
	
	
	 public function fileupload(Request $request)
    {
        $payload = $request->all();
		
		
		$yourModel = Syllabus::find('dc706aff-de69-48eb-bde3-002b89ef7658');
		
$yourModel->addMedia($request->file('image'))->toMediaCollection('images');
    }

}
