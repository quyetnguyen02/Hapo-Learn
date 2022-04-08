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
            'username_register' => 'required|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password_register' => 'required|min:6|string',
            'confirmPassword' => 'required|same:password_register',
        ];
    }

    public function messages()
    {
        return [
            'username_register.required'  => 'Please enter the username!',
            'username_register.max' => 'username should not exceed 30 characters',
            'username_register.unique' => 'username already exists',
            'email.required'  => 'Please enter the email!',
            'email.max' => 'email should not exceed 255 characters',
            'email.unique' => 'email already exists',
            'email.email' => 'Please enter correct email format',
            'password_register.min'  => 'Passwords must be at least 6 characters!',
            'password_register.required'  => 'Please enter the password!',
            'confirmPassword.same'  => 'confirm password does not match password!',
            'password_register.string'  => 'The password must not contain any spaces',
            'confirmPassword.required'  => 'Please enter the confirmPassword!',
        ];
    }
}
