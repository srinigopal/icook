<?php

namespace App\Http\Requests\Student;
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
            'registerNo' => 'required',
            'rollNo' => 'required',
            'dateOfBirth' => 'required',
            'gender' => 'required',
            'studentClassId' => 'required'
           
        ];
    }
	
	public function messages()
    {
        return [
            'registerNo.required' => 'We need your register number',
            'rollNo.required' => 'We need your roll number',
            'studentClassId.required' => 'We need your class ',
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
