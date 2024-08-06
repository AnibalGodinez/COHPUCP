<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\Idioma; // Agregar el modelo Idioma
use App\Models\Categoria; // Agregar el modelo Categoria
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
        $idiomas = Idioma::all(); // Obtiene todos los idiomas
        $categorias = Categoria::all(); // Obtiene todas las categorías

        return view('cursos.create', compact('idiomas', 'categorias'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'layout' => 'nullable|string|in:Imagen de fondo,Imagen a la derecha,Tarjetas de cursos',
            'titulo' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma_id' => 'nullable|exists:idiomas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $curso = new Curso;
        $curso->layout = $request->layout; // Asegúrate de que el layout se está guardando
        $curso->titulo = $request->titulo;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->icono = $request->icono;
        $curso->calificacion = $request->calificacion;
        $curso->idioma_id = $request->idioma_id; // Guardar el id del idioma
        $curso->categoria_id = $request->categoria_id; // Guardar el id de la categoría
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
        $idiomas = Idioma::all(); // Obtener todos los idiomas
        $categorias = Categoria::all(); // Obtener todas las categorías

        return view('cursos.edit', compact('curso', 'idiomas', 'categorias'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'layout' => 'nullable|string|in:Imagen de fondo,Imagen a la derecha,Tarjetas de cursos',
            'titulo' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|numeric|min:0',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma_id' => 'nullable|exists:idiomas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $curso->layout = $request->layout; // Actualizar el layout
        $curso->titulo = $request->titulo;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->icono = $request->icono;
        $curso->calificacion = $request->calificacion;
        $curso->idioma_id = $request->idioma_id; // Actualizar el id del idioma
        $curso->categoria_id = $request->categoria_id; // Actualizar el id de la categoría

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
