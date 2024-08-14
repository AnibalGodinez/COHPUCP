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
        'imagen_titulo' => 'nullable|array',
        'imagen_titulo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'cv' => 'required|mimes:pdf|max:2048',
    ]);

    // Manejo de las imágenes del título
    $rutasArchivosTitulos = [];
    if ($request->hasFile('imagen_titulo')) {
        foreach ($request->file('imagen_titulo') as $imagenTitulo) {
            $nombreArchivoTitulo = time() . '_' . $imagenTitulo->getClientOriginalName();
            $rutaArchivoTitulo = $imagenTitulo->storeAs('imgsTitulos_inscripcion', $nombreArchivoTitulo, 'public');
            $rutasArchivosTitulos[] = $rutaArchivoTitulo;
        }
    }

    // Manejo del currículum vitae
    $rutaArchivoCV = null;
    if ($request->hasFile('cv')) {
        $cv = $request->file('cv');
        $nombreArchivoCV = time() . '_' . $cv->getClientOriginalName();
        $rutaArchivoCV = $cv->storeAs('cvs_inscripcion', $nombreArchivoCV, 'public');
    }

    Inscripcion::create([
        'user_id' => Auth::id(), // Asegurarse de que Auth::id() retorne un valor válido
        'nombre' => $request->nombre,
        'dni' => $request->dni,
        'correo' => $request->correo,
        'universidad' => $request->universidad,
        'imagen_titulo' => json_encode($rutasArchivosTitulos),
        'fecha_inscripcion' => Carbon::now()->toDateString(),
        'cv' => $rutaArchivoCV,
    ]);

    return redirect()->route('inscripciones.create')->with('success', 'Inscripción enviada correctamente.');
}


}
