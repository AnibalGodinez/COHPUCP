<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
{
    $search = $request->query('search');

    $cursos = Curso::query();

    if ($search) {
        $cursos->where('id', 'LIKE', "%{$search}%")
               ->orWhere('nombre', 'LIKE', "%{$search}%")
               ->orWhere('descripcion', 'LIKE', "%{$search}%");
    }

    $cursos = $cursos->paginate(3);

    return view('cursos.index', compact('cursos', 'search'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image',
        ]);

        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->user_id = auth()->id(); // Asocia el curso al usuario autenticado

        $curso->save(); // Asegúrate de llamar al método save() en la instancia del modelo

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image',
        ]);

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito');
    }
}
