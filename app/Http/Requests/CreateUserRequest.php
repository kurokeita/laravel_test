<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'firstName' => 'required|min:5|max:20',
            'lastName' => 'required|min:5|max:20',
            'dob' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'firstName.required' => 'First Name required',
            'lastName.required' => 'Last Name required',
            'dob.required' => 'DOB required',
            'firstName.min' => 'Must be at least 5 characters',
            'firstName.max' => 'Must be less than 20 characters',
            'lastName.min' => 'Must be at least 5 characters',
            'lastName.max' => 'Must be less than 20 characters',
            'dob.date' => 'Must be a valid date'
        ];
    }
}
