<?php

namespace App\Http\Requests;

use App\Rules\CurrentPasswordCheckRule;
use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'old_password' => ['required', 'min:6', new CurrentPasswordCheckRule],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'confirmed',
                'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/',  // al menos un carácter especial
                'different:old_password'
            ],
            'password_confirmation' => ['required']
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => __('current password'),
            'password' => __('new password'),
            'password_confirmation' => __('password confirmation')
        ];
    }

    public function messages()
    {
        return [
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.max' => 'La contraseña no debe tener más de 20 caracteres.',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o caractér especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'old_password.required' => 'La contraseña actual es requerida.',
            'password_confirmation.required' => 'La confirmación de la contraseña es requerida.'
        ];
    }
}
