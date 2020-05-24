<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class LoginLookupRequest extends BaseFormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'We need a valid email address',
            'email.email' => 'We need a valid email address'
        ];
    }

    public function filters()
    {
        return [
            'email' => 'trim|lowercase'
        ];
    }

    public function failedValidation(Validator $validator) {

        throw new HttpResponseException(response()->json([
            'status' => 'formError',
            'errors' => $validator->errors(),
            'payload' => null,
        ], 422));

    }
}