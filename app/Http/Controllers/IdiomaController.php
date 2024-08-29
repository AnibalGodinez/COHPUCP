<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:indice idiomas', ['only' => ['index']]);
        $this->middleware('permission:actualizar idioma', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear idioma', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar idioma', ['only' => ['destroy']]);
    }

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
        ], [
            'nombre.unique' => 'El nombre del idioma ya existe. Por favor, elija otro nombre.',
        ]);

        Idioma::create($request->all());

        return redirect()->route('idiomas.index')
                        ->with('status', '¡Idioma creado con éxito!');
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
        ], [
            'nombre.unique' => 'El nombre del idioma ya existe. Por favor, elija otro nombre.',
        ]);

        $idioma->update($request->all());

        return redirect()->route('idiomas.index')
                        ->with('status', '¡Idioma actualizado con éxito!');
    }

    // Eliminar un idioma específico de la base de datos
    public function destroy(Idioma $idioma)
    {
        $idioma->delete();

        return redirect()->route('idiomas.index')
                         ->with('status', '¡Idioma eliminado con éxito!');
    }
}
