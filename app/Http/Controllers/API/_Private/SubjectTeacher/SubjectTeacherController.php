<?php

namespace App\Http\Controllers\API\_Private\SubjectTeacher;

//use Illuminate\Support\Facades\Auth;
use League\Fractal\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use App\Models\StudentProfile;
use App\Models\StudentClass;
use App\Models\StudentSubject;
use App\Models\SubjectTeacher;
use Auth;
use App\Serializers\APISerializer;
use DB;
use App\User;
use App\Http\Requests\SubjectTeacher\SubjectTeacherRequest;
use App\Transformers\SubjectTeacher\EditSubjectTeacherTransformer;
use League\Fractal\Resource\Item;
class SubjectTeacherController extends ApiController
{
    

    public function index()
    {

        $subject_teacher = SubjectTeacher::get();

        if (! $subject_teacher) {
			return $this->notFoundErrorResponse('Student subject not found', 404);	
          

        }

         return  $this->successResponse($subject_teacher);

    }

    public function store(SubjectTeacherRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			
			$subject = StudentSubject::where('id', $request->studentSubjectId)
						->first();

            if (!$subject) {
				
              return $this->notFoundErrorResponse('Student subject not found', 404);
            }	
			
			$teacher = User::where('id', $request->teacherId)
						->first();

            if (!$teacher) {
				
              return $this->notFoundErrorResponse('Teacher not found', 404);
            }	
			$sbjectTeacher = new SubjectTeacher();			
			$sbjectTeacher->teacher_id 			= $teacher->id;
			$sbjectTeacher->student_subject_id 	= $subject->id;
            $sbjectTeacher->organisation_id 	= Auth::user()->organisationGetCurrent();
            $sbjectTeacher->student_subject_id 	= $subject->id;			
            $sbjectTeacher->save();
			
			DB::commit();

			return  $this->successResponse($sbjectTeacher);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }

    public function edit(Request $request)
    {
        // ID from GET request
        $subjectTeacherId = $request->id;

        try {
            $service = SubjectTeacher::where('id', $subjectTeacherId)            
                ->first();
			if (!$service) {
				
              return $this->notFoundErrorResponse('Student Subject not found', 404);
            }	
            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditSubjectTeacherTransformer);

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
			
            $sbjectTeacher = SubjectTeacher::where('id', $request->id)
            ->first();

            if (!$sbjectTeacher) {
                
            return $this->notFoundErrorResponse('Subject Teacher not found', 404);
            }	
            		
            $sbjectTeacher->organisation_id 	= Auth::user()->organisationGetCurrent();    
            $sbjectTeacher->student_subject_id 	= $request->has('studentSubjectId') ? $request->input('studentSubjectId') :null;
            $sbjectTeacher->save();
			
			DB::commit();

			return  $this->successResponse($studentSubject);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
}
