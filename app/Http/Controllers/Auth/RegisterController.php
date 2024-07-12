<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Pais;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'name2' => ['nullable', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'apellido2' => ['nullable', 'string', 'max:255'],
            'numero_identidad' => ['required', 'string', 'unique:users,numero_identidad'],
            'numero_colegiacion' => ['nullable', 'string', 'unique:users,numero_colegiacion'],
            'rtn' => ['nullable', 'string', 'max:20', 'unique:users,rtn'],
            'sexo' => ['required', 'in:masculino,femenino'],
            'fecha_nacimiento' => ['required', 'date'],
            'telefono' => ['nullable', 'string', 'max:20'],
            'telefono_celular' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/'],
            'agree_terms_and_conditions' => ['required'],
        ], [
            'password.regex' => 'La contraseña debe contener al menos un símbolo o caractér especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
        ]);
    }

    protected function create(array $data)
{
    $user = User::create([
        'name' => $data['name'],
        'name2' => $data['name2'],
        'apellido' => $data['apellido'],
        'apellido2' => $data['apellido2'],
        'numero_identidad' => $data['numero_identidad'],
        'numero_colegiacion' => $data['numero_colegiacion'],
        'rtn' => $data['rtn'],
        'sexo' => $data['sexo'],
        'fecha_nacimiento' => $data['fecha_nacimiento'],
        'telefono' => $data['telefono'],
        'telefono_celular' => $data['telefono_celular'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'pais_id' => $data['pais_id'], // Guardar el país seleccionado
    ]);

    // Verificar si se ingresó el número de colegiación
    if ($data['numero_colegiacion']) {
        // Asignar el rol 'Agremiado'
        $user->assignRole('Agremiado');
    } else {
        // Asignar el rol 'Invitado'
        $user->assignRole('Invitado');
    }

    return $user;
    }


    public function showRegistrationForm()
    {
        $paises = Pais::all(); // Obtén todos los países
        return view('auth.register', compact('paises'));
    }

}
