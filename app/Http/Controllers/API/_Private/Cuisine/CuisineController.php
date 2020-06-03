<?php

namespace App\Http\Controllers\API\_Private\Cuisine;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Models\Cuisine;
use App\Http\Requests\Cuisine\CuisineRequest;
use App\Transformers\Cuisine\EditCuisineTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class CuisineController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = Cuisine::get();

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

        return response()->json([
            'status' => 'success',
            'errors' => null,
            'payload' => $payload
        ], 200);

    }
	public function store(CuisineRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			$cuisine = new Cuisine();
            $cuisine->organisation_id 	= '313126f9-4148-46e9-9113-86e4a4330308';     
            $cuisine->name 				= $request->has('name') ? $request->input('name') :null;     
            $cuisine->description 		= $request->has('description') ? $request->input('description') :null;              
			//$category->status			= $request->has('status') ? $request->input('status') :0;          
            $cuisine->save();
			
			DB::commit();

			return  $this->successResponse($cuisine);
          
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
			
            $cuisine = Cuisine::where('id', $request->id)
            ->first();

            if (!$cuisine) {
                
            return $this->notFoundErrorResponse('Cuisine id not found', 404);
            }	
            		
            $cuisine->name 		= $request->has('name') ? $request->input('name') :$cuisine->name;     
            $cuisine->description 	= $request->has('description') ? $request->input('description') :$cuisine->description;     
			//$category->status			= $request->has('status') ? $request->input('status') :$category->status;              
            $cuisine->save();
			DB::commit();

			return  $this->successResponse($cuisine);
          
        } catch (Exception $e) {
			
			DB::rollBack();
            return $this->errorResponse($e, 404);

		}
    }
	
	
	 public function edit(Request $request)
    {
        // ID from GET request
        $organisationId = $request->id;

        try {
            $service = Cuisine::where('id', $organisationId)            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('Cuisine not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditCuisineTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Cuisine not found', 404);
        }

        return  $this->successResponse($payload);

    }
}