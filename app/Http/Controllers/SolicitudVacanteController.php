<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use App\Models\SolicitudVacante;
use App\Notifications\VacanteAprobada;

class SolicitudVacanteController extends Controller
{
    // Mostrar todas las solicitudes de vacantes
    public function index()
    {
        $solicitudes = SolicitudVacante::where('estado', 'pendiente')->get();
        return view('vacantes.index', compact('solicitudes'));
    }

    // Mostrar el formulario de creación de una nueva solicitud de vacante
    public function create()
    {
        return view('vacantes.create');
    }

    // Almacenar una nueva solicitud en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'nombre_vacante' => 'required|string|max:255',
            'descripcion' => 'required',
            'responsabilidades' => 'required',
            'requisitos' => 'required',
            'experiencia' => 'required',
            'tiempo' => 'required|string',
            'ubicacion' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'celular' => 'required',
            'enlace' => 'nullable|url',
        ]);

        SolicitudVacante::create([
            'user_id' => auth()->id(), // ID del usuario autenticado
            'nombre_empresa' => $request->nombre_empresa,
            'nombre_vacante' => $request->nombre_vacante,
            'descripcion' => $request->descripcion,
            'responsabilidades' => $request->responsabilidades,
            'requisitos' => $request->requisitos,
            'experiencia' => $request->experiencia,
            'tiempo' => $request->tiempo,
            'ubicacion' => $request->ubicacion,
            'correo' => $request->correo,
            'telefono' => $request->telefono,
            'celular' => $request->celular,
            'enlace' => $request->enlace,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('vacantes.index')->with('success', '¡Solicitud de vacante enviada con éxito!');
    }

    // Mostrar el detalle de una solicitud
    public function show($id)
    {
        $solicitud = SolicitudVacante::find($id); // O el método correcto que estés utilizando para obtener la solicitud
        
        if (!$solicitud) {
            return redirect()->route('vacantes.index')->with('error', 'Solicitud no encontrada');
        }

        return view('vacantes.show', compact('solicitud'));
    }


    // Mostrar el formulario de edición de una solicitud de vacante
    public function edit($id)
    {
        $solicitud = SolicitudVacante::find($id);
        return view('vacantes.edit', compact('solicitud'));
    }

    // Actualizar una solicitud en la base de datos
    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'nombre_empresa' => 'required|string|max:255',
            'nombre_vacante' => 'required|string|max:255',
            'descripcion' => 'required',
            'responsabilidades' => 'required',
            'requisitos' => 'required',
            'experiencia' => 'required',
            'tiempo' => 'required|string',
            'ubicacion' => 'required',
            'correo' => 'required|email',
            'telefono' => 'required',
            'celular' => 'required',
            'enlace' => 'nullable|url',
            'estado' => 'required|string',
        ]);

        // Buscar la solicitud
        $solicitud = SolicitudVacante::findOrFail($id);

        // Actualizar los campos
        $solicitud->nombre_empresa = $request->nombre_empresa;
        $solicitud->nombre_vacante = $request->nombre_vacante;
        $solicitud->descripcion = $request->descripcion;
        $solicitud->responsabilidades = $request->responsabilidades;
        $solicitud->requisitos = $request->requisitos;
        $solicitud->experiencia = $request->experiencia;
        $solicitud->ubicacion = $request->ubicacion;
        $solicitud->tiempo = $request->tiempo;
        $solicitud->correo = $request->correo;
        $solicitud->telefono = $request->telefono;
        $solicitud->celular = $request->celular;
        $solicitud->enlace = $request->enlace;
        $solicitud->estado = $request->estado;

        // Guardar los cambios
        $solicitud->save();

         // Si el estado es aprobado, envía la notificación
         if ($solicitud->estado == 'aprobado') {
            $usuario = User::where('email', $solicitud->correo)->first();
            if ($usuario) {
                $usuario->notify(new VacanteAprobada($solicitud));
            }
        }        

        return redirect()->route('vacantes.index')->with('success', 'Vacante actualizada con éxito.');
    }

    // Mostrar todas las vacantes disponibles
    public function verVacantes()
    {
        // Obtener todas las solicitudes de vacantes en estado 'aprobado'
        $vacantes = SolicitudVacante::where('estado', 'aprobado')->get();

        // Retornar la vista 'vacantes.ver' con las vacantes
        return view('vacantes.ver', compact('vacantes'));
    }

    public function vacantesAprobadas()
    {
        // Obtener todas las solicitudes de vacantes que han sido aprobadas
        $vacantesAprobadas = SolicitudVacante::where('estado', 'aprobado')->get();

        // Retornar la vista con las vacantes aprobadas
        return view('vacantes.aprobadas', compact('vacantesAprobadas'));
    }


    // Eliminar una solicitud de la base de datos
    public function destroy(SolicitudVacante $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('vacantes.index')->with('success', '¡Solicitud de vacante eliminada con éxito!');
    }
}
