<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Pais;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver perfil', ['only' => ['index']]);
        $this->middleware('permission:actualizar perfil', ['only' => ['update', 'edit']]);
        $this->middleware('permission:actualizar contraseña perfil', ['only' => ['cambiarContrasenia', 'password']]);
    }

    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Pasar el usuario a la vista
        return view('profile.index', compact('user'));
    }

    public function edit()
{
    $editMode = true;
    $user = auth()->user();
    $paises = Pais::all();

    return view('profile.edit', compact('editMode', 'user', 'paises'));
}


    public function cambiarContrasenia()
    {
        return view('profile.contrasenia');
    }

    public function update(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('La información del perfil se ha actualizado exitosamente'));
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('La contraseña se ha actualizado exitosamente'));
    }
}
