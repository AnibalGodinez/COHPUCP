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
        ]);

        Sexo::create($request->all());

        return redirect()->route('sexos.index')
                        ->with('success', 'Sexo creado exitosamente.');
    }

    public function show(Sexo $sexo)
    {
        //
    }

    public function edit(Sexo $sexo)
    {
        return view('sexos.edit', compact('sexo'));
    }

    public function update(Request $request, Sexo $sexo)
    {
        $request->validate([
            'nombre' => 'required|unique:sexos,nombre,'.$sexo->id.'|max:255',
        ]);

        $sexo->update($request->all());

        return redirect()->route('sexos.index')
                        ->with('success', 'Sexo actualizado exitosamente.');
    }

    public function destroy(Sexo $sexo)
    {
        $sexo->delete();

        return redirect()->route('sexos.index')
                        ->with('success', 'Sexo eliminado exitosamente.');
    }
}
