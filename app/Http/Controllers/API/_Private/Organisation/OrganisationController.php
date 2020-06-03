<?php

namespace App\Http\Controllers\API\_Private\Organisation;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Http\Requests\Organisation\OrganisationRequest;
use App\Transformers\Organisation\EditOrganisationTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class OrganisationController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = Organisation::get();

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
	public function store(OrganisationRequest $request)
    {
        $payload = $request->all();
		try {

            DB::beginTransaction();
			
			$organisation = new Organisation();
            $organisation->name 	= $request->has('name') ? $request->input('name') :null;     
            $organisation->delivery_range 	= $request->has('deliveryRange') ? $request->input('deliveryRange') :null;     
            $organisation->phone 			= $request->has('phone') ? $request->input('phone') :null;
			$organisation->mobile			= $request->has('mobile') ? $request->input('mobile') :null;            
			$organisation->address			= $request->has('address') ? $request->input('address') :null;            
			$organisation->description		= $request->has('description') ? $request->input('description') :null;            
			$organisation->information		= $request->has('information') ? $request->input('information') :null;              
			$organisation->open_status		= $request->has('openStatus') ? $request->input('openStatus') :null;              
			$organisation->status			= $request->has('status') ? $request->input('status') :0;              
            $organisation->save();
			
			DB::commit();

			return  $this->successResponse($organisation);
          
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
			
            $organisation = Organisation::where('id', $request->id)
            ->first();

            if (!$organisation) {
                
            return $this->notFoundErrorResponse('Organisation id not found', 404);
            }	
            		
            $organisation->name 	= $request->has('name') ? $request->input('name') :$organisation->name;     
            $organisation->delivery_range 	= $request->has('deliveryRange') ? $request->input('deliveryRange') :$organisation->delivery_range;     
            $organisation->phone 			= $request->has('phone') ? $request->input('phone') :$organisation->phone;
			$organisation->mobile			= $request->has('mobile') ? $request->input('mobile') :$organisation->mobile;            
			$organisation->address			= $request->has('address') ? $request->input('address') :$organisation->address;            
			$organisation->description		= $request->has('description') ? $request->input('description') :$organisation->description;            
			$organisation->information		= $request->has('information') ? $request->input('information') :$organisation->information;              
			$organisation->open_status		= $request->has('openStatus') ? $request->input('openStatus') :$organisation->open_status;              
			$organisation->status			= $request->has('status') ? $request->input('status') :$organisation->status;              
            $organisation->save();
			
			DB::commit();

			return  $this->successResponse($organisation);
          
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
            $service = Organisation::where('id', $organisationId)            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('organisation not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditOrganisationTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Organisation not found', 404);
        }

        return  $this->successResponse($payload);

    }
}