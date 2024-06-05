<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacione;

class CapacitacioneController extends Controller {
    public function __construct() {
        $this->authorizeResource(Capacitacione::class, 'capacitacione');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $capacitaciones = Capacitacione::query();
    
        if (!empty($request->search)) {
            $capacitaciones->where('nombre', 'like', '%' . $request->search . '%');
        }
    
        $capacitaciones = $capacitaciones->paginate(4); // Mostrar 4 capacitaciones por página
    
        return view('capacitaciones.index', compact('capacitaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('capacitaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
        ]);

        try {
            $capacitacione = new Capacitacione();
            $capacitacione->nombre = $request->nombre;
            $capacitacione->descripcion = $request->descripcion;
            $capacitacione->user_id = auth()->id(); // Asignar el id del usuario actual
            $capacitacione->save();

            return redirect()->route('capacitaciones.index')->with('success', __('Capacitación creada exitosamente.'));
        } catch (\Throwable $e) {
            return redirect()->route('capacitaciones.create')->withInput($request->input())->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Capacitacione $capacitacione
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Capacitacione $capacitacione) {
        return view('capacitaciones.show', compact('capacitacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Capacitacione $capacitacione
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacitacione $capacitacione) {
        return view('capacitaciones.edit', compact('capacitacione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Capacitacione $capacitacione
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Capacitacione $capacitacione
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Capacitacione $capacitacione) {
        try {
            $capacitacione->delete();

            return redirect()->route('capacitaciones.index')->with('success', __('Capacitación eliminada exitosamente.'));
        } catch (\Throwable $e) {
            return redirect()->route('capacitaciones.index')->with('error', 'No se puede eliminar la capacitación: ' . $e->getMessage());
        }
    }
}
