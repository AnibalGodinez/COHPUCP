<?php

namespace App\Http\Controllers;

use App\Models\NumeroColegiacion;
use App\Models\User;
use Illuminate\Http\Request;

class NumeroColegiacionController extends Controller
{
    public function index()
    {
        $numeros = NumeroColegiacion::with('user')->get();
        return view('numero_colegiacion.index', compact('numeros'));
    }

    public function create()
    {
        $users = User::doesntHave('numeroColegiacion')->get();
        return view('numero_colegiacion.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero_colegiacion' => 'required|unique:numero_colegiacion,numero_colegiacion',
            'user_id' => 'required|exists:users,id|unique:numero_colegiacion,user_id',
        ]);

        NumeroColegiacion::create($request->all());

        return redirect()->route('numero_colegiacion.index')->with('success', 'Número de colegiación creado con éxito.');
    }

    public function edit(NumeroColegiacion $numeroColegiacion)
    {
        return view('numero_colegiacion.edit', compact('numeroColegiacion'));
    }

    public function update(Request $request, NumeroColegiacion $numeroColegiacion)
    {
        $request->validate([
            'numero_colegiacion' => 'required|unique:numero_colegiacion,numero_colegiacion,' . $numeroColegiacion->id,
        ]);

        $numeroColegiacion->update($request->all());

        return redirect()->route('numero_colegiacion.index')->with('success', 'Número de colegiación actualizado con éxito.');
    }

    public function destroy(NumeroColegiacion $numeroColegiacion)
    {
        $numeroColegiacion->delete();

        return redirect()->route('numero_colegiacion.index')->with('success', 'Número de colegiación eliminado con éxito.');
    }
}
