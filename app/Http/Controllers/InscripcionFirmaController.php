<?php

namespace App\Http\Controllers;

use App\Models\InscripcionFirma;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionFirmaController extends Controller
{
    // Mostrar la lista de inscripciones de firmas
    public function index()
    {
        $inscripcionFirmas = InscripcionFirma::all();
        return view('inscripcion_firmas.index', compact('inscripcionFirmas'));
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
            'num_inscripcion_registro_publico_comercio' => 'nullable|string',
            'fecha_constitucion' => 'required|date',
            'registro_tributario_nacional' => 'required|string|max:255',
            'num_inscripcion_camara_comercio' => 'required|string|max:255',
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
            'imagen_firma_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'primer_nombre_socio2' => 'required|string|max:255',
            'segundo_nombre_socio2' => 'nullable|string|max:255',
            'primer_apellido_socio2' => 'required|string|max:255',
            'segundo_apellido_socio2' => 'nullable|string|max:255',
            'num_colegiacion_socio2' => 'nullable|string|max:255',
            'imagen_firma_socio2' => 'nullable|array',
            'imagen_firma_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'primer_nombre_socio3' => 'required|string|max:255',
            'segundo_nombre_socio3' => 'nullable|string|max:255',
            'primer_apellido_socio3' => 'required|string|max:255',
            'segundo_apellido_socio3' => 'nullable|string|max:255',
            'num_colegiacion_socio3' => 'nullable|string|max:255',
            'imagen_firma_socio3' => 'nullable|array',
            'imagen_firma_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'imagen_firma_social' => 'nullable|array',
            'imagen_firma_social.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'imagen_firma_representante_legal' => 'nullable|array',
            'imagen_firma_representante_legal.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'lugar_inscripcion' => 'required|date',
            'fecha_inscripcion' => 'required|date',

            // IX. Estado de la inscripción
            'estado' => 'required|in:pendiente,aprobado,rechazado',
            'descripcion_estado_solicitud' => 'nullable|string',
        ]);

        // Manejo de las imágenes de firmas
        $rutasImagenes = [];
        $imagenFields = [
            'imagen_firma_socio1',
            'imagen_firma_socio2',
            'imagen_firma_socio3',
            'imagen_firma_social',
            'imagen_firma_representante_legal'
        ];

        foreach ($imagenFields as $field) {
            if ($request->hasFile($field)) {
                foreach ($request->file($field) as $imagen) {
                    $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                    $rutaArchivo = $imagen->storeAs('imgs_firmas', $nombreArchivo, 'public');
                    $rutasImagenes[$field][] = $rutaArchivo;
                }
            }
        }

        InscripcionFirma::create([
            'num_membresia' => $request->num_membresia,

            // I. Datos de la sociedad
            'nombre_sociedad' => $request->nombre_sociedad,
            'num_inscripcion_registro_publico_comercio' => $request->num_inscripcion_registro_publico_comercio,
            'fecha_constitucion' => $request->fecha_constitucion,
            'registro_tributario_nacional' => $request->registro_tributario_nacional,
            'num_inscripcion_camara_comercio' => $request->num_inscripcion_camara_comercio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,

            // II. Datos de los socios
            'primer_nombre_socio1' => $request->primer_nombre_socio1,
            'segundo_nombre_socio1' => $request->segundo_nombre_socio1,
            'primer_apellido_socio1' => $request->primer_apellido_socio1,
            'segundo_apellido_socio1' => $request->segundo_apellido_socio1,
            'num_colegiacion_socio1' => $request->num_colegiacion_socio1,
            'imagen_firma_socio1' => isset($rutasImagenes['imagen_firma_socio1']) ? json_encode($rutasImagenes['imagen_firma_socio1']) : null,

            'primer_nombre_socio2' => $request->primer_nombre_socio2,
            'segundo_nombre_socio2' => $request->segundo_nombre_socio2,
            'primer_apellido_socio2' => $request->primer_apellido_socio2,
            'segundo_apellido_socio2' => $request->segundo_apellido_socio2,
            'num_colegiacion_socio2' => $request->num_colegiacion_socio2,
            'imagen_firma_socio2' => isset($rutasImagenes['imagen_firma_socio2']) ? json_encode($rutasImagenes['imagen_firma_socio2']) : null,

            'primer_nombre_socio3' => $request->primer_nombre_socio3,
            'segundo_nombre_socio3' => $request->segundo_nombre_socio3,
            'primer_apellido_socio3' => $request->primer_apellido_socio3,
            'segundo_apellido_socio3' => $request->segundo_apellido_socio3,
            'num_colegiacion_socio3' => $request->num_colegiacion_socio3,
            'imagen_firma_socio3' => isset($rutasImagenes['imagen_firma_socio3']) ? json_encode($rutasImagenes['imagen_firma_socio3']) : null,

            'imagen_firma_social' => isset($rutasImagenes['imagen_firma_social']) ? json_encode($rutasImagenes['imagen_firma_social']) : null,
            'imagen_firma_representante_legal' => isset($rutasImagenes['imagen_firma_representante_legal']) ? json_encode($rutasImagenes['imagen_firma_representante_legal']) : null,

            'lugar_inscripcion' => $request->lugar_inscripcion,
            'fecha_inscripcion' => $request->fecha_inscripcion,

            // IX. Estado de la inscripción
            'estado' => $request->estado,
            'descripcion_estado_solicitud' => $request->descripcion_estado_solicitud,

            'user_id' => Auth::id(), // Asegúrate de que Auth::id() retorne un valor válido
        ]);

        return redirect()->route('inscripcion_firmas.create')->with('success', 'Inscripción de firma enviada correctamente.');
    }

    // Mostrar detalles de una inscripción de firma específica
    public function show($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);
        return view('inscripcion_firmas.show', compact('inscripcionFirma'));
    }

    // Mostrar el formulario para editar una inscripción de firma específica
    public function edit($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);
        return view('inscripcion_firmas.edit', compact('inscripcionFirma'));
    }

    // Actualizar una inscripción de firma específica
    public function update(Request $request, $id)
    {
        $request->validate([
            // Validaciones similares al método store
        ]);

        $inscripcionFirma = InscripcionFirma::findOrFail($id);

        // Manejo de las imágenes de firmas
        $rutasImagenes = [];
        $imagenFields = [
            'imagen_firma_socio1',
            'imagen_firma_socio2',
            'imagen_firma_socio3',
            'imagen_firma_social',
            'imagen_firma_representante_legal'
        ];

        foreach ($imagenFields as $field) {
            if ($request->hasFile($field)) {
                foreach ($request->file($field) as $imagen) {
                    $nombreArchivo = time() . '_' . $imagen->getClientOriginalName();
                    $rutaArchivo = $imagen->storeAs('imgs_firmas', $nombreArchivo, 'public');
                    $rutasImagenes[$field][] = $rutaArchivo;
                }
            }
        }

        $inscripcionFirma->update([
            'num_membresia' => $request->num_membresia,

            // I. Datos de la sociedad
            'nombre_sociedad' => $request->nombre_sociedad,
            'num_inscripcion_registro_publico_comercio' => $request->num_inscripcion_registro_publico_comercio,
            'fecha_constitucion' => $request->fecha_constitucion,
            'registro_tributario_nacional' => $request->registro_tributario_nacional,
            'num_inscripcion_camara_comercio' => $request->num_inscripcion_camara_comercio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,

            // II. Datos de los socios
            'primer_nombre_socio1' => $request->primer_nombre_socio1,
            'segundo_nombre_socio1' => $request->segundo_nombre_socio1,
            'primer_apellido_socio1' => $request->primer_apellido_socio1,
            'segundo_apellido_socio1' => $request->segundo_apellido_socio1,
            'num_colegiacion_socio1' => $request->num_colegiacion_socio1,
            'imagen_firma_socio1' => isset($rutasImagenes['imagen_firma_socio1']) ? json_encode($rutasImagenes['imagen_firma_socio1']) : $inscripcionFirma->imagen_firma_socio1,

            'primer_nombre_socio2' => $request->primer_nombre_socio2,
            'segundo_nombre_socio2' => $request->segundo_nombre_socio2,
            'primer_apellido_socio2' => $request->primer_apellido_socio2,
            'segundo_apellido_socio2' => $request->segundo_apellido_socio2,
            'num_colegiacion_socio2' => $request->num_colegiacion_socio2,
            'imagen_firma_socio2' => isset($rutasImagenes['imagen_firma_socio2']) ? json_encode($rutasImagenes['imagen_firma_socio2']) : $inscripcionFirma->imagen_firma_socio2,

            'primer_nombre_socio3' => $request->primer_nombre_socio3,
            'segundo_nombre_socio3' => $request->segundo_nombre_socio3,
            'primer_apellido_socio3' => $request->primer_apellido_socio3,
            'segundo_apellido_socio3' => $request->segundo_apellido_socio3,
            'num_colegiacion_socio3' => $request->num_colegiacion_socio3,
            'imagen_firma_socio3' => isset($rutasImagenes['imagen_firma_socio3']) ? json_encode($rutasImagenes['imagen_firma_socio3']) : $inscripcionFirma->imagen_firma_socio3,

            'imagen_firma_social' => isset($rutasImagenes['imagen_firma_social']) ? json_encode($rutasImagenes['imagen_firma_social']) : $inscripcionFirma->imagen_firma_social,
            'imagen_firma_representante_legal' => isset($rutasImagenes['imagen_firma_representante_legal']) ? json_encode($rutasImagenes['imagen_firma_representante_legal']) : $inscripcionFirma->imagen_firma_representante_legal,

            'lugar_inscripcion' => $request->lugar_inscripcion,
            'fecha_inscripcion' => $request->fecha_inscripcion,

            // IX. Estado de la inscripción
            'estado' => $request->estado,
            'descripcion_estado_solicitud' => $request->descripcion_estado_solicitud,
        ]);

        return redirect()->route('inscripcion_firmas.index')->with('success', 'Inscripción de firma actualizada correctamente.');
    }

    // Eliminar una inscripción de firma específica
    public function destroy($id)
    {
        $inscripcionFirma = InscripcionFirma::findOrFail($id);
        $inscripcionFirma->delete();

        return redirect()->route('inscripcion_firmas.index')->with('success', 'Inscripción de firma eliminada correctamente.');
    }
}
