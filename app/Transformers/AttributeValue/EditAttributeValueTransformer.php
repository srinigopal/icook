<?php

namespace App\Transformers\AttributeValue;

use App\Models\Organisation;
use App\Models\AttributeValue;
use League\Fractal\TransformerAbstract;


class EditAttributeValueTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(AttributeValue $attribute)
    {
       
        return [
            'id' 							=> $attribute->id,
            'value' 						=> $attribute->value,
            'price' 						=> $attribute->price,
            
            
        ];

    }

}