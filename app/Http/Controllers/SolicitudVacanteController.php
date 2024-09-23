<?php

namespace App\Http\Controllers;

use App\Models\SolicitudVacante;
use Illuminate\Http\Request;

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
        $solicitud = SolicitudVacante::find($id);
        return view('vacantes.show', compact('solicitud'));
    }



    // Mostrar el formulario de edición de una solicitud de vacante
    public function edit($id)
    {
        $solicitud = SolicitudVacante::find($id);
        return view('vacantes.edit', compact('solicitud'));
    }

    // Actualizar una solicitud en la base de datos
    public function update(Request $request, SolicitudVacante $solicitud)
    {
        // Verificar si el campo "estado" está presente en la solicitud
        if ($request->has('estado')) {
            // Actualizar solo el estado de la solicitud
            $solicitud->estado = $request->estado;
            $solicitud->save();

            // Redirigir con un mensaje de éxito
            return redirect()->route('vacantes.index')->with('success', '¡Estado de la solicitud actualizado con éxito!');
        }

        // Si no es un cambio de estado, seguir con la actualización general de la vacante
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

        // Actualizar la información de la solicitud
        $solicitud->update($request->all());

        return redirect()->route('vacantes.index')->with('success', '¡Solicitud de vacante actualizada con éxito!');
    }


    // Eliminar una solicitud de la base de datos
    public function destroy(SolicitudVacante $solicitud)
    {
        $solicitud->delete();

        return redirect()->route('vacantes.index')->with('success', '¡Solicitud de vacante eliminada con éxito!');
    }
}
