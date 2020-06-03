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
            
        ];

    }

}