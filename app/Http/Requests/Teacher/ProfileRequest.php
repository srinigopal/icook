<?php

namespace App\Http\Requests\Teacher;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ProfileRequest extends BaseFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
          return [
            
            'id' => 'required',
            'dateOfBirth' => 'required',
            'dateOfJoining' => 'required',
            'gender' => 'required',
            'designation' => 'required'
           
        ];
    }
	public function messages()
    {
        return [
           
            'id.required' => 'We need user id',
            'designation.required' => 'We need your designation',
            'dateOfJoining.required' => 'We need your date of joining ',
            'dateOfBirth.required' => 'We need a valid date of birth',
            'gender' => 'We need your gender',
           
           
        ];
    }
	
	 public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 'formError',
            'errors' => $validator->errors(),
            'payload' => null
        ], 422));
    }
}
