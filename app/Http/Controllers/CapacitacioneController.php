<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacione;

class CapacitacioneController extends Controller {
    public function __construct() {
        $this->authorizeResource(Capacitacione::class, 'capacitacione');
    }

    public function index(Request $request)
{
    $search = $request->query('search');

    if ($search) {
        $capacitaciones = Capacitacione::where(function($query) use ($search) {
            $query->where('id', 'LIKE', "%{$search}%")
                  ->orWhere('nombre', 'LIKE', "%{$search}%")
                  ->orWhere('descripcion', 'LIKE', "%{$search}%");
        })->paginate(4);
    } else {
        $capacitaciones = Capacitacione::paginate(3);
    }

    return view('capacitaciones.index', compact('capacitaciones'));
}

    
    public function create() {
        return view('capacitaciones.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        try {
            $capacitacione = new Capacitacione();
            $capacitacione->nombre = $request->nombre;
            $capacitacione->descripcion = $request->descripcion;
            $capacitacione->user_id = auth()->id();
            $capacitacione->save();

            return redirect()->route('capacitaciones.index')->with('success', __('Capacitación creada exitosamente.'));
        } catch (\Throwable $e) {
            return redirect()->route('capacitaciones.create')->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show(Capacitacione $capacitacione) {
        return view('capacitaciones.show', compact('capacitacione'));
    }

    public function edit(Capacitacione $capacitacione) {
        return view('capacitaciones.edit', compact('capacitacione'));
    }

    public function update(Request $request, Capacitacione $capacitacione) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        try {
            $capacitacione->nombre = $request->nombre;
            $capacitacione->descripcion = $request->descripcion;
            $capacitacione->save();

            return redirect()->route('capacitaciones.index')->with('success', __('Capacitación editada exitosamente.'));
        } catch (\Throwable $e) {
            return redirect()->route('capacitaciones.edit', compact('capacitacione'))->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Capacitacione $capacitacione) {
        try {
            $capacitacione->delete();

            return redirect()->route('capacitaciones.index')->with('success', __('Capacitación eliminada exitosamente.'));
        } catch (\Throwable $e) {
            return redirect()->route('capacitaciones.index')->with('error', 'No se puede eliminar la capacitación: ' . $e->getMessage());
        }
    }
}
