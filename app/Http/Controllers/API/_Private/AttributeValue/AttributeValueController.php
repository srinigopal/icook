<?php

namespace App\Http\Controllers\API\_Private\AttributeValue;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Models\AttributeValue;
use App\Http\Requests\AttributeValue\AttributeValueRequest;
use App\Transformers\AttributeValue\EditAttributeValueTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class AttributeValueController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = AttributeValue::get();

        if (! $payload) {

            //TODO - Log and handle - should always have an result

            return $this->notFoundErrorResponse('AttributeValue not found', 404);

        }
		return  $this->successResponse($payload);
    
    }
	public function store(AttributeValueRequest $request)
    {
        $payload = $request->all();
		
		
		try {

            DB::beginTransaction();
			
			$attribute = new AttributeValue();
            $attribute->organisation_id 			= 1;     
            $attribute->attribute_id					= $request->has('attribute_id') ? $request->input('attribute_id') :null;     
            $attribute->value 						= $request->has('value') ? $request->input('value') :null;     
                      
            $attribute->price	= $request->has('price') ? $request->input('price') :null;              
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
			
            $attribute = AttributeValue::where('id', $request->id)
            ->first();

            if (!$attribute) {
                
            return $this->notFoundErrorResponse('Attribute Value id not found', 404);
            }	
            		
            $attribute->value 		= $request->has('value') ? $request->input('value') :$attribute->value;     
            $attribute->price 	= $request->has('price') ? $request->input('price') :$attribute->price;     
                 
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
            $service = AttributeValue::where('id', $categoryId)            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('Attribute Value not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditAttributeValueTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('AttributeValue not found', 404);
        }

        return  $this->successResponse($payload);

    }
}