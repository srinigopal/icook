<?php

namespace App\Transformers\Category;

use App\Models\Organisation;
use App\Models\Category;
use League\Fractal\TransformerAbstract;


class EditCategoryTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        
        return [
            'id' 							=> $category->id,
            'name' 							=> $category->name,
            'description' 					=> $category->description,
            
          //  'status' 						=> $organisation->status,
            
        ];

    }

}