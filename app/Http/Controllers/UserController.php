<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
{
    $search = $request->query('search');

    if ($search) {
        $users = User::where(function($query) use ($search) {
            $query->where('id', 'LIKE', "%{$search}%")
                  ->orWhere('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('estado', 'LIKE', "%{$search}%");
            // Añadir más orWhere según las columnas que se necesiten buscar
        })
        ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
        ->with('roles')->paginate(8);

    } else {
        $users = User::orderBy('id', 'desc') 
                     ->with('roles')->paginate(8);
    }

    return view('users.index', ['users' => $users]);
}


    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'estado' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'estado' => $request->estado,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/usuarios')->with('status', 'Usuario creado exitosamente con roles');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $userRoles = $user -> roles -> pluck('name', 'name')-> all();
        return view('users.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles
      ]);
    }

    public function update(Request $request, user $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
            'estado' => 'required|string'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'estado' => $request->estado,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request -> password)
            ];
        }
        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/usuarios')->with('status', 'Usuario actualizado exitosamente con roles');
    }

    public function destroy($userId)
    {
        $user = User::findOrfail($userId);
        $user->delete();
        return redirect('/usuarios')->with('status', 'El usuario ha sido eliminado exitosamente');
    }

    // Método para ver usuarios
    public function verUsuarios(Request $request)
    {
        $search = $request->query('search');

        if ($search) {
            $users = User::where(function($query) use ($search) {
                $query->where('id', 'LIKE', "%{$search}%")
                      ->orWhere('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhere('estado', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->with('roles')
            ->paginate(8);
        } else {
            $users = User::orderBy('id', 'desc')
                         ->with('roles')
                         ->paginate(8);
        }

        return view('users.view', ['users' => $users]);
    }
}
