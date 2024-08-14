<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class InscripcionController extends Controller
{
    public function create()
    {
        return view('inscripciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'dni' => 'required|string|max:20|unique:inscripciones,dni',
            'correo' => 'required|email|max:255|unique:inscripciones,correo',
            'universidad' => 'required|string|max:255',
            'imagen_titulo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        // Manejo de la imagen del título
        $rutaArchivoTitulo = null;
        if ($request->hasFile('imagen_titulo')) {
            $imagenTitulo = $request->file('imagen_titulo');
            $nombreArchivoTitulo = time() . '_' . $imagenTitulo->getClientOriginalName();
            $rutaArchivoTitulo = $imagenTitulo->storeAs('imgsTitulos_inscripcion', $nombreArchivoTitulo, 'public');
        }

        // Manejo del currículum vitae
        $rutaArchivoCV = null;
        if ($request->hasFile('cv')) {
            $cv = $request->file('cv');
            $nombreArchivoCV = time() . '_' . $cv->getClientOriginalName();
            $rutaArchivoCV = $cv->storeAs('cvs_inscripcion', $nombreArchivoCV, 'public');
        }

        Inscripcion::create([
            'user_id' => Auth::id(),
            'nombre' => $request->nombre,
            'dni' => $request->dni,
            'correo' => $request->correo,
            'universidad' => $request->universidad,
            'imagen_titulo' => $rutaArchivoTitulo,
            'fecha_inscripcion' => Carbon::now()->toDateString(),
            'cv' => $rutaArchivoCV,
        ]);

        return redirect()->route('inscripciones.create')->with('success', 'Inscripción enviada correctamente.');
    }
}
