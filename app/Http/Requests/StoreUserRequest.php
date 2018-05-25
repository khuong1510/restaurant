<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'username'          => 'required|unique:users,username',
            'email'             => 'required|unique:users,email|email',
            'name'              => 'required',
            'password'          => 'required|confirmed|min:6',
            'dob'               => 'required',
            'phone'             => 'digits_between: 10,11|numeric|unique:users,phone',
            'avatar'            => 'max:6000|dimensions:min_width=100,min_height=100',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'dob.required'      => 'The birthday field is required.',
        ];
    }
}
