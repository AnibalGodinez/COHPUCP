<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Idioma;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CursoController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ver cursos', ['only' => ['viewCursos']]);
        $this->middleware('permission:indice cursos', ['only' => ['index']]);
        $this->middleware('permission:actualizar cursos', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear cursos', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar cursos', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search = $request->query('search');

        $cursos = Curso::query();

        if ($search) {
            $cursos->where('id', 'LIKE', "%{$search}%")
                   ->orWhere('layout', 'LIKE', "%{$search}%")
                   ->orWhere('titulo', 'LIKE', "%{$search}%")
                   ->orWhere('nombre', 'LIKE', "%{$search}%")
                   ->orWhere('descripcion', 'LIKE', "%{$search}%")
                   ->orWhere('precio', 'LIKE', "%{$search}%");
        }

        $cursos = $cursos->paginate(3);

        return view('cursos.index', compact('cursos', 'search'));
    }

    public function show(Curso $curso)
    {
        return view('cursos.show', compact('curso'));
    }


    public function create()
    {
        $idiomas = Idioma::all();
        $categorias = Categoria::all();

        return view('cursos.create', compact('idiomas', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'layout' => 'nullable|string|in:Imagen de fondo,Imagen a la derecha,Tarjetas de cursos',
            'titulo' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|string|max:255',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma_id' => 'nullable|exists:idiomas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
        ]);

        $curso = new Curso;
        $curso->layout = $request->layout;
        $curso->titulo = $request->titulo;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->icono = $request->icono;
        $curso->calificacion = $request->calificacion;
        $curso->idioma_id = $request->idioma_id;
        $curso->categoria_id = $request->categoria_id;
        $curso->user_id = auth()->id();

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('cursos_images', 'public');
            $curso->imagen = basename($path);
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('status', '¡Curso creado con éxito!');
    }

    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $idiomas = Idioma::all();
        $categorias = Categoria::all();

        return view('cursos.edit', compact('curso', 'idiomas', 'categorias'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'layout' => 'nullable|string|in:Imagen de fondo,Imagen a la derecha,Tarjetas de cursos',
            'titulo' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'nullable|string|max:255',
            'enlace' => 'nullable|url',
            'icono' => 'nullable|url',
            'calificacion' => 'nullable|numeric|min:0|max:10',
            'idioma_id' => 'nullable|exists:idiomas,id',
            'categoria_id' => 'nullable|exists:categorias,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
        ]);

        $curso->layout = $request->layout;
        $curso->titulo = $request->titulo;
        $curso->nombre = $request->nombre;
        $curso->descripcion = $request->descripcion;
        $curso->precio = $request->precio;
        $curso->enlace = $request->enlace;
        $curso->icono = $request->icono;
        $curso->calificacion = $request->calificacion;
        $curso->idioma_id = $request->idioma_id;
        $curso->categoria_id = $request->categoria_id;

        if ($request->hasFile('imagen')) {
            // Elimina la imagen antigua si existe
            if ($curso->imagen && Storage::exists("public/cursos_images/{$curso->imagen}")) {
                Storage::delete("public/cursos_images/{$curso->imagen}");
            }

            // Guarda la nueva imagen y actualiza el nombre
            $path = $request->file('imagen')->store('cursos_images', 'public');
            $curso->imagen = basename($path);
        }

        // Elimina la imagen si se selecciona la opción
        if ($request->has('remove_image') && $curso->imagen) {
            if (Storage::exists("public/cursos_images/{$curso->imagen}")) {
                Storage::delete("public/cursos_images/{$curso->imagen}");
            }
            $curso->imagen = null;
        }

        $curso->save();

        return redirect()->route('cursos.index')->with('status', '¡Curso actualizado con éxito!');
    }

    public function destroy(Curso $curso)
    {
        // Elimina la imagen asociada si existe
        if ($curso->imagen && Storage::exists("public/cursos_images/{$curso->imagen}")) {
            Storage::delete("public/cursos_images/{$curso->imagen}");
        }

        $curso->delete();

        return redirect()->route('cursos.index')->with('status', '¡Curso eliminado con éxito!');
    }

    public function viewCursos()
    {
        $cursos = Curso::with(['idioma', 'categoria', 'user'])->get();
        return view('cursos.view', compact('cursos'));
    }

}
