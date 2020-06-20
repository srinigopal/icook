<?php

namespace App\Http\Controllers\API\_Private\Attribute;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Models\Attribute;
use App\Http\Requests\Attribute\AttributeRequest;
use App\Transformers\Attribute\EditAttributeTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class AttributeController extends ApiController
{

    public function __construct()
    {

        

    }
	
	 public function index()
    {

        $payload = Attribute::get();

        if (! $payload) {

            //TODO - Log and handle - should always have an result

            return $this->notFoundErrorResponse('Attribute not found', 404);

        }
		return  $this->successResponse($payload);
    
    }
	public function store(AttributeRequest $request)
    {
        $payload = $request->all();
		
		
		try {

            DB::beginTransaction();
			
			$attribute = new Attribute();
            $attribute->organisation_id 			= 1;     
            $attribute->code 						= $request->has('code') ? $request->input('code') :null;     
            $attribute->name 						= $request->has('name') ? $request->input('name') :null;     
            $attribute->frontend_type 				= $request->has('frontend_type') ? $request->input('frontend_type') :'checkbox';              
            $attribute->is_required 				= $request->has('is_required') ? $request->input('is_required') :0;              
			//$category->status			= $request->has('status') ? $request->input('status') :0;              
            $attribute->save();
			
			DB::commit();

			return  $this->successResponse($attribute);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
    public function update(Request $request)
    {

       $payload = $request->all();
		try {
            
            DB::beginTransaction();
			
            $attribute = Attribute::where('id', $request->id)
            ->first();

            if (!$attribute) {
                
            return $this->notFoundErrorResponse('Attribute id not found', 404);
            }	
            		
            $attribute->name 		= $request->has('name') ? $request->input('name') :$attribute->name;     
            $attribute->code 	= $request->has('code') ? $request->input('code') :$attribute->code;     
            $attribute->frontend_type 	= $request->has('frontend_type') ? $request->input('frontend_type') :$attribute->frontend_type;     
            $attribute->is_filterable 	= $request->has('is_filterable') ? $request->input('is_filterable') :$attribute->is_filterable;     
            $attribute->is_required 	= $request->has('is_required') ? $request->input('is_required') :$attribute->is_required;     
			       
            $attribute->save();
			
			DB::commit();

			return  $this->successResponse($attribute);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
	
	
	 public function edit(Request $request)
    {
        // ID from GET request
        $categoryId = $request->id;

        try {
            $service = Attribute::where('id', $categoryId)
					->with( 
							'attributeValues'                        
                        )	            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('Attribute not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditAttributeTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Attribute not found', 404);
        }

        return  $this->successResponse($payload);

    }
}