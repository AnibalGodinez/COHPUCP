<?php

namespace App\Http\Controllers;

use App\Models\Sexo;
use Illuminate\Http\Request;

class SexoController extends Controller
{
    public function index()
    {
        $sexos = Sexo::all();
        return view('sexos.index', compact('sexos'));
    }

    public function create()
    {
        return view('sexos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:sexos|max:255',
        ], [
            'nombre.unique' => 'Este género sexual ya existe.',
            'nombre.required' => 'El nombre del género sexual es obligatorio.',
            'nombre.max' => 'El nombre del género sexual no puede tener más de 255 caracteres.',
        ]);

        Sexo::create($request->all());

        return redirect()->route('sexos.index')
                        ->with('status', '¡Género sexual creado con éxito!');
    }


    public function edit(Sexo $sexo)
    {
        return view('sexos.edit', compact('sexo'));
    }

    public function update(Request $request, Sexo $sexo)
    {
        $request->validate([
            'nombre' => 'required|unique:sexos,nombre,' . $sexo->id . '|max:255',
        ], [
            'nombre.unique' => 'Este género sexual ya existe.',
            'nombre.required' => 'El nombre del género sexual es obligatorio.',
            'nombre.max' => 'El nombre del género sexual no puede tener más de 255 caracteres.',
        ]);

        $sexo->update($request->all());

        return redirect()->route('sexos.index')
                        ->with('status', '¡Género sexual actualizado con éxito!');
    }

    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return redirect()->route('sexos.index')
                        ->with('status', '¡Género sexual eliminado con éxito!');
    }
}
