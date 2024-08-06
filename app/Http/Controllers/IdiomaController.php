<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    // Mostrar una lista de los idiomas
    public function index()
    {
        $idiomas = Idioma::all();
        return view('idiomas.index', compact('idiomas'));
    }

    // Mostrar el formulario para crear un nuevo idioma
    public function create()
    {
        return view('idiomas.create');
    }

    // Guardar un nuevo idioma en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:idiomas|max:255',
        ]);

        Idioma::create($request->all());

        return redirect()->route('idiomas.index')
                         ->with('success', 'Idioma creado exitosamente.');
    }


    // Mostrar el formulario para editar un idioma específico
    public function edit(Idioma $idioma)
    {
        return view('idiomas.edit', compact('idioma'));
    }

    // Actualizar un idioma específico en la base de datos
    public function update(Request $request, Idioma $idioma)
    {
        $request->validate([
            'nombre' => 'required|unique:idiomas,nombre,' . $idioma->id . '|max:255',
        ]);

        $idioma->update($request->all());

        return redirect()->route('idiomas.index')
                         ->with('success', 'Idioma actualizado exitosamente.');
    }

    // Eliminar un idioma específico de la base de datos
    public function destroy(Idioma $idioma)
    {
        $idioma->delete();

        return redirect()->route('idiomas.index')
                         ->with('success', 'Idioma eliminado exitosamente.');
    }
}
