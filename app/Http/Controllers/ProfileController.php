<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

        public function show()
    {
        $user = Auth::user()->load('pais');
        $age = $user->fecha_nacimiento ? \Carbon\Carbon::parse($user->fecha_nacimiento)->age : null;
        return view('profile.view', compact('user', 'age'));
    }

    public function edit()
    {
        $user = Auth::user();
        $paises = Pais::all(); 

        return view('profile.edit', compact('user', 'paises'));
    }

    protected function validateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|unique:users,numero_identidad',
            'numero_colegiacion' => 'nullable|string|unique:users,numero_colegiacion',
            'rtn' => 'nullable|string|max:20|unique:users,rtn',
            'sexo' => 'required|in:masculino,femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:40|regex:/^[\d-]*$/',
            'telefono_celular' => 'required|string|max:40|regex:/^[\d-]*$/',
            'email' => 'required|email|max:255|unique:users,email',
            'email_confirmation' => 'required|email|same:email',
            'pais_id' => 'nullable|exists:pais,id',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'bio' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'numero_identidad.required' => 'El campo número de identidad es obligatorio',
            'numero_identidad.unique' => 'El número de identidad ya está en uso',
            'sexo.required' => 'El campo sexo es obligatorio',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'telefono_celular.required' => 'El campo teléfono celular es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El email ya está en uso',
            'email_confirmation' => 'La confirmación del correo eletrónico no coincide',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o carácter especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
            'telefono.regex' => 'El número de teléfono fijo sólo debe contener números y guiones',
            'telefono_celular.regex' => 'El número de celular sólo debe contener números y guiones',
            'profile_image.image' => 'El archivo debe ser una imagen.',
            'profile_image.mimes' => 'La imagen debe ser de tipo: jpg, jpeg, png.',
            'profile_image.max' => 'La imagen no debe exceder los 2MB.',
            'facebook_link.url' => 'El enlace de Facebook debe ser una URL válida.',
            'twitter_link.url' => 'El enlace de Twitter debe ser una URL válida.',
            'bio.max' => 'La biografía no debe exceder los 1000 caracteres.',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:40',
            'name2' => 'nullable|string|max:40',
            'apellido' => 'required|string|max:40',
            'apellido2' => 'nullable|string|max:40',
            'numero_identidad' => 'required|string|max:15',
            'numero_colegiacion' => 'nullable|string|max:12',
            'rtn' => 'nullable|string|max:16',
            'sexo' => 'required|string',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:15',
            'telefono_celular' => 'required|string|max:15',
            'email' => 'required|email',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'bio' => 'nullable|string',
        ]);

        $user = Auth::user();
        $user->update($request->only([
            'name',
            'name2',
            'apellido',
            'apellido2',
            'numero_identidad',
            'numero_colegiacion',
            'rtn',
            'sexo',
            'fecha_nacimiento',
            'telefono',
            'telefono_celular',
            'email',
            'facebook_link',
            'twitter_link',
            'bio',
        ]));

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images');
            $user->profile_image = $path;
            $user->save();
        }

        return redirect()->route('profile.show')->with('success', 'Perfil actualizado correctamente');
    }

    public function updatePassword(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed|regex:/[A-Za-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
        ], [
            'current_password.required' => 'La contraseña actual es obligatoria.',
            'new_password.required' => 'La nueva contraseña es obligatoria.',
            'new_password.min' => 'La nueva contraseña debe tener al menos 8 caracteres.',
            'new_password.confirmed' => 'La confirmación de la nueva contraseña no coincide.',
            'new_password.regex' => 'La nueva contraseña debe contener al menos una letra, un número y un símbolo especial.',
        ]);

        // Obtener el usuario autenticado
        $user = Auth::user();

        // Verificar la contraseña actual
        if (!\Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }

        // Actualizar la contraseña
        $user->password = \Hash::make($request->input('new_password'));
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('profile.show')->with('success', 'Contraseña actualizada correctamente.');
    }

    public function showChangePasswordForm()
    {
        return view('profile.cambiar-contrasenia');
    }

}
