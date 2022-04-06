<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:6',

        ];
    }

    public function messages()
    {
        return [
            'username.required'  => 'Please enter the username!',
            'username.max' => 'username should not exceed 30 characters',
            'username.unique' => 'username already exists',
            'email.required'  => 'Please enter the email!',
            'email.max' => 'email should not exceed 255 characters',
            'email.unique' => 'email already exists',
            'email.email' => 'Please enter correct email format',
            'password.min'  => 'Passwords must be at least 6 characters!',
            'password.required'  => 'Please enter the password!',
            'password.confirmed'  => 'confirm password does not match password!',
        ];
    }
}
