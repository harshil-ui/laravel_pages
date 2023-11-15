<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string'
            ],
            'email' => [
                'required',
                'email',
                'unique:users,email'
            ],
            'contactno' => [
                'required',
                'digits:10'
            ],
            'avatar' => [
                'required',
                'image'
            ],
            'password' => [
                'required',
                'string',
                'min:12',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#$%^&*()_+])[A-Za-z\d@#$%^&*()_+]+$/',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string'
            ],
        ];
    }
}
