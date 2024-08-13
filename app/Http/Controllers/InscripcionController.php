<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        $validatedData = $request->validate([
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
            'imagen_titulo_original' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_tamano_carnet' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'pdf_curriculum_vitae' => 'nullable|mimes:pdf',
            'imagen_dni_beneficiario1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni_beneficiario2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_dni_beneficiario3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
            'imagen_rtn' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff|max:20480', // 20 MB 
        ]);

        try {
            // Guardar archivos
            $filePaths = [];

            foreach (['imagen_titulo_original', 'imagen_dni', 'imagen_tamano_carnet', 'pdf_curriculum_vitae', 'imagen_dni_beneficiario1', 'imagen_dni_beneficiario2', 'imagen_dni_beneficiario3', 'imagen_rtn'] as $file) {
                if ($request->hasFile($file)) {
                    $filePaths[$file] = $request->file($file)->store('documentos', 'public');
                }
            }

            // Crear inscripcion
            $inscripcion = new Inscripcion();
            $inscripcion->fill($validatedData);

            foreach ($filePaths as $key => $path) {
                $inscripcion->$key = $path;
            }

            $inscripcion->save();

            // Enviar correo de confirmación
            Mail::to($inscripcion->correo_electronico)
                ->send(new InscripcionStatusMail($inscripcion, 'pendiente'));

            return redirect()->back()->with('status', 'Solicitud de inscripción enviada.');
        } catch (\Exception $e) {
            // Log the error message
            Log::error('Error al guardar inscripción: ' . $e->getMessage());

            return redirect()->back()->with('error', 'No se pudo enviar la inscripción.')->withInput();
        }
    }
}
