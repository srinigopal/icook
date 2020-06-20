<?php

namespace App\Http\Controllers\API\_Private\Food;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Models\Food;
use App\Http\Requests\Food\FoodRequest;
use App\Transformers\Food\EditFoodTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class FoodController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = Food::get();

        if (! $payload) {

            //TODO - Log and handle - should always have an result

            return response()->json([
                'status' => 'error',
                'errors' => [
                    'Unable to process request',
                ],
                'payload' => null
            ], 404);

        }

        return  $this->successResponse($payload);
    }
	public function store(FoodRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			$food = new Food();
			$food->organisation_id 			= 1;     

            $food->name 					= $request->has('name') ? $request->input('name') :null;     
            $food->image 					= $request->has('image') ? $request->input('image') :null;     
            $food->description 				= $request->has('description') ? $request->input('description') :null;
			$food->ingredient				= $request->has('ingredient') ? $request->input('ingredient') :null;            
			$food->base_price				= $request->has('base_price') ? $request->input('base_price') :null;            
			$food->discount_price			= $request->has('discount_price') ? $request->input('discount_price') :null;            
			$food->unit						= $request->has('unit') ? $request->input('unit') :null;              
			$food->package_items_count		= $request->has('package_items_count') ? $request->input('package_items_count') :null;              
			$food->weight					= $request->has('weight') ? $request->input('weight') :0;              
			$food->featured					= $request->has('featured') ? $request->input('featured') :0;              
			$food->deliverable				= $request->has('deliverable') ? $request->input('deliverable') :0;              
            $food->save();
			
			DB::commit();

			return  $this->successResponse($food);
          
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
			
            $food = Food::where('id', $request->id)->first();

            if (!$food) {
                
            return $this->notFoundErrorResponse('food id not found', 404);
            }	
            		
            $food->name 				= $request->has('name') ? $request->input('name') :$food->name;     
            $food->image 				= $request->has('image') ? $request->input('image') :$food->image;     
            $food->description 			= $request->has('description') ? $request->input('description') :$food->description;
			$food->ingredient			= $request->has('ingredient') ? $request->input('ingredient') :$food->ingredient;            
			$food->base_price			= $request->has('base_price') ? $request->input('base_price') :$food->base_price;            
			$food->discount_price		= $request->has('discount_price') ? $request->input('discount_price') :$food->discount_price;            
			$food->unit					= $request->has('unit') ? $request->input('unit') :$food->unit;              
			$food->package_items_count	= $request->has('package_items_count') ? $request->input('package_items_count') :$food->package_items_count;              
			$food->weight				= $request->has('weight') ? $request->input('weight') :$food->weight;              
			$food->featured				= $request->has('featured') ? $request->input('featured') :$food->featured;              
			$food->deliverable			= $request->has('deliverable') ? $request->input('deliverable') :$food->deliverable;              
            $food->save();
			
			DB::commit();

			return  $this->successResponse($food);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
	
	
	 public function edit(Request $request)
    {
        // ID from GET request
        $foodId = $request->id;

        try {
            $service = Food::where('id', $foodId)  
					->with( 
							'attribute'                        
                        )			
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('food not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditFoodTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Food not found', 404);
        }

        return  $this->successResponse($payload);

    }
}