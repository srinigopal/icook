<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class NewSignupRequest extends BaseFormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|required_with:confirmPassword',
            'confirmPassword' => 'required|min:6|same:password',
           
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'We need your first name',
            'lastName.required' => 'We need your last name',
            'email.required' => 'We need a valid email address',
            'email.email' => 'We need a valid email address',
            'email.unique' => 'This email address is currently unavailable',
            'password.min' => 'We need a valid password of at least 6 characters',
            'confirmPassword.min' => 'We need a valid matching password of at least 6 characters',
            'confirmPassword.same' => 'Your passwords do not match',
           
        ];
    }

    public function filters()
    {
        return [
            'firstName' => 'trim|capitalize',
            'lastName' => 'trim|capitalize',
            'email' => 'trim|lowercase',
           
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