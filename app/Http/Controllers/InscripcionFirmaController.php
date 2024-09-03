<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\InscripcionFirma;
use Illuminate\Support\Facades\Storage;

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
            'imagen_firma_socio1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'primer_nombre_socio2' => 'required|string|max:255',
            'segundo_nombre_socio2' => 'nullable|string|max:255',
            'primer_apellido_socio2' => 'required|string|max:255',
            'segundo_apellido_socio2' => 'nullable|string|max:255',
            'num_colegiacion_socio2' => 'nullable|string|max:255',
            'imagen_firma_socio2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'primer_nombre_socio3' => 'required|string|max:255',
            'segundo_nombre_socio3' => 'nullable|string|max:255',
            'primer_apellido_socio3' => 'required|string|max:255',
            'segundo_apellido_socio3' => 'nullable|string|max:255',
            'num_colegiacion_socio3' => 'nullable|string|max:255',
            'imagen_firma_socio3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_firma_social' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_representante_legal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // III. Estado de la inscripción
            'estado' => 'nullable|in:pendiente,aprobado,rechazado',
            'descripcion_estado_solicitud' => 'nullable|string',
        ], [
            'imagen_firma_socio1.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio1.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio1.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'imagen_firma_socio2.image' => 'El archivo de la firma digital del socio 2 debe ser una imagen.',
            'imagen_firma_socio2.mimes' => 'El archivo de la firma digital del socio 2 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio2.max' => 'El archivo de la firma digital del socio 2 no debe exceder 10MB.',

            'imagen_firma_socio3.image' => 'El archivo de la firma digital del socio 3 debe ser una imagen.',
            'imagen_firma_socio3.mimes' => 'El archivo de la firma digital del socio 3 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio3.max' => 'El archivo de la firma digital del socio 3 no debe exceder 10MB.',

            'imagen_firma_social.image' => 'El archivo de la firma digital social debe ser una imagen.',
            'imagen_firma_social.mimes' => 'El archivo de la firma digital social debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_social.max' => 'El archivo de la firma digital social no debe exceder 10MB.',

            'imagen_firma_representante_legal.image' => 'El archivo de la firma digital del representante legal debe ser una imagen.',
            'imagen_firma_representante_legal.mimes' => 'El archivo de la firma digital del representante legal debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_representante_legal.max' => 'El archivo de la firma digital del representante legal no debe exceder 10MB.',
        ]);

        // Crear la inscripción de firma
        InscripcionFirma::create([
            'nombre_sociedad' => $request->nombre_sociedad,
            'num_inscripcion_registro_publico_comercio' => $request->num_inscripcion_registro_publico_comercio,
            'fecha_constitucion' => Carbon::parse($request->fecha_constitucion),
            'registro_tributario_nacional' => $request->registro_tributario_nacional,
            'num_inscripcion_camara_comercio' => $request->num_inscripcion_camara_comercio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,

            // Datos del primer socio
            'primer_nombre_socio1' => $request->primer_nombre_socio1,
            'segundo_nombre_socio1' => $request->segundo_nombre_socio1,
            'primer_apellido_socio1' => $request->primer_apellido_socio1,
            'segundo_apellido_socio1' => $request->segundo_apellido_socio1,
            'num_colegiacion_socio1' => $request->num_colegiacion_socio1,
            'imagen_firma_socio1' => $request->hasFile('imagen_firma_socio1') 
                ? $this->storeImage($request->file('imagen_firma_socio1'), 'img_firma_socio1_inscripcion_firma') 
                : null,

            // Datos del segundo socio
            'primer_nombre_socio2' => $request->primer_nombre_socio2,
            'segundo_nombre_socio2' => $request->segundo_nombre_socio2,
            'primer_apellido_socio2' => $request->primer_apellido_socio2,
            'segundo_apellido_socio2' => $request->segundo_apellido_socio2,
            'num_colegiacion_socio2' => $request->num_colegiacion_socio2,
            'imagen_firma_socio2' => $request->hasFile('imagen_firma_socio2') 
                ? $this->storeImage($request->file('imagen_firma_socio2'), 'img_firma_socio2_inscripcion_firma') 
                : null,

            // Datos del tercer socio
            'primer_nombre_socio3' => $request->primer_nombre_socio3,
            'segundo_nombre_socio3' => $request->segundo_nombre_socio3,
            'primer_apellido_socio3' => $request->primer_apellido_socio3,
            'segundo_apellido_socio3' => $request->segundo_apellido_socio3,
            'num_colegiacion_socio3' => $request->num_colegiacion_socio3,
            'imagen_firma_socio3' => $request->hasFile('imagen_firma_socio3') 
                ? $this->storeImage($request->file('imagen_firma_socio3'), 'img_firma_socio3_inscripcion_firma') 
                : null,

            // Firmas
            'imagen_firma_social' => $request->hasFile('imagen_firma_social') 
                ? $this->storeImage($request->file('imagen_firma_social'), 'img_firma_social_inscripcion_firma') 
                : null,
            'imagen_firma_representante_legal' => $request->hasFile('imagen_firma_representante_legal') 
                ? $this->storeImage($request->file('imagen_firma_representante_legal'), 'img_firma_representante_legal_inscripcion_firma') 
                : null,

            'estado' => $request->estado,
            'descripcion_estado_solicitud' => $request->descripcion_estado_solicitud,
        ]);

        return redirect()->route('inscripcion_firmas.index')
            ->with('success', 'Inscripción de firma creada exitosamente.');
    }

    // Mostrar el formulario para editar una inscripción de firma
    public function edit($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);
        return view('inscripcion_firmas.edit', compact('inscripcionFirma'));
    }

    // Actualizar una inscripción de firma existente
    public function update(Request $request, $id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);

        $request->validate([
            // Validaciones...
        ]);

        $data = $request->all();

        // Manejar las imágenes
        if ($request->hasFile('imagen_firma_socio1')) {
            $data['imagen_firma_socio1'] = $this->storeImage($request->file('imagen_firma_socio1'), 'img_firma_socio1_inscripcion_firma');
            Storage::disk('public')->delete($inscripcionFirma->imagen_firma_socio1);
        }

        if ($request->hasFile('imagen_firma_socio2')) {
            $data['imagen_firma_socio2'] = $this->storeImage($request->file('imagen_firma_socio2'), 'img_firma_socio2_inscripcion_firma');
            Storage::disk('public')->delete($inscripcionFirma->imagen_firma_socio2);
        }

        if ($request->hasFile('imagen_firma_socio3')) {
            $data['imagen_firma_socio3'] = $this->storeImage($request->file('imagen_firma_socio3'), 'img_firma_socio3_inscripcion_firma');
            Storage::disk('public')->delete($inscripcionFirma->imagen_firma_socio3);
        }

        if ($request->hasFile('imagen_firma_social')) {
            $data['imagen_firma_social'] = $this->storeImage($request->file('imagen_firma_social'), 'img_firma_social_inscripcion_firma');
            Storage::disk('public')->delete($inscripcionFirma->imagen_firma_social);
        }

        if ($request->hasFile('imagen_firma_representante_legal')) {
            $data['imagen_firma_representante_legal'] = $this->storeImage($request->file('imagen_firma_representante_legal'), 'img_firma_representante_legal_inscripcion_firma');
            Storage::disk('public')->delete($inscripcionFirma->imagen_firma_representante_legal);
        }

        $inscripcionFirma->update($data);

        return redirect()->route('inscripcion_firmas.index')
            ->with('success', 'Inscripción de firma actualizada exitosamente.');
    }

    // Método auxiliar para almacenar imágenes
    private function storeImage($file, $folder)
    {
        $nombreArchivo = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs($folder, $nombreArchivo, 'public');
    }
}
