<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use App\Models\Sexo;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver usuarios', ['only' => ['verUsuarios', 'show']]);
        $this->middleware('permission:indice usuarios', ['only' => ['index']]);
        $this->middleware('permission:actualizar usuario', ['only' => ['update', 'edit']]);
        $this->middleware('permission:crear usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:borrar usuario', ['only' => ['destroy']]);
    }

    private function searchUsers($search)
    {
        return User::where(function($query) use ($search) {
            $query->where('id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('name2', 'LIKE', "%{$search}%")
                ->orWhere('apellido', 'LIKE', "%{$search}%")
                ->orWhere('apellido2', 'LIKE', "%{$search}%")
                ->orWhere('numero_identidad', 'LIKE', "%{$search}%")
                ->orWhere('numero_colegiacion', 'LIKE', "%{$search}%")
                ->orWhere('rtn', 'LIKE', "%{$search}%")
                ->orWhere('fecha_nacimiento', 'LIKE', "%{$search}%")
                ->orWhere('telefono', 'LIKE', "%{$search}%")
                ->orWhere('telefono_celular', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhereHas('pais', function ($query) use ($search) {
                    $query->where('nombre', 'LIKE', "%{$search}%");
                })
                ->orWhereHas('roles', function ($query) use ($search) {
                    $query->where('name', 'LIKE', "%{$search}%");
                });
        })
        ->orderBy('id', 'desc')
        ->with('roles', 'pais') // Incluye la relación 'roles' y 'pais'
        ->paginate(7);
    }

    public function index(Request $request)
    {
        $search = $request->query('search');
        $users = $search 
            ? $this->searchUsers($search)->with('pais') 
            : User::orderBy('id', 'desc')->with('roles', 'pais')->paginate(7);

        return view('users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $sexos = Sexo::all();
        $paises = Pais::all();
        return view('users.create', ['roles' => $roles,'paises' => $paises,'sexos' => $sexos]);
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
            'sexo_id' => 'required|integer',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:40|regex:/^[\d-]*$/',
            'telefono_celular' => 'required|string|max:40|regex:/^[\d-]*$/',
            'email' => 'required|email|max:255|unique:users,email',
            'email_confirmation' => 'required|email|same:email',
            'pais_id' => 'nullable|exists:pais,id',
            'password' => [
                'required',
                'string',
                'min:8',
                'max:20',
                'confirmed',
                'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/',
            ],
        ], [
            // Mensajes personalizados de validación
            'name.required' => 'El campo nombre es obligatorio',
            'apellido.required' => 'El campo apellido es obligatorio',
            'numero_identidad.required' => 'El campo número de identidad es obligatorio',
            'numero_identidad.unique' => 'El número de identidad ya está en uso',
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio',
            'telefono_celular.required' => 'El campo teléfono celular es obligatorio',
            'email.required' => 'El campo email es obligatorio',
            'email.unique' => 'El email ya está en uso',
            'email_confirmation' => 'La confirmación del correo eletrónico no coincide',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o carácter especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
            'telefono.regex' => 'El número de teléfono fijo sólo debe contener números y guiones',
            'telefono_celular.regex' => 'El número de celular sólo debe contener números y guiones',
        ]);

        $user = User::create([
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'numero_colegiacion' => $request->numero_colegiacion,
            'rtn' => $request->rtn,
            'sexo_id' => $request->sexo_id,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'telefono_celular' => $request->telefono_celular,
            'email' => $request->email,
            'pais_id' => $request->pais_id,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        return redirect('/usuarios')->with('status', '¡El usuario se ha creado con éxito!');
    }


    public function edit($id)
    {
        $user = User::with('pais')->findOrFail($id); 
        $paises = Pais::all();
        $sexos = Sexo::all(); 
        $roles = Role::pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'paises', 'sexos'));
    }


    public function update(Request $request, $userId)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|max:15|unique:users,numero_identidad,' . $userId,
            'numero_colegiacion' => 'nullable|string|max:12|unique:users,numero_colegiacion,' . $userId,
            'rtn' => 'nullable|string|max:16|unique:users,rtn,' . $userId,
            'sexo' => 'required|exists:sexos,id', // Cambiado a 'sexo'
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'nullable|string|max:20|regex:/^[\d-]*$/',
            'telefono_celular' => 'required|string|max:20|regex:/^[\d-]*$/',
            'email' => 'required|string|email|max:255|unique:users,email,' . $userId,
            'pais_id' => 'nullable|exists:pais,id',
            'roles' => 'required|array',
            'estado' => 'required|in:activo,inactivo',
        ], [
            'sexo.exists' => 'El sexo seleccionado es inválido', // Cambiado a 'sexo'
            'pais_id.exists' => 'El país seleccionado es inválido',
            'telefono.regex' => 'El número de teléfono fijo debe contener solo números y guiones',
            'telefono_celular.regex' => 'El número de celular debe contener solo números y guiones',
        ]);

        $user = User::findOrFail($userId);

        $user->update([
            'name' => $request->name,
            'name2' => $request->name2,
            'apellido' => $request->apellido,
            'apellido2' => $request->apellido2,
            'numero_identidad' => $request->numero_identidad,
            'numero_colegiacion' => $request->numero_colegiacion,
            'rtn' => $request->rtn,
            'sexo_id' => $request->sexo, // Cambiado a 'sexo'
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'telefono' => $request->telefono,
            'telefono_celular' => $request->telefono_celular,
            'email' => $request->email,
            'pais_id' => $request->pais_id,
            'estado' => $request->estado,
        ]);

        if ($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        return redirect('/usuarios')->with('status', '¡El usuario se ha actualizado con éxito!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/usuarios')->with('status', '¡El usuario se ha eliminado con éxito!');
    }

    public function show($id)
    {
        // Carga el usuario con sus relaciones
        $user = User::with('roles', 'pais', 'sexo')->findOrFail($id);

        // Retorna la vista con la información del usuario
        return view('users.show', compact('user'));
    }

    public function verUsuarios(Request $request)
    {
        $search = $request->query('search');
        $users = $this->searchUsers($search);
        return view('users.view', ['users' => $users]);
    }

    public function getUserData($identifier)
    {
        $user = User::where('id', $identifier)->orWhere('numero_identidad', $identifier)->first();

        if ($user) {
            return response()->json(['success' => true, 'user' => $user]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}

