<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{

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

    public function create()
    {
        $users = User::all(); // Obtiene todos los usuarios
        return view('cursos.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'enlace' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma' => 'nullable|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->calificacion = $request->calificacion;
        $curso->idioma = $request->idioma;
        $curso->user_id = auth()->id(); // Asocia el curso al usuario autenticado

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('cursos_images', 'public');
            $curso->imagen = basename($path); // Solo el nombre del archivo
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso creado con éxito');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $users = User::all(); // Obtener todos los usuarios

        return view('cursos.edit', compact('curso', 'users'));
    }


    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
            'enlace' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma' => 'nullable|string|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->calificacion = $request->calificacion;
        $curso->idioma = $request->idioma;

        if ($request->hasFile('imagen')) {
            // Elimina la imagen antigua si existe
            if ($curso->imagen && Storage::exists("public/cursos_images/{$curso->imagen}")) {
                Storage::delete("public/cursos_images/{$curso->imagen}");
            }

            // Guarda la nueva imagen y actualiza el nombre
            $path = $request->file('imagen')->store('cursos_images', 'public');
            $curso->imagen = basename($path); // Solo el nombre del archivo
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado con éxito');
    }

    public function destroy(Curso $curso)
    {
        // Elimina la imagen asociada si existe
        if ($curso->imagen && Storage::exists("public/cursos_images/{$curso->imagen}")) {
            Storage::delete("public/cursos_images/{$curso->imagen}");
        }

        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado con éxito');
    }

    public function viewCursos()
    {
        $cursos = Curso::all(); // Obtener todos los cursos
        return view('cursos.view', compact('cursos'));
    }
}
