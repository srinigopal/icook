<?php

namespace App\Http\Controllers\API\_Private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use DB;
use App\User;
use Auth;

class ConfigProfile extends ApiController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
		
		$profile=array(
					'user' => Auth::user()->getConfig()
					);
		
		
        return  $this->successResponse($profile);
    }
}
