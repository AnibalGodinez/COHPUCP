<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlataformaController extends Controller
{
    /**
     * Mostrar página de cursos
     *
     * @return \Illuminate\View\View
     */
    public function cursos()
    {
        return view('plataforma.cursos');
    }

    /**
     * Mostrar página de capacitaciones
     *
     * @return \Illuminate\View\View
     */
    public function capacitaciones()
    {
        return view('plataforma.capacitaciones');
    }

    /**
     * Mostrar página de agendas
     *
     * @return \Illuminate\View\View
     */
    public function agendas()
    {
        return view('plataforma.agendas');
    }

    /**
     * Mostrar página de gestiones
     *
     * @return \Illuminate\View\View
     */
    public function gestiones()
    {
        return view('plataforma.gestiones');
    }

    /**
     * Mostrar página de consultas
     *
     * @return \Illuminate\View\View
     */
    public function consultas()
    {
        return view('plataforma.consultas');
    }
}
