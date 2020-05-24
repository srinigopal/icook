<?php

namespace App\Transformers\SubjectTeacher;

use App\Models\SubjectTeacher;
use League\Fractal\TransformerAbstract;


class EditSubjectTeacherTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(SubjectTeacher $subjectTeacher)
    {
        
        return [
            'id' 							=> $subjectTeacher->id,
            'subjectTeacherId' 				=> $subjectTeacher->student_subject_id,
            
            
        ];

    }

}