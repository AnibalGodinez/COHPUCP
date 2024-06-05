<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeguridadController extends Controller
{
    /**
     * Mostrar página de usuarios
     *
     * @return \Illuminate\View\View
     */
    public function usuarios()
    {
        return view('seguridad.usuarios');
    }

    /**
     * Mostrar página de Roles y Permisos
     *
     * @return \Illuminate\View\View
     */
    public function rolesPermisos()
    {
        // Lógica para la página de Roles y Permisos
        return view('seguridad.roles_permisos');
    }

    /**
     * Mostrar página de Gestión de Roles
     *
     * @return \Illuminate\View\View
     */
    public function gestionRoles()
    {
        // Lógica para la página de Gestión de Roles
        return view('seguridad.gestion_roles');
    }
}
