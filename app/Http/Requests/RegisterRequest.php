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
            'register_username' => 'required|max:255|unique:users,username',
            'email_register' => 'required|email|max:255|unique:users,email',
            'register_password' => 'required|min:6|string',
            'confirm_password' => 'required|same:register_password',
        ];
    }

    public function messages()
    {
        return [
            'register_username.required'  => 'Please enter the username!',
            'register_username.max' => 'username should not exceed 30 characters',
            'register_username.unique' => 'username already exists',
            'email_register.required'  => 'Please enter the email!',
            'email_register.max' => 'email should not exceed 255 characters',
            'email_register.unique' => 'email already exists',
            'email_register.email' => 'Please enter correct email format',
            'register_password.min'  => 'Password must be at least 6 characters!',
            'register_password.required'  => 'Please enter the password!',
            'confirm_password.same'  => 'confirm password does not match password!',
            'register_password.string'  => 'The password must not contain any spaces',
            'confirm_password.required'  => 'Please enter the confirmPassword!',
        ];
    }
}
