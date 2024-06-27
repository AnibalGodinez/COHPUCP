<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;

    class ProfileController extends Controller
    {

    public function __construct()
    {
        $this->middleware('permission:ver perfil', ['only' => ['index']]);
        $this->middleware('permission:actualizar perfil', ['only' => ['update','edit']]);
        $this->middleware('permission:actualizar contrasenia perfil', ['only' => ['cambiarContasenia']]);
    }

//-----------------------------------------------------------------------------------------------------------------
    public function index()
    {
        return view('profile.index');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function edit()
    {
        return view('profile.edit');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function cambiarContasenia()
    {
        return view('profile.contrasenia');
    }

//-----------------------------------------------------------------------------------------------------------------
    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Perfil actualizado exitosamente.'));
    }
    
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('Contraseña actualizada exitosamente.'));
    }
}
