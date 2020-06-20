<?php

namespace App\Transformers\Attribute;

use App\Models\Organisation;
use App\Models\Attribute;
use League\Fractal\TransformerAbstract;


class EditAttributeTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Attribute $attribute)
    {
         $subTransformAttributeValues = function($attribute) {

            $transformedAttributes = [];

            foreach ($attribute->attributeValues as $attribute) {

                $transformedAttribute = [
				
                    'value' 				 => $attribute->value,
                    'price'					 => $attribute->price,
                    'id'					 => $attribute->id,
                    
                ];

                array_push($transformedAttributes, $transformedAttribute);
            }

            return $transformedAttributes;

        };
		
		// Neater reference to values that are transformed in a seperate function
        $transformed = [
            'attributeValues' => $subTransformAttributeValues($attribute),
            
        ];
        return [
            'id' 							=> $attribute->id,
            'name' 							=> $attribute->name,
            'code' 							=> $attribute->code,
            'frontend_type' 				=> $attribute->frontend_type,
            'is_filterable' 				=> $attribute->is_filterable,
            'food_id' 					=> $attribute->food_id,
            'is_required' 					=> $attribute->is_required,
            
			'attributevalues'					=> $transformed['attributeValues'],
            
        ];

    }

}