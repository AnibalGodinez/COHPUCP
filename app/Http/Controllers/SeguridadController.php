<?php

namespace App\Http\Controllers;
use App\Models\User; 

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
}
