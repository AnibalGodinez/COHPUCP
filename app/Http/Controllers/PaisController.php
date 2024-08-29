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

    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $paises = Pais::where('nombre', 'LIKE', "%{$search}%")
                        ->orWhere('codigo', 'LIKE', "%{$search}%")
                        ->paginate(10);
        } else {
            $paises = Pais::paginate(10);
        }

        return view('pais.index', compact('paises'));
    }


    public function create()
    {
        return view('pais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:pais,nombre',
            'codigo' => 'required|string|max:255',
        ], [
            'nombre.unique' => 'El nombre del país ya está registrado. Por favor, elige otro nombre.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El nombre del país no debe exceder los 255 caracteres.',
            'codigo.required' => 'El campo código es obligatorio.',
            'codigo.max' => 'El código del país no debe exceder los 255 caracteres.',
        ]);

        Pais::create($request->all());

        return redirect()->route('pais.index')->with('status', '¡País creado con éxito!');
    }

    public function edit(Pais $pai)
    {
        return view('pais.edit', compact('pai'));
    }

    public function update(Request $request, Pais $pai)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:pais,nombre,' . $pai->id,
            'codigo' => 'required|string|max:255',
        ], [
            'nombre.unique' => 'El nombre del país ya está registrado. Por favor, elige otro nombre.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El nombre del país no debe exceder los 255 caracteres.',
            'codigo.required' => 'El campo código es obligatorio.',
            'codigo.max' => 'El código del país no debe exceder los 255 caracteres.',
        ]);

        $pai->update($request->all());

        return redirect()->route('pais.index')->with('status', '¡País actualizado con éxito!');
    }

    public function destroy($id)
    {
        try {
            $pais = Pais::findOrFail($id);
            $pais->delete();
            return redirect()->route('pais.index')->with('status', '¡País eliminado con éxito!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('pais.index')->with('error', 'No se puede eliminar este país porque está relacionado con otros registros.');
        }
    }


    public function view()
    {
        $paises = Pais::all();
        return view('pais.view', compact('paises'));
    }
}
