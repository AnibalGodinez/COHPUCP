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
                  ->orWhere('name2', 'LIKE', "%{$search}%")
                  ->orWhere('apellido', 'LIKE', "%{$search}%")
                  ->orWhere('apellido2', 'LIKE', "%{$search}%")
                  ->orWhere('numero_identidad', 'LIKE', "%{$search}%")
                  ->orWhere('numero_colegiacion', 'LIKE', "%{$search}%")
                  ->orWhere('rtn', 'LIKE', "%{$search}%")
                  ->orWhere('sexo', 'LIKE', "%{$search}%")
                  ->orWhere('fecha_nacimiento', 'LIKE', "%{$search}%")
                  ->orWhere('telefono', 'LIKE', "%{$search}%")
                  ->orWhere('telefono_celular', 'LIKE', "%{$search}%")
                  
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('estado', 'LIKE', "%{$search}%");
            // Añadir más orWhere según las columnas que se necesiten buscar
        })
        ->orderBy('id', 'desc') // Ordenar por el campo 'id' de forma descendente
        ->with('roles')->paginate(4);

    } else {
        $users = User::orderBy('id', 'desc') 
                     ->with('roles')->paginate(4);
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
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|unique:users,numero_identidad',
            'numero_colegiacion' => 'nullable|string|unique:users,numero_colegiacion',
            'rtn' => 'nullable|string|max:20|unique:users,rtn',
            'sexo' => 'required|in:masculino,femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20',
            'telefono_celular' => 'required|string|max:20',
            
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            'estado' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'numero_colegiacion' => $request->numero_colegiacion,
            'rtn' => $request->rtn,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'telefono_celular' => $request->telefono_celular,

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
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|unique:users,numero_identidad',
            'numero_colegiacion' => 'nullable|string|unique:users,numero_colegiacion',
            'rtn' => 'nullable|string|max:20|unique:users,rtn',
            'sexo' => 'required|in:masculino,femenino',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20',
            'telefono_celular' => 'required|string|max:20',

            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required',
            'estado' => 'required|string'
        ]);

        $data = [
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'numero_colegiacion' => $request->numero_colegiacion,
            'rtn' => $request->rtn,
            'sexo' => $request->sexo,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'telefono_celular' => $request->telefono_celular,

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
                      ->orWhere('name2', 'LIKE', "%{$search}%")
                      ->orWhere('apellido', 'LIKE', "%{$search}%")
                      ->orWhere('apellido2', 'LIKE', "%{$search}%")
                      ->orWhere('numero_identidad', 'LIKE', "%{$search}%")
                      ->orWhere('numero_colegiacion', 'LIKE', "%{$search}%")
                      ->orWhere('rtn', 'LIKE', "%{$search}%")
                      ->orWhere('sexo', 'LIKE', "%{$search}%")
                      ->orWhere('fecha_nacimiento', 'LIKE', "%{$search}%")
                      ->orWhere('telefono', 'LIKE', "%{$search}%")
                      ->orWhere('telefono_celular', 'LIKE', "%{$search}%")

                      ->orWhere('email', 'LIKE', "%{$search}%")
                      ->orWhere('estado', 'LIKE', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->with('roles')
            ->paginate(4);
        } else {
            $users = User::orderBy('id', 'desc')
                         ->with('roles')
                         ->paginate(4);
        }

        return view('users.view', ['users' => $users]);
    }
}
