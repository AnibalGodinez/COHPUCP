<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|max:15|unique:users,numero_identidad,' . auth()->id(),
            'numero_colegiacion' => 'nullable|string|max:12|unique:users,numero_colegiacion,' . auth()->id(),
            'rtn' => 'nullable|string|max:16|unique:users,rtn,' . auth()->id(),
            'sexo' => 'required|string|in:masculino,femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => ['nullable', 'string', 'regex:/^[\d-]*$/', 'max:40'],
            'telefono_celular' => ['required', 'string', 'regex:/^[\d-]*$/', 'max:40'],
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ];
    }
    public function messages()
    {
        return [
            'telefono.regex' => 'El teléfono fijo solo puede contener números y guiones.',
            'telefono_celular.required' => 'El campo celular es obligatorio.',
            'telefono_celular.regex' => 'El celular solo puede contener números y guiones.',
        ];
    }
}
