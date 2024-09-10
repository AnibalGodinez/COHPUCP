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
        $inscripcionFirmas = InscripcionFirma::with('user')->get(); // Asegúrate de cargar la relación del usuario
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
            'cv_socio1' => 'nullable|mimes:pdf|max:10240', // Se agregó un límite de tamaño para PDF
            'imagen_firma_socio1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_titulo_socio1' => 'nullable|array',
            'imagen_titulo_socio1.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

                // socio 2
            'primer_nombre_socio2' => 'required|string|max:255',
            'segundo_nombre_socio2' => 'nullable|string|max:255',
            'primer_apellido_socio2' => 'required|string|max:255',
            'segundo_apellido_socio2' => 'nullable|string|max:255',
            'num_colegiacion_socio2' => 'nullable|string|max:255',
            'cv_socio2' => 'nullable|mimes:pdf|max:10240', // Se agregó un límite de tamaño para PDF
            'imagen_firma_socio2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_titulo_socio2' => 'nullable|array',
            'imagen_titulo_socio2.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

                // socio 3
            'primer_nombre_socio3' => 'required|string|max:255',
            'segundo_nombre_socio3' => 'nullable|string|max:255',
            'primer_apellido_socio3' => 'required|string|max:255',
            'segundo_apellido_socio3' => 'nullable|string|max:255',
            'num_colegiacion_socio3' => 'nullable|string|max:255',
            'cv_socio3' => 'nullable|mimes:pdf|max:10240', // Se agregó un límite de tamaño para PDF
            'imagen_firma_socio3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_titulo_socio3' => 'nullable|array',
            'imagen_titulo_socio3.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

                //socio 4
            'primer_nombre_socio4' => 'required|string|max:255',
            'segundo_nombre_socio4' => 'nullable|string|max:255',
            'primer_apellido_socio4' => 'required|string|max:255',
            'segundo_apellido_socio4' => 'nullable|string|max:255',
            'num_colegiacion_socio4' => 'nullable|string|max:255',
            'cv_socio4' => 'nullable|mimes:pdf|max:10240', // Se agregó un límite de tamaño para PDF
            'imagen_firma_socio4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'constancia_solvencia_socio4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_titulo_socio4' => 'nullable|array',
            'imagen_titulo_socio4.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',

            // III. Documentos
            'imagen_escritura_constitucion' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_registro_mercantil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_rtn_firma_auditora' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'nomina_pago_firma' => 'nullable|mimes:pdf|max:10240',

            // IV. Firmas digitales
            'imagen_firma_social' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'imagen_firma_representante_legal' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            
            // V. Estado de la inscripción de la firma
            'estado' => 'nullable|in:pendiente,aprobado,rechazado',
            'descripcion_estado_solicitud' => 'nullable|string',
        ], [
            // Mensajes de error personalizados
            //socio 1
            'imagen_firma_socio1.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio1.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio1.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'constancia_solvencia_socio1.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'constancia_solvencia_socio1.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'constancia_solvencia_socio1.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'imagen_titulo_socio1.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_titulo_socio1.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_titulo_socio1.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            
            // socio 2
            'imagen_firma_socio2.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio2.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio2.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'constancia_solvencia_socio2.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'constancia_solvencia_socio2.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'constancia_solvencia_socio2.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'imagen_titulo_socio2.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_titulo_socio2.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_titulo_socio2.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            // socio 3
            'imagen_firma_socio3.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio3.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio3.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'constancia_solvencia_socio3.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'constancia_solvencia_socio3.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'constancia_solvencia_socio3.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'imagen_titulo_socio3.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_titulo_socio3.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_titulo_socio3.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            // socio 4
            'imagen_firma_socio4.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_firma_socio4.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_socio4.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'constancia_solvencia_socio4.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'constancia_solvencia_socio4.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'constancia_solvencia_socio4.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            'imagen_titulo_socio4.image' => 'El archivo de la firma digital del socio 1 debe ser una imagen.',
            'imagen_titulo_socio4.mimes' => 'El archivo de la firma digital del socio 1 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_titulo_socio4.max' => 'El archivo de la firma digital del socio 1 no debe exceder 10MB.',

            // Documentos
            'imagen_escritura_constitucion.image' => 'El archivo de la firma digital del socio 4 debe ser una imagen.',
            'imagen_escritura_constitucion.mimes' => 'El archivo de la firma digital del socio 4 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_escritura_constitucion.max' => 'El archivo de la firma digital del socio 4 no debe exceder 10MB.',            

            'imagen_registro_mercantil.image' => 'El archivo de la firma digital del socio 4 debe ser una imagen.',
            'imagen_registro_mercantil.mimes' => 'El archivo de la firma digital del socio 4 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_registro_mercantil.max' => 'El archivo de la firma digital del socio 4 no debe exceder 10MB.',

            'imagen_rtn_firma_auditora.image' => 'El archivo de la firma digital del socio 4 debe ser una imagen.',
            'imagen_rtn_firma_auditora.mimes' => 'El archivo de la firma digital del socio 4 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_rtn_firma_auditora.max' => 'El archivo de la firma digital del socio 4 no debe exceder 10MB.',

            'nomina_pago_firma.image' => 'El archivo de la firma digital del socio 4 debe ser una imagen.',
            'nomina_pago_firma.mimes' => 'El archivo de la firma digital del socio 4 debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'nomina_pago_firma.max' => 'El archivo de la firma digital del socio 4 no debe exceder 10MB.',

            'imagen_firma_social.image' => 'El archivo de la firma digital social debe ser una imagen.',
            'imagen_firma_social.mimes' => 'El archivo de la firma digital social debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_social.max' => 'El archivo de la firma digital social no debe exceder 10MB.',

            'imagen_firma_representante_legal.image' => 'El archivo de la firma digital del representante legal debe ser una imagen.',
            'imagen_firma_representante_legal.mimes' => 'El archivo de la firma digital del representante legal debe estar en formato jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico o avif.',
            'imagen_firma_representante_legal.max' => 'El archivo de la firma digital del representante legal no debe exceder 10MB.',
        ]);

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
                // socio 1
            'primer_nombre_socio1' => $request->primer_nombre_socio1,
            'segundo_nombre_socio1' => $request->segundo_nombre_socio1,
            'primer_apellido_socio1' => $request->primer_apellido_socio1,
            'segundo_apellido_socio1' => $request->segundo_apellido_socio1,
            'num_colegiacion_socio1' => $request->num_colegiacion_socio1,
            'cv_socio1' => $request->hasFile('cv_socio1') 
                ? $this->storeFile($request->file('cv_socio1'), 'cv_socio1_inscripcion_firma') 
                : null,
            'imagen_firma_socio1' => $request->hasFile('imagen_firma_socio1') 
                ? $this->storeImage($request->file('imagen_firma_socio1'), 'img_firma_socio1_inscripcion_firma') 
                : null,
            'constancia_solvencia_socio1' => $request->hasFile('constancia_solvencia_socio1') 
                ? $this->storeImage($request->file('constancia_solvencia_socio1'), 'img_constancia_solvencia_socio1_inscripcion_firma') 
                : null,
            'imagen_titulo_socio1' => $request->hasFile('imagen_titulo_socio1') 
                ? $this->storeImages($request->file('imagen_titulo_socio1'), 'img_titulo_socio1_inscripcion_firma') 
                : null,

                // socio 2
            'primer_nombre_socio2' => $request->primer_nombre_socio2,
            'segundo_nombre_socio2' => $request->segundo_nombre_socio2,
            'primer_apellido_socio2' => $request->primer_apellido_socio2,
            'segundo_apellido_socio2' => $request->segundo_apellido_socio2,
            'num_colegiacion_socio2' => $request->num_colegiacion_socio2,
            'cv_socio2' => $request->hasFile('cv_socio2') 
                ? $this->storeFile($request->file('cv_socio2'), 'cv_socio2_inscripcion_firma') 
                : null,
            'imagen_firma_socio2' => $request->hasFile('imagen_firma_socio2') 
                ? $this->storeImage($request->file('imagen_firma_socio2'), 'img_firma_socio2_inscripcion_firma') 
                : null,
            'constancia_solvencia_socio2' => $request->hasFile('constancia_solvencia_socio2') 
                ? $this->storeImage($request->file('constancia_solvencia_socio2'), 'img_constancia_solvencia_socio2_inscripcion_firma') 
                : null,
            'imagen_titulo_socio2' => $request->hasFile('imagen_titulo_socio2') 
                ? $this->storeImages($request->file('imagen_titulo_socio2'), 'img_titulo_socio2_inscripcion_firma') 
                : null,

                // socio 3
            'primer_nombre_socio3' => $request->primer_nombre_socio3,
            'segundo_nombre_socio3' => $request->segundo_nombre_socio3,
            'primer_apellido_socio3' => $request->primer_apellido_socio3,
            'segundo_apellido_socio3' => $request->segundo_apellido_socio3,
            'num_colegiacion_socio3' => $request->num_colegiacion_socio3,
            'cv_socio3' => $request->hasFile('cv_socio3') 
                ? $this->storeFile($request->file('cv_socio3'), 'cv_socio3_inscripcion_firma') 
                : null,
            'imagen_firma_socio3' => $request->hasFile('imagen_firma_socio3') 
                ? $this->storeImage($request->file('imagen_firma_socio3'), 'img_firma_socio3_inscripcion_firma') 
                : null,
            'constancia_solvencia_socio3' => $request->hasFile('constancia_solvencia_socio3') 
                ? $this->storeImage($request->file('constancia_solvencia_socio3'), 'img_constancia_solvencia_socio3_inscripcion_firma') 
                : null,
            'imagen_titulo_socio3' => $request->hasFile('imagen_titulo_socio3') 
                ? $this->storeImages($request->file('imagen_titulo_socio3'), 'img_titulo_socio3_inscripcion_firma') 
                : null,

                // socio 4
            'primer_nombre_socio4' => $request->primer_nombre_socio4,
            'segundo_nombre_socio4' => $request->segundo_nombre_socio4,
            'primer_apellido_socio4' => $request->primer_apellido_socio4,
            'segundo_apellido_socio4' => $request->segundo_apellido_socio4,
            'num_colegiacion_socio4' => $request->num_colegiacion_socio4,
            'cv_socio4' => $request->hasFile('cv_socio4') 
                ? $this->storeFile($request->file('cv_socio4'), 'cv_socio4_inscripcion_firma') 
                : null,
            'imagen_firma_socio4' => $request->hasFile('imagen_firma_socio4') 
                ? $this->storeImage($request->file('imagen_firma_socio4'), 'img_firma_socio4_inscripcion_firma') 
                : null,
            'constancia_solvencia_socio4' => $request->hasFile('constancia_solvencia_socio4') 
                ? $this->storeImage($request->file('constancia_solvencia_socio4'), 'img_constancia_solvencia_socio4_inscripcion_firma') 
                : null,
            'imagen_titulo_socio4' => $request->hasFile('imagen_titulo_socio4') 
                ? $this->storeImages($request->file('imagen_titulo_socio4'), 'img_titulo_socio4_inscripcion_firma') 
                : null,

            // III. Documentos
            'imagen_escritura_constitucion' => $request->hasFile('imagen_escritura_constitucion') 
                ? $this->storeImage($request->file('imagen_escritura_constitucion'), 'img_firma_escritura_constitucion') 
                : null,
            'imagen_registro_mercantil' => $request->hasFile('imagen_registro_mercantil') 
                ? $this->storeImage($request->file('imagen_registro_mercantil'), 'img_firma_registro_mercantil') 
                : null,
            'imagen_rtn_firma_auditora' => $request->hasFile('imagen_rtn_firma_auditora') 
                ? $this->storeImage($request->file('imagen_rtn_firma_auditora'), 'img_firma_rtn') 
                : null,
            'nomina_pago_firma' => $request->hasFile('nomina_pago_firma') 
                ? $this->storeFile($request->file('nomina_pago_firma'), 'nomina_pago_firma_inscripcion_firma') 
                : null,     

            // IV. Firmas digitales
            'imagen_firma_social' => $request->hasFile('imagen_firma_social') 
                ? $this->storeImage($request->file('imagen_firma_social'), 'img_firma_social_inscripcion_firma') 
                : null,
            'imagen_firma_representante_legal' => $request->hasFile('imagen_firma_representante_legal') 
                ? $this->storeImage($request->file('imagen_firma_representante_legal'), 'img_firma_representante_inscripcion_firma') 
                : null,

        ]);

        return redirect()->back()->with('success', '¡La inscripción de la firma enviada con éxito!');
    }

    // Método auxiliar para almacenar imágenes
    private function storeImage($file, $folder)
    {
        $nombreArchivo = time() . '_' . $file->getClientOriginalName();
        return $file->storeAs($folder, $nombreArchivo, 'public');
    }

    // Método auxiliar para guardar archivos de CV
    private function storeFile($file, $folder)
    {
        return $file->store($folder, 'public');
    }

    // Método auxiliar para almacenar múltiples imágenes
    private function storeImages($files, $folder)
    {
        $paths = []; // Array para almacenar las rutas de las imágenes almacenadas

        foreach ($files as $file) {
            // Generar un nombre único para cada archivo
            $nombreArchivo = time() . '_' . $file->getClientOriginalName();
            // Almacenar el archivo en el directorio especificado
            $path = $file->storeAs($folder, $nombreArchivo, 'public');
            // Agregar la ruta al array
            $paths[] = $path;
        }

        // Puedes devolver el array de rutas como JSON si lo necesitas
        return json_encode($paths);
    }

}
