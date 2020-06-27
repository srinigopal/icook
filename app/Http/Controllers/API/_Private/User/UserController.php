<?php

namespace App\Http\Controllers\API\_Private\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests\Organisation\OrganisationRequest;
use App\Transformers\Organisation\EditOrganisationTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class UserController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = User::get();

        if (! $payload) {

            //TODO - Log and handle - should always have an result

          return $this->notFoundErrorResponse('Organisation id not found', 404);

        }

       return  $this->successResponse($payload);

    }
	
}