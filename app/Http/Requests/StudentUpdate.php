<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdate extends FormRequest
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
            'studentID' => 'required',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'name is required!',
            'studentID.required' => 'studentID is required!',
            'email.required' => 'email is required!',
            'email.email' => 'email is not valid!',
        ];
    }
}
