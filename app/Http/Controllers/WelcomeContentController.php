<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Mail\InscripcionStatusMail;
use Illuminate\Support\Facades\Mail;

class InscripcionController extends Controller
{
    public function create()
    {
        return view('inscripciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha_solicitud' => 'required|date',

            // I. Datos Personales
            'primer_nombre' => 'required|string|max:255',
            'segundo_nombre' => 'nullable|string|max:255',
            'primer_apellido' => 'required|string|max:255',
            'segundo_apellido' => 'nullable|string|max:255',
            'dni' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'lugar_nacimiento' => 'nullable|string|max:255',
            'direccion_residencia' => 'nullable|string|max:255',
            'telefono_fijo' => 'nullable|string|max:255',
            'correo_electronico' => 'required|email|max:255',
            'celular' => 'required|string|max:255',

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
            'otros' => 'nullable|string',

            // VIII. Documentos
            'imagen_titulo_original' => 'nullable|image',
            'imagen_dni' => 'nullable|image',
            'imagen_tamano_carnet' => 'nullable|image',
            'pdf_curriculum_vitae' => 'nullable|mimes:pdf',
            'imagen_dni_beneficiario1' => 'nullable|image',
            'imagen_dni_beneficiario2' => 'nullable|image',
            'imagen_dni_beneficiario3' => 'nullable|image',
            'imagen_rtn' => 'nullable|image',
        ]);

        // Crear una carpeta única para la inscripción
        $userFolder = 'inscripcion_usuario/' . time();

        // Guardar archivos y datos
        $inscripcion = new Inscripcion();
        $inscripcion->fill($request->all());

        if ($request->hasFile('imagen_titulo_original')) {
            $inscripcion->imagen_titulo_original = $request->file('imagen_titulo_original')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_dni')) {
            $inscripcion->imagen_dni = $request->file('imagen_dni')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_tamano_carnet')) {
            $inscripcion->imagen_tamano_carnet = $request->file('imagen_tamano_carnet')->store($userFolder, 'public');
        }

        if ($request->hasFile('pdf_curriculum_vitae')) {
            $inscripcion->pdf_curriculum_vitae = $request->file('pdf_curriculum_vitae')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_dni_beneficiario1')) {
            $inscripcion->imagen_dni_beneficiario1 = $request->file('imagen_dni_beneficiario1')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_dni_beneficiario2')) {
            $inscripcion->imagen_dni_beneficiario2 = $request->file('imagen_dni_beneficiario2')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_dni_beneficiario3')) {
            $inscripcion->imagen_dni_beneficiario3 = $request->file('imagen_dni_beneficiario3')->store($userFolder, 'public');
        }

        if ($request->hasFile('imagen_rtn')) {
            $inscripcion->imagen_rtn = $request->file('imagen_rtn')->store($userFolder, 'public');
        }

        $inscripcion->save();

        // Enviar correo de confirmación
        Mail::to($inscripcion->correo_electronico)
            ->send(new InscripcionStatusMail($inscripcion, 'pendiente'));

        return redirect()->back()->with('status', 'Solicitud de inscripción enviada.');
    }
}
