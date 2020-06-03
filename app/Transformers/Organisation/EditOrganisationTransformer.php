<?php

namespace App\Transformers\Organisation;

use App\Models\Organisation;
use League\Fractal\TransformerAbstract;


class EditOrganisationTransformer extends TransformerAbstract
{
   

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Organisation $organisation)
    {
        
        return [
            'id' 							=> $organisation->id,
            'name' 							=> $organisation->name,
            'delivery_range' 				=> $organisation->delivery_range,
            'phone' 						=> $organisation->phone,
            'mobile' 						=> $organisation->mobile,
            'address' 						=> $organisation->address,
            'latitude' 						=> $organisation->latitude,
            'longitude' 					=> $organisation->longitude,
            'description' 					=> $organisation->description,
            'information' 					=> $organisation->information,
            'open_status' 					=> $organisation->open_status,
            'status' 						=> $organisation->status,
            
        ];

    }

}