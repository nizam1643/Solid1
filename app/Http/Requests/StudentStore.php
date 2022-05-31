<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentStore extends FormRequest
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
            'studentID' => 'required|unique:students',
            'email' => 'required|email|unique:students',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required!',
            'studentID.required' => 'studentID is required!',
            'studentID.unique' => 'studentID is already taken!',
            'email.required' => 'email is required!',
            'email.email' => 'email is not valid!',
        ];
    }
}
