<?php

namespace App\Transformers\StudentSubject;

use App\Models\StudentSubject;
use League\Fractal\TransformerAbstract;


class EditStudentSubjectTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(StudentSubject $studentSubject)
    {
        
        return [
            'id' 							=> $studentSubject->id,
            'name' 							=> $studentSubject->name,
            'desciption' 					=> $studentSubject->desciption,
            
        ];

    }

}