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
            'nombre_universidad' => 'required|string|max:255|unique:universidades,nombre_universidad',
        ], [
            'nombre_universidad.unique' => 'El nombre de la universidad ya existe. Por favor, elija otro nombre.',
            'nombre_universidad.required' => 'El nombre de la universidad es obligatorio',
        ]);

        Universidad::create($request->all());

        return redirect()->route('universidades.index')->with('status', '¡Universidad creada con éxito!');
    }

    public function edit($id)
    {
        $universidad = Universidad::findOrFail($id);
        return view('universidades.edit', compact('universidad'));
    }

    public function update(Request $request, $id)
    {
        $universidad = Universidad::findOrFail($id);

        $request->validate([
            'nombre_universidad' => 'required|string|max:255|unique:universidades,nombre_universidad,' . $id,
        ], [
            'nombre_universidad.unique' => 'El nombre de la universidad ya existe. Por favor, elija otro nombre.',
            'nombre_universidad.required' => 'El nombre de la universidad es obligatorio',
        ]);

        $universidad->update($request->only('nombre_universidad'));

        return redirect()->route('universidades.index')->with('status', '¡Universidad actualizada con éxito!');
    }

    public function destroy($id)
    {
        $universidad = Universidad::findOrFail($id);
        $universidad->delete();

        return redirect()->route('universidades.index')->with('status', '¡Universidad eliminada con éxito!');
    }

}