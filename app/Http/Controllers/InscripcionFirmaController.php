<?php

namespace App\Http\Controllers;

use Log;
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
            'municipio_realiza_solicitud' => 'nullable|string|max:255',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string|max:40',
            'celular' => 'required|string|max:40',
            'email' => 'required|email|max:255|unique:inscripcion_firmas,email',

            // II. Datos de los socios
            // socio 1
            'primer_nombre_socio1' => 'required|string|max:255',
            'segundo_nombre_socio1' => 'nullable|string|max:255',
            'primer_apellido_socio1' => 'required|string|max:255',
            'segundo_apellido_socio1' => 'nullable|string|max:255',
            'num_colegiacion_socio1' => 'nullable|string|max:255',
            'cv_socio1' => 'nullable|mimes:pdf',
            'titulo_socio1' => 'nullable|array',
            'titulo_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_socio1' => 'nullable|array',
            'imagen_firma_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio1' => 'nullable|array',
            'constancia_solvencia_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // socio 2
            'primer_nombre_socio2' => 'nullable|string|max:255',
            'segundo_nombre_socio2' => 'nullable|string|max:255',
            'primer_apellido_socio2' => 'nullable|string|max:255',
            'segundo_apellido_socio2' => 'nullable|string|max:255',
            'num_colegiacion_socio2' => 'nullable|string|max:255',
            'cv_socio2' => 'nullable|mimes:pdf',
            'titulo_socio2' => 'nullable|array',
            'titulo_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_socio2' => 'nullable|array',
            'imagen_firma_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio2' => 'nullable|array',
            'constancia_solvencia_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // socio 3
            'primer_nombre_socio3' => 'nullable|string|max:255',
            'segundo_nombre_socio3' => 'nullable|string|max:255',
            'primer_apellido_socio3' => 'nullable|string|max:255',
            'segundo_apellido_socio3' => 'nullable|string|max:255',
            'num_colegiacion_socio3' => 'nullable|string|max:255',
            'cv_socio3' => 'nullable|mimes:pdf',
            'titulo_socio3' => 'nullable|array',
            'titulo_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_socio3' => 'nullable|array',
            'imagen_firma_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio3' => 'nullable|array',
            'constancia_solvencia_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'primer_nombre_socio4' => 'nullable|string|max:255',
            'segundo_nombre_socio4' => 'nullable|string|max:255',
            'primer_apellido_socio4' => 'nullable|string|max:255',
            'segundo_apellido_socio4' => 'nullable|string|max:255',
            'num_colegiacion_socio4' => 'nullable|string|max:255',
            'cv_socio4' => 'nullable|mimes:pdf',
            'titulo_socio4' => 'nullable|array',
            'titulo_socio4.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_socio4' => 'nullable|array',
            'imagen_firma_socio4.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio4' => 'nullable|array',
            'constancia_solvencia_socio4.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // III. Documentos
            'imagen_escritura_constitucion' => 'nullable|array',
            'imagen_escritura_constitucion.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_registro_mercantil' => 'nullable|array',
            'imagen_registro_mercantil.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_rtn_firma_auditora' => 'nullable|array',
            'imagen_rtn_firma_auditora.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'nomina_pago_firma' => 'nullable|mimes:pdf',

            // IV. Firmas digitales
            'imagen_firma_social' => 'nullable|array',
            'imagen_firma_social.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_representante_legal' => 'nullable|array',
            'imagen_firma_representante_legal.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            
            // V. Estado de la inscripción de la firma
            'estado' => 'nullable|in:pendiente,aprobado,rechazado',
            'descripcion_estado_solicitud' => 'nullable|string',
        ]);

        // SOCIO 1
        // Manejo del currículum vitae del socio 1
        $rutaArchivoCVSocio1 = null;
        if ($request->hasFile('cv_socio1')) {
            $cv_socio1 = $request->file('cv_socio1');
            $nombreArchivoCVSocio1 = time() . '_' . $cv_socio1->getClientOriginalName();
            $rutaArchivoCVSocio1 = $cv_socio1->storeAs('cv_socio1_inscripcionFirma', $nombreArchivoCVSocio1, 'public');
        }
        
        // Manejo de las imágenes del título del socio 1
        $rutasArchivosTituloSocio1 = [];
        if ($request->hasFile('titulo_socio1')) {
            foreach ($request->file('titulo_socio1') as $imagenTituloSocio1) {
                $nombreArchivoTituloSocio1 = time() . '_' . $imagenTituloSocio1->getClientOriginalName();
                $rutaArchivoTituloSocio1 = $imagenTituloSocio1->storeAs('imgs_titulo_socio1_inscripcionFirma', $nombreArchivoTituloSocio1, 'public');
                $rutasArchivosTituloSocio1[] = $rutaArchivoTituloSocio1;
            }
        }
        // Manejo de las imágenes de la firma digital del socio 1
        $rutasArchivosFirmaSocio1 = [];
        if ($request->hasFile('imagen_firma_socio1')) {
            foreach ($request->file('imagen_firma_socio1') as $imagenFirmaSocio1) {
                $nombreArchivoFirmaSocio1 = time() . '_' . $imagenFirmaSocio1->getClientOriginalName();
                $rutaArchivoFirmaSocio1 = $imagenFirmaSocio1->storeAs('imgs_firma_socio1_inscripcionFirma', $nombreArchivoFirmaSocio1, 'public');
                $rutasArchivosFirmaSocio1[] = $rutaArchivoFirmaSocio1;
            }
        }
        // Manejo de las imágenes de la constancia de solvencia del socio 1
        $rutasArchivosSolvenciaSocio1 = [];
        if ($request->hasFile('constancia_solvencia_socio1')) {
            foreach ($request->file('constancia_solvencia_socio1') as $imagenSolvenciaSocio1) {
                $nombreArchivoSolvenciaSocio1 = time() . '_' . $imagenSolvenciaSocio1->getClientOriginalName();
                $rutaArchivoSolvenciaSocio1 = $imagenSolvenciaSocio1->storeAs('imgs_solvencia_socio1_inscripcionFirma', $nombreArchivoSolvenciaSocio1, 'public');
                $rutasArchivosSolvenciaSocio1[] = $rutaArchivoSolvenciaSocio1;
            }
        }

        // SOCIO 2
        // Manejo del currículum vitae del socio 2
        $rutaArchivoCVSocio2 = null;
        if ($request->hasFile('cv_socio2')) {
            $cv_socio2 = $request->file('cv_socio2');
            $nombreArchivoCVSocio2 = time() . '_' . $cv_socio2->getClientOriginalName();
            $rutaArchivoCVSocio2 = $cv_socio2->storeAs('cv_socio2_inscripcionFirma', $nombreArchivoCVSocio2, 'public');
        }

        // Manejo de las imágenes del título del socio 2
        $rutasArchivosTituloSocio2 = [];
        if ($request->hasFile('titulo_socio2')) {
            foreach ($request->file('titulo_socio2') as $imagenTituloSocio2) {
                $nombreArchivoTituloSocio2 = time() . '_' . $imagenTituloSocio2->getClientOriginalName();
                $rutaArchivoTituloSocio2 = $imagenTituloSocio2->storeAs('imgs_titulo_socio2_inscripcionFirma', $nombreArchivoTituloSocio2, 'public');
                $rutasArchivosTituloSocio2[] = $rutaArchivoTituloSocio2;
            }
        }
        // Manejo de las imágenes de la firma digital del socio 2
        $rutasArchivosFirmaSocio2 = [];
        if ($request->hasFile('imagen_firma_socio2')) {
            foreach ($request->file('imagen_firma_socio2') as $imagenFirmaSocio2) {
                $nombreArchivoFirmaSocio2 = time() . '_' . $imagenFirmaSocio2->getClientOriginalName();
                $rutaArchivoFirmaSocio2 = $imagenFirmaSocio2->storeAs('imgs_firma_socio2_inscripcionFirma', $nombreArchivoFirmaSocio2, 'public');
                $rutasArchivosFirmaSocio2[] = $rutaArchivoFirmaSocio2;
            }
        }
        // Manejo de las imágenes de la constancia de solvencia del socio 2
        $rutasArchivosSolvenciaSocio2 = [];
        if ($request->hasFile('constancia_solvencia_socio2')) {
            foreach ($request->file('constancia_solvencia_socio2') as $imagenSolvenciaSocio2) {
                $nombreArchivoSolvenciaSocio2 = time() . '_' . $imagenSolvenciaSocio2->getClientOriginalName();
                $rutaArchivoSolvenciaSocio2 = $imagenSolvenciaSocio2->storeAs('imgs_solvencia_socio2_inscripcionFirma', $nombreArchivoSolvenciaSocio2, 'public');
                $rutasArchivosSolvenciaSocio2[] = $rutaArchivoSolvenciaSocio2;
            }
        }

        // SOCIO 3
        // Manejo del currículum vitae del socio 3
        $rutaArchivoCVSocio3 = null;
        if ($request->hasFile('cv_socio3')) {
            $cv_socio3 = $request->file('cv_socio3');
            $nombreArchivoCVSocio3 = time() . '_' . $cv_socio3->getClientOriginalName();
            $rutaArchivoCVSocio3 = $cv_socio3->storeAs('cv_socio3_inscripcionFirma', $nombreArchivoCVSocio3, 'public');
        }

        // Manejo de las imágenes del título del socio 3
        $rutasArchivosTituloSocio3 = [];
        if ($request->hasFile('titulo_socio3')) {
            foreach ($request->file('titulo_socio3') as $imagenTituloSocio3) {
                $nombreArchivoTituloSocio3 = time() . '_' . $imagenTituloSocio3->getClientOriginalName();
                $rutaArchivoTituloSocio3 = $imagenTituloSocio3->storeAs('imgs_titulo_socio3_inscripcionFirma', $nombreArchivoTituloSocio3, 'public');
                $rutasArchivosTituloSocio3[] = $rutaArchivoTituloSocio3;
            }
        }
        // Manejo de las imágenes de la firma digital del socio 3
        $rutasArchivosFirmaSocio3 = [];
        if ($request->hasFile('imagen_firma_socio3')) {
            foreach ($request->file('imagen_firma_socio3') as $imagenFirmaSocio3) {
                $nombreArchivoFirmaSocio3 = time() . '_' . $imagenFirmaSocio3->getClientOriginalName();
                $rutaArchivoFirmaSocio3 = $imagenFirmaSocio3->storeAs('imgs_firma_socio3_inscripcionFirma', $nombreArchivoFirmaSocio3, 'public');
                $rutasArchivosFirmaSocio3[] = $rutaArchivoFirmaSocio3;
            }
        }
        // Manejo de las imágenes de la constancia de solvencia del socio 3
        $rutasArchivosSolvenciaSocio3 = [];
        if ($request->hasFile('constancia_solvencia_socio3')) {
            foreach ($request->file('constancia_solvencia_socio3') as $imagenSolvenciaSocio3) {
                $nombreArchivoSolvenciaSocio3 = time() . '_' . $imagenSolvenciaSocio3->getClientOriginalName();
                $rutaArchivoSolvenciaSocio3 = $imagenSolvenciaSocio3->storeAs('imgs_solvencia_socio3_inscripcionFirma', $nombreArchivoSolvenciaSocio3, 'public');
                $rutasArchivosSolvenciaSocio3[] = $rutaArchivoSolvenciaSocio3;
            }
        }

        // SOCIO 4
        // Manejo del currículum vitae del socio 4
        $rutaArchivoCVSocio4 = null;
        if ($request->hasFile('cv_socio4')) {
            $cv_socio4 = $request->file('cv_socio4');
            $nombreArchivoCVSocio4 = time() . '_' . $cv_socio4->getClientOriginalName();
            $rutaArchivoCVSocio4 = $cv_socio4->storeAs('cv_socio4_inscripcionFirma', $nombreArchivoCVSocio4, 'public');
        }

        // Manejo de las imágenes del título del socio 4
        $rutasArchivosTituloSocio4 = [];
        if ($request->hasFile('titulo_socio4')) {
            foreach ($request->file('titulo_socio4') as $imagenTituloSocio4) {
                $nombreArchivoTituloSocio4 = time() . '_' . $imagenTituloSocio4->getClientOriginalName();
                $rutaArchivoTituloSocio4 = $imagenTituloSocio4->storeAs('imgs_titulo_socio4_inscripcionFirma', $nombreArchivoTituloSocio4, 'public');
                $rutasArchivosTituloSocio4[] = $rutaArchivoTituloSocio4;
            }
        }
        // Manejo de las imágenes de la firma digital del socio 4
        $rutasArchivosFirmaSocio4 = [];
        if ($request->hasFile('imagen_firma_socio4')) {
            foreach ($request->file('imagen_firma_socio4') as $imagenFirmaSocio4) {
                $nombreArchivoFirmaSocio4 = time() . '_' . $imagenFirmaSocio4->getClientOriginalName();
                $rutaArchivoFirmaSocio4 = $imagenFirmaSocio4->storeAs('imgs_firma_socio4_inscripcionFirma', $nombreArchivoFirmaSocio4, 'public');
                $rutasArchivosFirmaSocio4[] = $rutaArchivoFirmaSocio4;
            }
        }
        // Manejo de las imágenes de la constancia de solvencia del socio 4
        $rutasArchivosSolvenciaSocio4 = [];
        if ($request->hasFile('constancia_solvencia_socio4')) {
            foreach ($request->file('constancia_solvencia_socio4') as $imagenSolvenciaSocio4) {
                $nombreArchivoSolvenciaSocio4 = time() . '_' . $imagenSolvenciaSocio4->getClientOriginalName();
                $rutaArchivoSolvenciaSocio4 = $imagenSolvenciaSocio4->storeAs('imgs_solvencia_socio4_inscripcionFirma', $nombreArchivoSolvenciaSocio4, 'public');
                $rutasArchivosSolvenciaSocio4[] = $rutaArchivoSolvenciaSocio4;
            }
        }

        // DOCUMENTOS
        // Manejo de las imágenes de la escritura de constitución de la firma
        $rutasArchivosEscrituraConstitucion = [];
        if ($request->hasFile('imagen_escritura_constitucion')) {
            foreach ($request->file('imagen_escritura_constitucion') as $imagenEscrituraConstitucion) {
                $nombreArchivoEscrituraConstitucion = time() . '_' . $imagenEscrituraConstitucion->getClientOriginalName();
                $rutaArchivoEscrituraConstitucion = $imagenEscrituraConstitucion->storeAs('imgs_escritura_constitucion_inscripcionFirma', $nombreArchivoEscrituraConstitucion, 'public');
                $rutasArchivosEscrituraConstitucion[] = $rutaArchivoEscrituraConstitucion;
            }
        }

        // Manejo de las imágenes del registro mercantil de la firma
        $rutasArchivosRegistroMercantil = [];
        if ($request->hasFile('imagen_registro_mercantil')) {
            foreach ($request->file('imagen_registro_mercantil') as $imagenRegistroMercantil) {
                $nombreArchivoRegistroMercantil = time() . '_' . $imagenRegistroMercantil->getClientOriginalName();
                $rutaArchivoRegistroMercantil = $imagenRegistroMercantil->storeAs('imgs_registro_mercantil_inscripcionFirma', $nombreArchivoRegistroMercantil, 'public');
                $rutasArchivosRegistroMercantil[] = $rutaArchivoRegistroMercantil;
            }
        }

        // Manejo de las imágenes del RTN de la firma
        $rutasArchivosRTN = [];
        if ($request->hasFile('imagen_rtn_firma_auditora')) {
            foreach ($request->file('imagen_rtn_firma_auditora') as $imagenRTN) {
                $nombreArchivoRTN = time() . '_' . $imagenRTN->getClientOriginalName();
                $rutaArchivoRTN = $imagenRTN->storeAs('imgs_RTN_inscripcionFirma', $nombreArchivoRTN, 'public');
                $rutasArchivosRTN[] = $rutaArchivoRTN;
            }
        }

        // Manejo de la nómina de pago proyectada (Planilla)
        $rutaArchivoNominaPago = null;
        if ($request->hasFile('nomina_pago_firma')) {
            $nomina_pago_firma = $request->file('nomina_pago_firma');
            $nombreArchivoNominaPago = time() . '_' . $nomina_pago_firma->getClientOriginalName();
            $rutaArchivoNominaPago = $nomina_pago_firma->storeAs('pdf_nomina_pago_inscripcionFirma', $nombreArchivoNominaPago, 'public');
        }

        // Manejo de las imágenes de la firma social de la firma
        $rutasArchivosFirmaSocial = [];
        if ($request->hasFile('imagen_firma_social')) {
            foreach ($request->file('imagen_firma_social') as $imagenFirmaSocial) {
                $nombreArchivoFirmaSocial = time() . '_' . $imagenFirmaSocial->getClientOriginalName();
                $rutaArchivoFirmaSocial = $imagenFirmaSocial->storeAs('imgs_solvencia_socio4_inscripcionFirma', $nombreArchivoFirmaSocial, 'public');
                $rutasArchivosFirmaSocial[] = $rutaArchivoFirmaSocial;
            }
        }

        // Manejo de las imágenes del representante legal de la firma
        $rutasArchivosFirmaRepresentanteLegal = [];
        if ($request->hasFile('imagen_firma_representante_legal')) {
            foreach ($request->file('imagen_firma_representante_legal') as $imagenFirmaRepresentanteLegal) {
                $nombreArchivoFirmaRepresentanteLegal = time() . '_' . $imagenFirmaRepresentanteLegal->getClientOriginalName();
                $rutaArchivoFirmaRepresentanteLegal = $imagenFirmaRepresentanteLegal->storeAs('imgs_solvencia_socio4_inscripcionFirma', $nombreArchivoFirmaRepresentanteLegal, 'public');
                $rutasArchivosFirmaRepresentanteLegal[] = $rutaArchivoFirmaRepresentanteLegal;
            }
        }

        // Crear la inscripción de firma
        InscripcionFirma::create([
            'user_id' => Auth::id(), 
            'fecha_inscripcion' => Carbon::now()->toDateString(),
            
            // I. Datos de la sociedad
            'nombre_sociedad' => $request->nombre_sociedad,
            'num_inscripcion_registro_publico_comercio' => $request->num_inscripcion_registro_publico_comercio,
            'fecha_constitucion' => Carbon::parse($request->fecha_constitucion),
            'registro_tributario_nacional' => $request->registro_tributario_nacional,
            'num_inscripcion_camara_comercio' => $request->num_inscripcion_camara_comercio,
            'municipio_realiza_solicitud' => $request->municipio_realiza_solicitud,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'email' => $request->email,

            // II. Datos de los socios
            // SOCIO 1
            'primer_nombre_socio1' => $request->primer_nombre_socio1,
            'segundo_nombre_socio1' => $request->segundo_nombre_socio1,
            'primer_apellido_socio1' => $request->primer_apellido_socio1,
            'segundo_apellido_socio1' => $request->segundo_apellido_socio1,
            'num_colegiacion_socio1' => $request->num_colegiacion_socio1,
            'cv_socio1' => $rutaArchivoCVSocio1,
            'titulo_socio1' => json_encode($rutasArchivosTituloSocio1),
            'imagen_firma_socio1' => json_encode($rutasArchivosFirmaSocio1),
            'constancia_solvencia_socio1' => json_encode($rutasArchivosSolvenciaSocio1),

            // SOCIO 2
            'primer_nombre_socio2' => $request->primer_nombre_socio2,
            'segundo_nombre_socio2' => $request->segundo_nombre_socio2,
            'primer_apellido_socio2' => $request->primer_apellido_socio2,
            'segundo_apellido_socio2' => $request->segundo_apellido_socio2,
            'num_colegiacion_socio2' => $request->num_colegiacion_socio2,
            'cv_socio2' => $rutaArchivoCVSocio2,
            'titulo_socio2' => json_encode($rutasArchivosTituloSocio2),
            'imagen_firma_socio2' => json_encode($rutasArchivosFirmaSocio2),
            'constancia_solvencia_socio2' => json_encode($rutasArchivosSolvenciaSocio2),

            // SOCIO 3
            'primer_nombre_socio3' => $request->primer_nombre_socio3,
            'segundo_nombre_socio3' => $request->segundo_nombre_socio3,
            'primer_apellido_socio3' => $request->primer_apellido_socio3,
            'segundo_apellido_socio3' => $request->segundo_apellido_socio3,
            'num_colegiacion_socio3' => $request->num_colegiacion_socio3,
            'cv_socio3' => $rutaArchivoCVSocio3,
            'titulo_socio3' => json_encode($rutasArchivosTituloSocio3),
            'imagen_firma_socio3' => json_encode($rutasArchivosFirmaSocio3),
            'constancia_solvencia_socio3' => json_encode($rutasArchivosSolvenciaSocio3),

            // SOCIO 4
            'primer_nombre_socio4' => $request->primer_nombre_socio4,
            'segundo_nombre_socio4' => $request->segundo_nombre_socio4,
            'primer_apellido_socio4' => $request->primer_apellido_socio4,
            'segundo_apellido_socio4' => $request->segundo_apellido_socio4,
            'num_colegiacion_socio4' => $request->num_colegiacion_socio4,
            'cv_socio4' => $rutaArchivoCVSocio4,
            'titulo_socio4' => json_encode($rutasArchivosTituloSocio4),
            'imagen_firma_socio4' => json_encode($rutasArchivosFirmaSocio4),
            'constancia_solvencia_socio4' => json_encode($rutasArchivosSolvenciaSocio4),

            // III. Documentos
            'imagen_escritura_constitucion' => json_encode($rutasArchivosEscrituraConstitucion),
            'imagen_registro_mercantil' => json_encode($rutasArchivosRegistroMercantil),
            'imagen_rtn_firma_auditora' => json_encode($rutasArchivosRTN),
            'nomina_pago_firma' => $rutaArchivoNominaPago,   

            // IV. Firmas digitales
            'imagen_firma_social' => json_encode($rutasArchivosSolvenciaSocio4),
            'imagen_firma_representante_legal'=> json_encode($rutasArchivosSolvenciaSocio4),

        ]);

        return redirect()->back()->with('success', '¡La inscripción de la firma enviada con éxito!');
    }

}