<?php

namespace App\Http\Controllers;

use App\Models\NumeroColegiacion;
use App\Models\User;
use Illuminate\Http\Request;

class NumeroColegiacionController extends Controller
{
    public function index()
    {
        // Obtener solo los usuarios que no tienen número de colegiación asignado
        $usuariosSinColegiacion = User::whereNull('numero_colegiacion')->get();

        return view('numero_colegiacion.index', compact('usuariosSinColegiacion'));
    }

    public function create(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        return view('numero_colegiacion.create', compact('user'));
    }


    public function store(Request $request)
    {
        // Validar el campo número de colegiación
        $request->validate([
            'numero_colegiacion' => 'required|string|max:12|unique:users,numero_colegiacion',
            'user_id' => 'required|exists:users,id',
        ]);

        // Encontrar al usuario y actualizar el número de colegiación
        $user = User::findOrFail($request->user_id);
        $user->numero_colegiacion = $request->numero_colegiacion;
        $user->save();

        // Redireccionar a la vista index con un mensaje de éxito
        return redirect()->route('numero_colegiacion.index')->with('status', '¡El número de colegiación ha sido asignado con éxito al usuario!');
    }

}
