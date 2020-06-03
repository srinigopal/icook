<?php

namespace App\Transformers\Cuisine;

use App\Models\Organisation;
use App\Models\Cuisine;
use League\Fractal\TransformerAbstract;


class EditCuisineTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Cuisine $cuisine)
    {
        
        return [
            'id' 							=> $cuisine->id,
            'name' 							=> $cuisine->name,
            
           // 'status' 						=> $organisation->status,
            
        ];

    }

}