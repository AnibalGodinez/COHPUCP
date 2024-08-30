<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{
    public function index()
    {
        $universidades = Universidad::all();
        return view('universidades.index', compact('universidades'));
    }

    public function create()
    {
        return view('universidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_universidad' => 'required|string|max:255',
        ], [
            'nombre_universidad.unique' => 'El nombre de la universidad ya existe. Por favor, elija otro nombre.',
            'nombre_universidad.required' => 'El nombre de la universidad es obligatorio',
        ]);

        Universidad::create($request->all());

        return redirect()->route('universidades.index')->with('status', '¡Universidad creada con éxito!');
    }

    public function edit(Universidad $universidad)
    {
        return view('universidades.edit', compact('universidad'));
    }

    public function update(Request $request, Universidad $universidad)
    {
        $request->validate([
            'nombre_universidad' => 'required|string|max:255',
        ], [
            'nombre_universidad.unique' => 'El nombre de la universidad ya existe. Por favor, elija otro nombre.',
            'nombre_universidad.required' => 'El nombre de la universidad es obligatorio',
        ]);

        $universidad->update($request->all());

        return redirect()->route('universidades.index')->with('status', '¡Universidad actualizada con éxito!');
    }


    public function destroy(Universidad $universidad)
    {
        $universidad->delete();
        return redirect()->route('universidades.index')->with('status', '¡Universidad eliminada con éxito!');
    }
}