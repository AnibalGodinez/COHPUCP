<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Inscripcion;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscripcionController extends Controller
{
    public function create()
    {
        $universidades = Universidad::all(); // Se obtiene todas las universidades
        return view('inscripciones.create', compact('universidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|max:20|unique:inscripciones,numero_identidad',
            'email' => 'required|email|max:255|unique:inscripciones,email',
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
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'email' => $request->email,
            'universidad' => $request->universidad,
            'imagen_titulo' => json_encode($rutasArchivosTitulos),
            'fecha_inscripcion' => Carbon::now()->toDateString(),
            'cv' => $rutaArchivoCV,
        ]);

        return redirect()->route('inscripciones.create')->with('success', 'Inscripción enviada correctamente.');
    }


}
