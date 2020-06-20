<?php

namespace App\Transformers\Food;

use App\Models\Organisation;
use App\Models\Food;
use League\Fractal\TransformerAbstract;


class EditFoodTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Food $food)
    {
		
		 $subTransformAttributes = function($food) {

            $transformedAttributes = [];

            foreach ($food->attribute as $attribute) {

                $transformedAttribute = [
				
                    'food_id' 				 => $attribute->food_id,
                    'code'					 => $attribute->code,
                    'id'					 => $attribute->id,
                    'name'					 => $attribute->name,
                    'frontend_type' 		 => $attribute->frontend_type,
                    'is_filterable' 		 => $attribute->is_filterable,
                    'is_required' 			 => $attribute->is_required,
                ];

                array_push($transformedAttributes, $transformedAttribute);
            }

            return $transformedAttributes;

        };
		
		// Neater reference to values that are transformed in a seperate function
        $transformed = [
            'attributes' => $subTransformAttributes($food),
            
        ];
        
        return [
            'id' 							=> $food->id,
            'name' 							=> $food->name,
            'image' 						=> $food->image,
            'description' 					=> $food->description,
            'ingredient' 					=> $food->ingredient,
            'base_price' 					=> $food->base_price,
            'discount_price' 				=> $food->discount_price,
            'unit' 							=> $food->unit,
            'package_items_count' 			=> $food->package_items_count,
            'weight' 						=> $food->weight,
            'featured' 						=> $food->featured,
            'deliverable' 					=> $food->deliverable,
            'attributes'					=> $transformed['attributes'],
        ];

    }

}