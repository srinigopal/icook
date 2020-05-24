<?php

namespace App\Transformers\StudentClass;

use App\Models\StudentClass;
use League\Fractal\TransformerAbstract;


class EditStudentClassTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(StudentClass $studentClass)
    {
        
        return [
            'id' 							=> $studentClass->id,
            'name' 							=> $studentClass->name,
            'numeric_name' 					=> $studentClass->numeric_name,
            
        ];

    }

}