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
				
				$transformedAttributeValues = [];
				
				foreach ($attribute->attributeValues as $attributeValues) {
					
					$transformedAttributeValues[] = [
						'value' 				 => $attributeValues->value,
						'price'					 => $attributeValues->price,
						'attribute_id'			 => $attributeValues->attribute_id,
						
					];
				}
				
                $transformedAttribute = [
				
                    'food_id' 				 => $attribute->food_id,
                    'code'					 => $attribute->code,
                    'id'					 => $attribute->id,
                    'name'					 => $attribute->name,
                    'frontend_type' 		 => $attribute->frontend_type,
                    'is_filterable' 		 => $attribute->is_filterable,
                    'is_required' 			 => $attribute->is_required,
                    'attributeValues' 		 => $transformedAttributeValues,
                ];

                array_push($transformedAttributes, $transformedAttribute);
            }

            return $transformedAttributes;

        };
		
		 $subTransformMedias = function($food) {

            $transformedMedias = [];

            foreach ($food->getMedia() as $media) {

				
				$publicUrl = $media->getUrl();
				$name  = $media->name;
				$publicFullUrl = $media->getFullUrl(); //url including domain
				$fullPathOnDisk = $media->getPath();
				
                $transformedMedia = [
				
                    'file_url' 				 => $publicUrl,
                    'file_name' 			 => $name,
                    'manuallyAddFile' 		 => 'yes',
                  
                ];

                array_push($transformedMedias, $transformedMedia);
            }

            return $transformedMedias;

        };
		
		// Neater reference to values that are transformed in a seperate function
        $transformed = [
            'attributes' => $subTransformAttributes($food),
            'files' => $subTransformMedias($food),
            
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
            'files'							=> $transformed['files'],
           
        ];

    }

}