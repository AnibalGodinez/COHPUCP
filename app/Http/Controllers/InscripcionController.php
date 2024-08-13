<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
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
            'imagen_titulo_original' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_tamano_carnet' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'pdf_curriculum_vitae' => 'required|mimes:pdf',
            'imagen_dni_beneficiario1' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni_beneficiario2' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni_beneficiario3' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_rtn' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
        ]);

        // Guardar archivos y datos
        $inscripcion = new Inscripcion();
        $inscripcion->fill($request->all());

        if ($request->hasFile('imagen_titulo_original')) {
            $inscripcion->imagen_titulo_original = $request->file('imagen_titulo_original')->store('documentos');
        }

        if ($request->hasFile('imagen_dni')) {
            $inscripcion->imagen_dni = $request->file('imagen_dni')->store('documentos');
        }

        if ($request->hasFile('imagen_tamano_carnet')) {
            $inscripcion->imagen_tamano_carnet = $request->file('imagen_tamano_carnet')->store('documentos');
        }

        if ($request->hasFile('pdf_curriculum_vitae')) {
            $inscripcion->pdf_curriculum_vitae = $request->file('pdf_curriculum_vitae')->store('documentos');
        }

        if ($request->hasFile('imagen_dni_beneficiario1')) {
            $inscripcion->imagen_dni_beneficiario1 = $request->file('imagen_dni_beneficiario1')->store('documentos');
        }

        if ($request->hasFile('imagen_dni_beneficiario2')) {
            $inscripcion->imagen_dni_beneficiario2 = $request->file('imagen_dni_beneficiario2')->store('documentos');
        }

        if ($request->hasFile('imagen_dni_beneficiario3')) {
            $inscripcion->imagen_dni_beneficiario3 = $request->file('imagen_dni_beneficiario3')->store('documentos');
        }

        if ($request->hasFile('imagen_rtn')) {
            $inscripcion->imagen_rtn = $request->file('imagen_rtn')->store('documentos');
        }

        $inscripcion->save();

        // Enviar correo de confirmación
        Mail::to($inscripcion->correo_electronico)
            ->send(new InscripcionStatusMail($inscripcion, 'pendiente'));

        return redirect()->back()->with('status', 'Solicitud de inscripción enviada.');
    }
}
