<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
        // Cargar los usuarios con sus roles
    public function index()
    {
        $users = User::with('roles')->get();
        return view('roles-permisos.user.index',[
            'users' => $users
        ]);
    }
        // Obtener todos los roles
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('roles-permisos.user.create', [
            'roles' => $roles
        ]);
    }
        // Validar los datos del formulario
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required'
        ]);

        // Crear el usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Asignar los roles al usuario
        $user->syncRoles($request->roles);

        return redirect('/usuarios')->with('status', 'Usuario creado exitosamente con roles');
    }
}
