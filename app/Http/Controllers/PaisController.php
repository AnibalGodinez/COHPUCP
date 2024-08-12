<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ver paises', ['only' => ['view']]);
        $this->middleware('permission:indice paises', ['only' => ['index']]);
        $this->middleware('permission:actualizar pais', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear pais', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar pais', ['only' => ['destroy']]);
    }

    public function index()
    {
        $paises = Pais::all();
        return view('pais.index', compact('paises'));
    }

    public function create()
    {
        return view('pais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
        ]);

        Pais::create($request->all());

        return redirect()->route('pais.index')->with('success', 'País creado con éxito.');
    }

    public function edit(Pais $pai)
    {
        return view('pais.edit', compact('pai'));
    }

    public function update(Request $request, Pais $pai)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255',
        ]);

        $pai->update($request->all());

        return redirect()->route('pais.index')->with('success', 'País actualizado con éxito.');
    }

    public function destroy(Pais $pai)
    {
        $pai->delete();

        return redirect()->route('pais.index')->with('success', 'País eliminado con éxito.');
    }

    public function view()
    {
        $paises = Pais::all();
        return view('pais.view', compact('paises'));
    }
}
