<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

class ProfileController extends Controller
{
    /**
     * Mostrar la información del perfil del usuario logeado.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        return view('profile.index');
    }

    /**
     * Mostrar el formulario para editar el perfil.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Mostrar el formulario para editar el perfil.
     *
     * @return \Illuminate\View\View
     */
    public function cambiarContasenia()
    {
        return view('profile.contrasenia');
    }

    /**
     * Actualizar el perfil
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Perfil actualizado exitosamente.'));
    }

    /**
     * Cambiar la contraseña
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña actualizada exitosamente.'));
    }
}
