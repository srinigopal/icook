<?php

namespace App\Transformers\Syllabus;

use App\Models\Syllabus;
use League\Fractal\TransformerAbstract;


class EditSyllabusTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Syllabus $syllabus)
    {
        
        return [
            'id' 							=> $syllabus->id,
            'name' 							=> $syllabus->name,
            'desciption' 					=> $syllabus->desciption,
            
        ];

    }

}