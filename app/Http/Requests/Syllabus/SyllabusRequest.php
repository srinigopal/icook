<?php

namespace App\Http\Requests\Syllabus;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class SyllabusRequest extends FormRequest
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
            'desciption' => 'required',
            'studentSubjectId' => 'required',
            'studentClassId' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'We need your class name',
            'desciption.required' => 'We need your desciption',           
            'studentClassId.required' => 'We need your Student Class id',           
            'studentSubjectId.required' => 'We need your Student subject',           
           
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
