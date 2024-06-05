<?php

namespace App\Http\Controllers;

use App\Models\Permiso;
use Illuminate\Http\Request;

class PermisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permisos = Permiso::all(); // Recuperar los permisos de la base de datos
        return view('permisos.index', compact('permisos')); // Pasar los permisos a la vista usando compact()
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function show(Permiso $permisos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function edit(Permiso $permisos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permiso $permisos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permisos  $permisos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permiso $permisos)
    {
        //
    }
}
