<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NumeroColegiacionController extends Controller
{
    public function index(Request $request)
    {
        // Obtener el término de búsqueda del request
        $search = $request->input('search');

        // Consultar usuarios que no tienen número de colegiación asignado y filtrar por el término de búsqueda
        $usuariosSinColegiacion = User::whereNull('numero_colegiacion')
            ->where(function ($query) use ($search) {
                $query->where('id', 'like', '%' . $search . '%')
                      ->orWhere('name', 'like', '%' . $search . '%')
                      ->orWhere('name2', 'like', '%' . $search . '%')
                      ->orWhere('apellido', 'like', '%' . $search . '%')
                      ->orWhere('apellido2', 'like', '%' . $search . '%')
                      ->orWhere('numero_identidad', 'like', '%' . $search . '%')
                      ->orWhere('telefono_celular', 'like', '%' . $search . '%')
                      ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->get();

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
