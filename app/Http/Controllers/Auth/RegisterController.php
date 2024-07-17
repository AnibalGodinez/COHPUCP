<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\Pais;
use Illuminate\Support\Carbon;

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
    // Obtener el año actual
    $yearNow = Carbon::now()->year;
    // Calcular los años mínimo y máximo permitidos
    $yearMin = $yearNow - 106;
    $yearMax = $yearNow - 18;

    return Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'name2' => ['nullable', 'string', 'max:255'],
        'apellido' => ['required', 'string', 'max:255'],
        'apellido2' => ['nullable', 'string', 'max:255'],
        'numero_identidad' => ['required', 'string', 'unique:users,numero_identidad'],
        'numero_colegiacion' => ['nullable', 'string', 'unique:users,numero_colegiacion'],
        'rtn' => ['nullable', 'string', 'max:20', 'unique:users,rtn'],
        'sexo' => ['required', 'in:masculino,femenino'],
        'fecha_nacimiento' => [
            'required',
            'date',
            function ($attribute, $value, $fail) use ($yearMin, $yearMax) {
                $birthYear = Carbon::parse($value)->year;

                if ($birthYear > $yearMax) {
                    $fail('Debe tener al menos 18 años para registrarse.');
                } elseif ($birthYear < $yearMin) {
                    $fail('La fecha de nacimiento debe estar dentro del rango de 106 años.');
                }
            },
        ],
        'telefono' => ['nullable', 'string', 'max:15', 'regex:/^\d{4}-\d{4}$/'],
        'telefono_celular' => ['required', 'string', 'max:15', 'regex:/^\d{4}-\d{4}$/'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'confirmed'],
        'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/'],
        'agree_terms_and_conditions' => ['required'],
    ], [
        'numero_identidad.unique' => 'Este número de identidad ya se encuentra registrado',
        'numero_colegiacion.unique' => 'Este número de colegiación ya se encuentra registrado',
        'rtn.unique' => 'Este RTN ya se encuentra registrado',
        'email.unique' => 'Este correo electrónico ya se encuentra registrado',
        'email.confirmed' => 'La confirmación del correo electrónico no coincide',
        'password.regex' => 'La contraseña debe contener al menos un símbolo o carácter especial, como por ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
        'telefono.regex' => 'El número de teléfono fijo debe contener solo números y guiones',
        'telefono_celular.regex' => 'El número de celular debe contener solo números y guiones',
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
