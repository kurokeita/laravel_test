<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'id' => 'required|email',
            'name' => 'required|min:5|max:25'
        ];
    }
    
    /**
     * Custom messages for validation
     *
     * @return void
     */
    public function messages()
    {
        return [
            'id.required' => 'ID can not be blank',
            'name.required' => 'Name can not be blank',
            'id.email' => 'Not a valid email address',
            'name.min' => 'Name must be longer than 5 chars',
            'name.max' => 'Name must be shorter than 25 chars'
        ];
    }
}
