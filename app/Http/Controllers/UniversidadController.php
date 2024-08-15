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
        ]);

        Universidad::create($request->all());
        return redirect()->route('universidades.index');
    }

    public function show(Universidad $universidad)
    {
        return view('universidades.show', compact('universidad'));
    }

    public function edit(Universidad $universidad)
    {
        return view('universidades.edit', compact('universidad'));
    }

    public function update(Request $request, Universidad $universidad)
    {
        $request->validate([
            'nombre_universidad' => 'required|string|max:255',
        ]);

        $universidad->update($request->only('nombre_universidad'));

        return redirect()->route('universidades.index')->with('success', 'Universidad actualizada con éxito.');
    }


    public function destroy(Universidad $universidad)
    {
        $universidad->delete();
        return redirect()->route('universidades.index');
    }
}