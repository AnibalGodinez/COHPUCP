<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver usuarios', ['only' => ['verUsuarios']]);
        $this->middleware('permission:indice usuarios', ['only' => ['index']]);
        $this->middleware('permission:actualizar usuario', ['only' => ['update','edit']]);
        $this->middleware('permission:crear usuario', ['only' => ['create','store']]);
        $this->middleware('permission:borrar usuario', ['only' => ['destroy']]);
    }

//-----------------------------------------------------------------------------------------------------------------
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
                  ->orWhere('email', 'LIKE', "%{$search}%");
        })
        ->orderBy('id', 'desc')
        ->with('roles')->paginate(4);

    } else {
        $users = User::orderBy('id', 'desc') 
                     ->with('roles')->paginate(4);
    }

    return view('users.index', ['users' => $users]);
}

//-----------------------------------------------------------------------------------------------------------------
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', [
            'roles' => $roles
        ]);
    }

//-----------------------------------------------------------------------------------------------------------------
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
        'password' => [
            'required', 
            'string', 
            'min:8', 
            'max:20', 
            'confirmed', 
            'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/'
        ],
    ], [
        'name.required' => 'El campo nombre es obligatorio.',
        'apellido.required' => 'El campo apellido es obligatorio.',
        'numero_identidad.required' => 'El campo número de identidad es obligatorio.',
        'numero_identidad.unique' => 'El número de identidad ya está en uso.',
        'sexo.required' => 'El campo sexo es obligatorio.',
        'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
        'telefono_celular.required' => 'El campo teléfono celular es obligatorio.',
        'email.required' => 'El campo email es obligatorio.',
        'email.unique' => 'El email ya está en uso.',
        'password.required' => 'El campo contraseña es obligatorio.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.confirmed' => 'La confirmación de la contraseña no coincide.',
        'password.regex' => 'La contraseña debe contener al menos un símbolo o caractér especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
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
        'password' => Hash::make($request->password),
    ]);

    $user->syncRoles($request->roles);

    return redirect('/usuarios')->with('status', 'El usuario se ha creado exitosamente con su respectivo rol');
}

//-----------------------------------------------------------------------------------------------------------------
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

//-----------------------------------------------------------------------------------------------------------------
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
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'max:20', 'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/'],
        ], [
            'name.required' => 'El campo nombre es obligatorio.',
            'apellido.required' => 'El campo apellido es obligatorio.',
            'numero_identidad.required' => 'El campo número de identidad es obligatorio.',
            'numero_identidad.unique' => 'El número de identidad ya está en uso.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'telefono_celular.required' => 'El campo teléfono celular es obligatorio.',
            'email.required' => 'El campo email es obligatorio.',
            'email.unique' => 'El email ya está en uso.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'La confirmación de la contraseña no coincide.',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o caractér especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
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

//-----------------------------------------------------------------------------------------------------------------
    public function destroy($userId)
    {
        $user = User::findOrfail($userId);
        $user->delete();
        return redirect('/usuarios')->with('status', 'El usuario ha sido eliminado exitosamente');
    }

//-----------------------------------------------------------------------------------------------------------------
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
                    ->orWhere('email', 'LIKE', "%{$search}%");
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
