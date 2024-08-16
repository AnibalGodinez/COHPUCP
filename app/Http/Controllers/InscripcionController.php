<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Inscripcion;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{
    public function create()
    {
        $universidades = Universidad::all(); // Se obtiene todas las universidades
        return view('inscripciones.create', compact('universidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // I. Datos Personales
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|max:20|unique:inscripciones,numero_identidad',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:255',
            'direccion_residencia' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:40',
            'telefono_celular' => 'required|string|max:40',
            'email' => 'required|email|max:255|unique:inscripciones,email',

            // II. Datos Profesionales
            'fecha_graduacion' => 'required|date',
            'universidad' => 'required|string|max:255',
            'nombre_empresa_trabajo_actual' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'direccion_empresa' => 'nullable|string|max:255',
            'correo_empresa' => 'nullable|email|max:255',
            'telefono_empresa' => 'nullable|string|max:255',
            'extension_telefono_empresa' => 'nullable|string|max:255',

            // III. Información Adicional
            'especialidad_1' => 'nullable|string|max:255',
            'lugar_especialidad_1' => 'nullable|string|max:255',
            'fecha_especialidad_1' => 'nullable|date',

            'especialidad_2' => 'nullable|string|max:255',
            'lugar_especialidad_2' => 'nullable|string|max:255',
            'fecha_especialidad_2' => 'nullable|date',

            // IV. Cursos de especialización
            'nombre_curso_especializacion' => 'nullable|string|max:255',
            'lugar_curso' => 'nullable|string|max:255',
            'fecha_curso' => 'nullable|date',

            // V. Experiencia Profesional
            'nombre_empresa1' => 'nullable|string|max:255',
            'cargo_empresa1' => 'nullable|string|max:255',
            'duración_empresa1' => 'nullable|string|max:255',

            'nombre_empresa2' => 'nullable|string|max:255',
            'cargo_empresa2' => 'nullable|string|max:255',
            'duración_empresa2' => 'nullable|string|max:255',

            // VI. Misiones Desempeñadas
            'comisiones' => 'nullable|string',
            'representaciones' => 'nullable|string',
            'delegaciones' => 'nullable|string',

            // VII. Extras
            'publicacion_documentos' => 'nullable|string',
            'publicaciones' => 'nullable|string',
            'publicacion_libro' => 'nullable|string',

            // VIII. Documentos
            'imagen_titulo' => 'nullable|array',
            'imagen_titulo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        // Manejo de las imágenes del título
        $rutasArchivosTitulos = [];
        if ($request->hasFile('imagen_titulo')) {
            foreach ($request->file('imagen_titulo') as $imagenTitulo) {
                $nombreArchivoTitulo = time() . '_' . $imagenTitulo->getClientOriginalName();
                $rutaArchivoTitulo = $imagenTitulo->storeAs('imgsTitulos_inscripcion', $nombreArchivoTitulo, 'public');
                $rutasArchivosTitulos[] = $rutaArchivoTitulo;
            }
        }

        // Manejo del currículum vitae
        $rutaArchivoCV = null;
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $nombreArchivoCV = time() . '_' . $cv->getClientOriginalName();
            $rutaArchivoCV = $cv->storeAs('cvs_inscripcion', $nombreArchivoCV, 'public');
        }

        Inscripcion::create([
            'user_id' => Auth::id(), // Asegurarse de que Auth::id() retorne un valor válido
            'fecha_inscripcion' => Carbon::now()->toDateString(),

            // I. Datos Personales
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'lugar_nacimiento' => $request->lugar_nacimiento,
            'direccion_residencia' => $request->direccion_residencia,
            'telefono' => $request->telefono,
            'telefono_celular' => $request->telefono_celular,
            'email' => $request->email,

            // II. Datos Profesionales
            'fecha_graduacion' => $request->fecha_graduacion,
            'universidad' => $request->universidad,
            'nombre_empresa_trabajo_actual' => $request->nombre_empresa_trabajo_actual,
            'cargo' => $request->cargo,
            'direccion_empresa' => $request->direccion_empresa,
            'correo_empresa' => $request->correo_empresa,
            'telefono_empresa' => $request->telefono_empresa,
            'extension_telefono_empresa' => $request->extension_telefono_empresa,

            // III. Información Adicional
            'especialidad_1' => $request->especialidad_1,
            'lugar_especialidad_1' => $request->lugar_especialidad_1,
            'fecha_especialidad_1' => $request->fecha_especialidad_1,

            'especialidad_2' => $request->especialidad_2,
            'lugar_especialidad_2' => $request->lugar_especialidad_2,
            'fecha_especialidad_2' => $request->fecha_especialidad_2,

            // IV. Cursos de especialización
            'nombre_curso_especializacion' => $request->nombre_curso_especializacion,
            'lugar_curso' => $request->lugar_curso,
            'fecha_curso' => $request->fecha_curso,

            // V. Experiencia Profesional
            'nombre_empresa1' => $request->nombre_empresa1,
            'cargo_empresa1' => $request->cargo_empresa1,
            'duración_empresa1' => $request->duración_empresa1,

            'nombre_empresa2' => $request->nombre_empresa2,
            'cargo_empresa2' => $request->cargo_empresa2,
            'duración_empresa2' => $request->duración_empresa2,

            // VI. Misiones Desempeñadas
            'comisiones' => $request->comisiones,
            'representaciones' => $request->representaciones,
            'delegaciones' => $request->delegaciones,

            // VII. Extras
            'publicacion_documentos' => $request->publicacion_documentos,
            'publicaciones' => $request->publicaciones,
            'publicacion_libro' => $request->publicacion_libro,

            // VIII. Datos Profesionales
            'imagen_titulo' => json_encode($rutasArchivosTitulos),
            'cv' => $rutaArchivoCV,
        ]);

        return redirect()->route('inscripciones.create')->with('success', 'Inscripción enviada correctamente.');
    }


}
