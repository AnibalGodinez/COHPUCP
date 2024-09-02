<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\InscripcionFirma;
use Illuminate\Support\Facades\Auth;

class InscripcionFirmaController extends Controller
{
    // Mostrar la lista de inscripciones de firmas
    public function index()
    {
        $inscripcionFirmas = InscripcionFirma::all();
        return view('inscripcion_firmas.index', compact('inscripcionFirmas'));
    }

    // Mostrar detalles de una inscripción de firma específica
    public function show($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);
        return view('inscripcion_firmas.show', compact('inscripcionFirma'));
    }

    // Mostrar el formulario para crear una nueva inscripción de firma
    public function create()
    {
        return view('inscripcion_firmas.create');
    }

    // Almacenar una nueva inscripción de firma
    public function store(Request $request)
    {
        $request->validate([
            // I. Datos de la sociedad
            'nombre_sociedad' => 'required|string|max:255',
            'num_inscripcion_registro_publico_comercio' => 'nullable|string|max:255',
            'fecha_constitucion' => 'required|date',
            'registro_tributario_nacional' => 'nullable|string|max:255',
            'num_inscripcion_camara_comercio' => 'nullable|string|max:255',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string|max:40',
            'celular' => 'required|string|max:40',
            'email' => 'required|email|max:255|unique:inscripcion_firmas,email',

            // II. Datos de los socios
            'primer_nombre_socio1' => 'required|string|max:255',
            'segundo_nombre_socio1' => 'nullable|string|max:255',
            'primer_apellido_socio1' => 'required|string|max:255',
            'segundo_apellido_socio1' => 'nullable|string|max:255',
            'num_colegiacion_socio1' => 'nullable|string|max:255',
            'imagen_firma_socio1' => 'nullable|array',
            'imagen_firma_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'primer_nombre_socio2' => 'required|string|max:255',
            'segundo_nombre_socio2' => 'nullable|string|max:255',
            'primer_apellido_socio2' => 'required|string|max:255',
            'segundo_apellido_socio2' => 'nullable|string|max:255',
            'num_colegiacion_socio2' => 'nullable|string|max:255',
            'imagen_firma_socio2' => 'nullable|array',
            'imagen_firma_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'primer_nombre_socio3' => 'required|string|max:255',
            'segundo_nombre_socio3' => 'nullable|string|max:255',
            'primer_apellido_socio3' => 'required|string|max:255',
            'segundo_apellido_socio3' => 'nullable|string|max:255',
            'num_colegiacion_socio3' => 'nullable|string|max:255',
            'imagen_firma_socio3' => 'nullable|array',
            'imagen_firma_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_firma_social' => 'nullable|array',
            'imagen_firma_social.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_representante_legal' => 'nullable|array',
            'imagen_firma_representante_legal.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // III. Estado de la inscripción
            'estado' => 'required|in:pendiente,aprobado,rechazado',
            'descripcion_estado_solicitud' => 'nullable|string',
        ], [
            'imagen_firma_socio1.*.image' => 'El archivo firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio1.*.mimes' => 'El archivo firma digital del socio 1 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_socio1.*.max' => 'El archivo firma digital del socio 1 no debe exceder 10MB.',

            'imagen_firma_socio2.*.image' => 'El archivo firma digital del socio 2 debe ser una imagen.',
            'imagen_firma_socio2.*.mimes' => 'El archivo firma digital del socio 2 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_socio2.*.max' => 'El archivo firma digital del socio 2 no debe exceder 10MB.',

            'imagen_firma_socio3.*.image' => 'El archivo firma digital del socio 3 debe ser una imagen.',
            'imagen_firma_socio3.*.mimes' => 'El archivo firma digital del socio 3 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_socio3.*.max' => 'El archivo firma digital del socio 3 no debe exceder 10MB.',

            'imagen_firma_social.*.image' => 'El archivo firma social digital debe ser una imagen.',
            'imagen_firma_social.*.mimes' => 'El archivo firma social digital debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_social.*.max' => 'El archivo firma social digital no debe exceder 10MB.',

            'imagen_firma_representante_legal.*.image' => 'El archivo firma representante legal debe ser una imagen.',
            'imagen_firma_representante_legal.*.mimes' => 'El archivo firma representante legal debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_representante_legal.*.max' => 'El archivo firma representante legal no debe exceder 10MB.',

        ]);

        // Manejo de la imagen de la firma digital del socio 1
        $rutasArchivosFirmaSocio1 = [];
        if ($request->hasFile('imagen_firma_socio1')) {
            foreach ($request->file('imagen_firma_socio1') as $imagenFirmaSocio1) {
                $nombreArchivoFirmaSocio1 = time() . '_' . $imagenFirmaSocio1->getClientOriginalName();
                $rutaArchivoFirmaSocio1 = $imagenFirmaSocio1->storeAs('img_firma_socio1_inscripcion_firma', $nombreArchivoFirmaSocio1, 'public');
                $rutasArchivosFirmaSocio1[] = $rutaArchivoFirmaSocio1;
            }
        }

        // Manejo de la imagen de la firma digital del socio 2
        $rutasArchivosFirmaSocio2 = [];
        if ($request->hasFile('imagen_firma_socio2')) {
            foreach ($request->file('imagen_firma_socio2') as $imagenFirmaSocio2) {
                $nombreArchivoFirmaSocio2 = time() . '_' . $imagenFirmaSocio2->getClientOriginalName();
                $rutaArchivoFirmaSocio2 = $imagenFirmaSocio2->storeAs('img_firma_socio2_inscripcion_firma', $nombreArchivoFirmaSocio2, 'public');
                $rutasArchivosFirmaSocio2[] = $rutaArchivoFirmaSocio2;
            }
        }

        // Manejo de la imagen de la firma digital del socio 3
        $rutasArchivosFirmaSocio3 = [];
        if ($request->hasFile('imagen_firma_socio3')) {
            foreach ($request->file('imagen_firma_socio3') as $imagenFirmaSocio3) {
                $nombreArchivoFirmaSocio3 = time() . '_' . $imagenFirmaSocio3->getClientOriginalName();
                $rutaArchivoFirmaSocio3 = $imagenFirmaSocio3->storeAs('img_firma_socio3_inscripcion_firma', $nombreArchivoFirmaSocio3, 'public');
                $rutasArchivosFirmaSocio3[] = $rutaArchivoFirmaSocio3;
            }
        }

        // Manejo de la imagen de la firma digital de la firma social
        $rutasArchivosFirmaSocial = [];
        if ($request->hasFile('imagen_firma_social')) {
            foreach ($request->file('imagen_firma_social') as $imagenFirmaSocial) {
                $nombreArchivoFirmaSocial = time() . '_' . $imagenFirmaSocial->getClientOriginalName();
                $rutaArchivoFirmaSocial = $imagenFirmaSocial->storeAs('img_firma_social_inscripcion_firma', $nombreArchivoFirmaSocial, 'public');
                $rutasArchivosFirmaSocial[] = $rutaArchivoFirmaSocial;
            }
        }

        // Manejo de la imagen de la firma digital del representante legal
        $rutasArchivosFirmaRepresentanteLegal = [];
        if ($request->hasFile('imagen_firma_representante_legal')) {
            foreach ($request->file('imagen_firma_representante_legal') as $imagenFirmaRepresentanteLegal) {
                $nombreArchivoFirmaRepresentanteLegal = time() . '_' . $imagenFirmaRepresentanteLegal->getClientOriginalName();
                $rutaArchivoFirmaRepresentanteLegal = $imagenFirmaRepresentanteLegal->storeAs('img_firma_representante_legal_inscripcion_firma', $nombreArchivoFirmaRepresentanteLegal, 'public');
                $rutasArchivosFirmaRepresentanteLegal[] = $rutaArchivoFirmaRepresentanteLegal;
            }
        }

        $inscripcionFirma = InscripcionFirma::create([
            // I. Datos de la sociedad
            'nombre_sociedad' => $request->input('nombre_sociedad'),
            'num_inscripcion_registro_publico_comercio' => $request->input('num_inscripcion_registro_publico_comercio'),
            'fecha_constitucion' => $request->input('fecha_constitucion'),
            'registro_tributario_nacional' => $request->input('registro_tributario_nacional'),
            'num_inscripcion_camara_comercio' => $request->input('num_inscripcion_camara_comercio'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'celular' => $request->input('celular'),
            'email' => $request->input('email'),

            // II. Datos de los socios
            'primer_nombre_socio1' => $request->input('primer_nombre_socio1'),
            'segundo_nombre_socio1' => $request->input('segundo_nombre_socio1'),
            'primer_apellido_socio1' => $request->input('primer_apellido_socio1'),
            'segundo_apellido_socio1' => $request->input('segundo_apellido_socio1'),
            'num_colegiacion_socio1' => $request->input('num_colegiacion_socio1'),
            'imagen_firma_socio1' => json_encode($rutasArchivosFirmaSocio1),

            'primer_nombre_socio2' => $request->input('primer_nombre_socio2'),
            'segundo_nombre_socio2' => $request->input('segundo_nombre_socio2'),
            'primer_apellido_socio2' => $request->input('primer_apellido_socio2'),
            'segundo_apellido_socio2' => $request->input('segundo_apellido_socio2'),
            'num_colegiacion_socio2' => $request->input('num_colegiacion_socio2'),
            'imagen_firma_socio2' => json_encode($rutasArchivosFirmaSocio2),

            'primer_nombre_socio3' => $request->input('primer_nombre_socio3'),
            'segundo_nombre_socio3' => $request->input('segundo_nombre_socio3'),
            'primer_apellido_socio3' => $request->input('primer_apellido_socio3'),
            'segundo_apellido_socio3' => $request->input('segundo_apellido_socio3'),
            'num_colegiacion_socio3' => $request->input('num_colegiacion_socio3'),
            'imagen_firma_socio3' => json_encode($rutasArchivosFirmaSocio3),

            'imagen_firma_social' => json_encode($rutasArchivosFirmaSocial),
            'imagen_firma_representante_legal' => json_encode($rutasArchivosFirmaRepresentanteLegal),

            // III. Estado de la inscripción
            'estado' => $request->input('estado'),
            'descripcion_estado_solicitud' => $request->input('descripcion_estado_solicitud'),

            'user_id' => Auth::id(),
        ]);

        return redirect()->route('inscripcion_firmas.show', $inscripcionFirma->id)
            ->with('success', 'Inscripción de firma creada exitosamente.');
    }
}
