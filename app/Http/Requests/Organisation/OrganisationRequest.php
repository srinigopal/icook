<?php

namespace App\Http\Requests\Organisation;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class OrganisationRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ];
    }
	  public function messages()
    {
        return [
            'name.required' => 'We need your organization Name',
            'address.required' => 'We need organization Address',
            'phone.required' => 'We need organization Phone Number',
            
           
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
