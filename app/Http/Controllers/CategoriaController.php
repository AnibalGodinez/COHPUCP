<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar una lista de las categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Mostrar el formulario para crear un nueva categoría
    public function create()
    {
        return view('categorias.create');
    }

    // Guardar un nueva nueva categoría en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias|max:255',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')
                         ->with('success', 'Categoría creada exitosamente.');
    }


    // Mostrar el formulario para editar una categoría en específico
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }


    // Actualizar un categoría específico en la base de datos
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nombre' => 'required|unique:categorias,nombre,' . $categoria->id . '|max:255',
        ]);

        $categoria->update($request->all());

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoría actualizada exitosamente.');
    }


    // Eliminar un categoría específico de la base de datos
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')
                        ->with('success', 'Categoría eliminada exitosamente.');
    }

}
