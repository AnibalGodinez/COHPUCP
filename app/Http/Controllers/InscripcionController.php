<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Inscripcion;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{

    // Método para mostrar la lista de inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('inscripciones.index', compact('inscripciones'));
    }

    // Método para mostrar detalles de una inscripción específica
    public function show($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('inscripciones.show', compact('inscripcion'));
    }
    
    public function create()
    {
        $universidades = Universidad::all(); // Se obtiene todas las universidades
        return view('inscripciones.create', compact('universidades'));
    }

    // Almacenar una nueva inscripción de agremiado
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
            'municipio_realiza_solicitud' => 'nullable|string|max:255',

            // II. Datos Profesionales
            'fecha_graduacion' => 'required|date',
            'universidad' => 'required|string|max:255',
            'nombre_empresa_trabajo_actual' => 'nullable|string|max:255',
            'cargo' => 'nullable|string|max:255',
            'direccion_empresa' => 'nullable|string|max:255',
            'correo_empresa' => 'nullable|email|max:255|unique:inscripciones,correo_empresa',
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
            'imagen_titulo' => 'required|array',
            'imagen_titulo.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_dni' => 'required|array',
            'imagen_dni.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_tamano_carnet' => 'required|array',
            'imagen_tamano_carnet.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'cv' => 'required|mimes:pdf',

            'imagen_dni_beneficiario1' => 'required|array',
            'imagen_dni_beneficiario1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_dni_beneficiario2' => 'required|array',
            'imagen_dni_beneficiario2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_dni_beneficiario3' => 'required|array',
            'imagen_dni_beneficiario3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_rtn' => 'required|array',
            'imagen_rtn.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            'imagen_firma_solicitante' => 'required|array',
            'imagen_firma_solicitante.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // IX. Estado de la inscripción
            'descripcion_estado_solicitud' => 'nullable|string',
        ], [
            'correo_empresa.unique' => 'El correo electrónico ya está en uso',

            'imagen_titulo.*.image' => 'El archivo del título universitario debe ser una imagen.',
            'imagen_titulo.*.mimes' => 'El título universitario debe estar en formato jpeg, png, jpg o gif.',
            'imagen_titulo.*.max' => 'El título universitario no debe exceder 10MB.',

            'imagen_dni.*.image' => 'El archivo del DNI debe ser una imagen.',
            'imagen_dni.*.mimes' => 'El DNI debe estar en formato jpeg, png, jpg o gif.',
            'imagen_dni.*.max' => 'El DNI no debe exceder 10MB.',
            
            'imagen_tamano_carnet.*.image' => 'El archivo de la foto tamaño carnet debe ser una imagen.',
            'imagen_tamano_carnet.*.mimes' => 'La foto tamaño carnet debe estar en formato jpeg, png, jpg o gif.',
            'imagen_tamano_carnet.*.max' => 'La foto tamaño carnet no debe exceder 10MB.',
            'imagen_tamano_carnet.*.dimensions' => 'La foto tamaño carnet debe tener un tamaño máximo de 35 mm x 45 mm.',

            'imagen_dni_beneficiario1.*.image' => 'El archivo del DNI del beneficiario 1 debe ser una imagen.',
            'imagen_dni_beneficiario1.*.mimes' => 'El DNI del beneficiario 1 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_dni_beneficiario1.*.max' => 'El DNI del beneficiario 1 no debe exceder 10MB.',

            'imagen_dni_beneficiario2.*.image' => 'El archivo del DNI del beneficiario 2 debe ser una imagen.',
            'imagen_dni_beneficiario2.*.mimes' => 'El DNI del beneficiario 2 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_dni_beneficiario2.*.max' => 'El DNI del beneficiario 2 no debe exceder 10MB.',

            'imagen_dni_beneficiario3.*.image' => 'El archivo del DNI del beneficiario 3 debe ser una imagen.',
            'imagen_dni_beneficiario3.*.mimes' => 'El DNI del beneficiario 3 debe estar en formato jpeg, png, jpg o gif.',
            'imagen_dni_beneficiario3.*.max' => 'El DNI del beneficiario 3 no debe exceder 10MB.',

            'imagen_rtn.*.image' => 'El archivo del RTN debe ser una imagen.',
            'imagen_rtn.*.mimes' => 'El RTN debe estar en formato jpeg, png, jpg o gif.',
            'imagen_rtn.*.max' => 'El RTN no debe exceder 10MB.',

            'imagen_firma_solicitante.*.image' => 'El archivo del RTN debe ser una imagen.',
            'imagen_firma_solicitante.*.mimes' => 'El RTN debe estar en formato jpeg, png, jpg o gif.',
            'imagen_firma_solicitante.*.max' => 'El RTN no debe exceder 10MB.',

            'cv.required' => 'El Currículum Vitae es obligatorio.',
            'cv.mimes' => 'El Currículum Vitae debe estar en formato PDF.',
        ]);

        // Manejo de las imágenes del título
        $rutasArchivosTitulos = [];
        if ($request->hasFile('imagen_titulo')) {
            foreach ($request->file('imagen_titulo') as $imagenTitulo) {
                $nombreArchivoTitulo = time() . '_' . $imagenTitulo->getClientOriginalName();
                $rutaArchivoTitulo = $imagenTitulo->storeAs('imgs_titulo_inscripcion', $nombreArchivoTitulo, 'public');
                $rutasArchivosTitulos[] = $rutaArchivoTitulo;
            }
        }

        // Manejo de las imágenes del dni
        $rutasArchivosDNI = [];
        if ($request->hasFile('imagen_dni')) {
            foreach ($request->file('imagen_dni') as $imagenDNI) {
                $nombreArchivoDNI = time() . '_' . $imagenDNI->getClientOriginalName();
                $rutaArchivoDNI = $imagenDNI->storeAs('imgs_dni_inscripcion', $nombreArchivoDNI, 'public');
                $rutasArchivosDNI[] = $rutaArchivoDNI;
            }
        }

        // Manejo de las imágenes de tamaño carnet
        $rutasArchivosTamanoCarnet = [];
        if ($request->hasFile('imagen_tamano_carnet')) {
            foreach ($request->file('imagen_tamano_carnet') as $imagenTamanoCarnet) {
                $nombreArchivoTamanoCarne = time() . '_' . $imagenTamanoCarnet->getClientOriginalName();
                $rutaArchivoTamanoCarne = $imagenTamanoCarnet->storeAs('imgs_tamano_carnet_inscripcion', $nombreArchivoTamanoCarne, 'public');
                $rutasArchivosTamanoCarnet[] = $rutaArchivoTamanoCarne;
            }
        }

        // Manejo del currículum vitae
        $rutaArchivoCV = null;
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $nombreArchivoCV = time() . '_' . $cv->getClientOriginalName();
            $rutaArchivoCV = $cv->storeAs('cvs_inscripcion', $nombreArchivoCV, 'public');
        }

        // Manejo de las imágenes del DNI del beneficario 1
        $rutasArchivosDNIbeneficiario1 = [];
        if ($request->hasFile('imagen_dni_beneficiario1')) {
            foreach ($request->file('imagen_dni_beneficiario1') as $imagenDNIbeneficario1) {
                $nombreArchivoDNIbeneficario1 = time() . '_' . $imagenDNIbeneficario1->getClientOriginalName();
                $rutaArchivoDNIbeneficario1 = $imagenDNIbeneficario1->storeAs('imgs_dni_beneficiario1_inscripcion', $nombreArchivoDNIbeneficario1, 'public');
                $rutasArchivosDNIbeneficiario1[] = $rutaArchivoDNIbeneficario1;
            }
        }

        // Manejo de las imágenes del DNI del beneficario 2
        $rutasArchivosDNIbeneficiario2 = [];
        if ($request->hasFile('imagen_dni_beneficiario2')) {
            foreach ($request->file('imagen_dni_beneficiario2') as $imagenDNIbeneficario2) {
                $nombreArchivoDNIbeneficario2 = time() . '_' . $imagenDNIbeneficario2->getClientOriginalName();
                $rutaArchivoDNIbeneficario2 = $imagenDNIbeneficario2->storeAs('imgs_dni_beneficiario2_inscripcion', $nombreArchivoDNIbeneficario2, 'public');
                $rutasArchivosDNIbeneficiario2[] = $rutaArchivoDNIbeneficario2;
            }
        }

        // Manejo de las imágenes del DNI del beneficario 3
        $rutasArchivosDNIbeneficiario3 = [];
        if ($request->hasFile('imagen_dni_beneficiario3')) {
            foreach ($request->file('imagen_dni_beneficiario3') as $imagenDNIbeneficario3) {
                $nombreArchivoDNIbeneficario3 = time() . '_' . $imagenDNIbeneficario3->getClientOriginalName();
                $rutaArchivoDNIbeneficario3 = $imagenDNIbeneficario3->storeAs('imgs_dni_beneficiario3_inscripcion', $nombreArchivoDNIbeneficario3, 'public');
                $rutasArchivosDNIbeneficiario3[] = $rutaArchivoDNIbeneficario3;
            }
        }

        // Manejo de las imágenes del rtn
        $rutasArchivosRTN = [];
        if ($request->hasFile('imagen_rtn')) {
            foreach ($request->file('imagen_rtn') as $imagenRTN) {
                $nombreArchivoRTN = time() . '_' . $imagenRTN->getClientOriginalName();
                $rutaArchivoRTN = $imagenRTN->storeAs('imgs_rtn_inscripcion', $nombreArchivoRTN, 'public');
                $rutasArchivosRTN[] = $rutaArchivoRTN;
            }
        }

        // Manejo de la imagen de la firma del soli
        $rutasArchivosFirmaSolicitante = [];
        if ($request->hasFile('imagen_firma_solicitante')) {
            foreach ($request->file('imagen_firma_solicitante') as $imagenFirmaSolicitante) {
                $nombreArchivoFirmaSolicitante = time() . '_' . $imagenFirmaSolicitante->getClientOriginalName();
                $rutaArchivoFirmaSolicitante = $imagenFirmaSolicitante->storeAs('imgs_firma_socicitante_inscripcion', $nombreArchivoFirmaSolicitante, 'public');
                $rutasArchivosFirmaSolicitante[] = $rutaArchivoFirmaSolicitante;
            }
        }

        Inscripcion::create([
            'user_id' => Auth::id(), 
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
            'municipio_realiza_solicitud' => $request->municipio_realiza_solicitud,

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

            // VIII. Documentos
            'imagen_titulo' => json_encode($rutasArchivosTitulos),
            'imagen_dni' => json_encode($rutasArchivosDNI),
            'imagen_tamano_carnet' => json_encode($rutasArchivosTamanoCarnet),
            'cv' => $rutaArchivoCV,
            'imagen_dni_beneficiario1' => json_encode($rutasArchivosDNIbeneficiario1),
            'imagen_dni_beneficiario2' => json_encode($rutasArchivosDNIbeneficiario2),
            'imagen_dni_beneficiario3' => json_encode($rutasArchivosDNIbeneficiario3),
            'imagen_rtn' => json_encode($rutasArchivosRTN ),
            'imagen_firma_solicitante' => json_encode($rutasArchivosFirmaSolicitante ),
        ]);

        return redirect()->route('inscripciones.create')->with('status', '¡Solicitud de inscripción enviada con éxito!');
    }

}
