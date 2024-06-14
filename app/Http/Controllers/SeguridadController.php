<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class SeguridadController extends Controller
{
    public function verUsuarios(Request $request)
    {
        $search = $request->input('search');

        $users = User::query()
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhere('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc') // Ordenar por el campo 'name' de forma ascendente
            ->paginate(10);

        return view('seguridad.usuarios', compact('users'));
    }

    public function verRoles(Request $request)
    {
        $search = $request->input('search');

        $roles = Role::query()
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhere('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('seguridad.roles', compact('roles'));
    }

    public function verPermisos(Request $request)
    {
        $search = $request->input('search');

        $permissions = Permission::query()
            ->when($search, function ($query, $search) {
                return $query->where('id', 'like', "%{$search}%")
                             ->orWhere('name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('seguridad.permisos', compact('permissions'));
    }
}
