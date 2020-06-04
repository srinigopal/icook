<?php

namespace App\Http\Controllers\API\_Private\Category;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Organisation;
use App\Models\Category;
use App\Http\Requests\Category\CategoryRequest;
use App\Transformers\Category\EditCategoryTransformer;
use DB;
use League\Fractal\Manager;
use App\Serializers\APISerializer;
use League\Fractal\Resource\Item;
class CategoryController extends ApiController
{

    public function __construct(Request $request)
    {

        

    }
	
	 public function index()
    {

        $payload = Category::get();

        if (! $payload) {

            //TODO - Log and handle - should always have an result

            return $this->notFoundErrorResponse('Category not found', 404);

        }
		return  $this->successResponse($payload);
    
    }
	public function store(CategoryRequest $request)
    {
        $payload = $request->all();
		
		
		try {

            DB::beginTransaction();
			
			$category = new Category();
            $category->organisation_id 			= '313126f9-4148-46e9-9113-86e4a4330308';     
            $category->name 			= $request->has('name') ? $request->input('name') :null;     
            $category->description 		= $request->has('description') ? $request->input('description') :null;              
			//$category->status			= $request->has('status') ? $request->input('status') :0;              
            $category->save();
			
			DB::commit();

			return  $this->successResponse($category);
          
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
			
            $category = Category::where('id', $request->id)
            ->first();

            if (!$category) {
                
            return $this->notFoundErrorResponse('Category id not found', 404);
            }	
            		
            $category->name 		= $request->has('name') ? $request->input('name') :$category->name;     
            $category->description 	= $request->has('description') ? $request->input('description') :$category->description;     
			//$category->status			= $request->has('status') ? $request->input('status') :$category->status;              
            $category->save();
			
			DB::commit();

			return  $this->successResponse($category);
          
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
            $service = Category::where('id', $categoryId)            
                ->first();

                if (!$service) {
				
                    return $this->notFoundErrorResponse('Category not found', 404);
                  }	    

            //setup new Fractal Manager instance
            $manager = new Manager();

            //set serializer to customer serializer - removes "data" key from collections
            $manager->setSerializer(new APISerializer());

            // pass the record through the transformer
            $resource = new Item($service, new EditCategoryTransformer);

            $payload = $manager->createData($resource)->toArray();

        } catch (Exception $e) {

            return $this->notFoundErrorResponse('Category not found', 404);
        }

        return  $this->successResponse($payload);

    }
}