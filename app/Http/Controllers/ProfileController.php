<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Pais;
use App\Models\Sexo;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:ver perfil', ['only' => ['show']]);
        $this->middleware('permission:actualizar perfil', ['only' => ['update', 'edit']]);
        $this->middleware('permission:cambiar contraseña', ['only' => ['showChangePasswordForm', 'password']]);
 
    }

        public function show()
    {
        $user = Auth::user()->load('pais');
        $age = $user->fecha_nacimiento ? \Carbon\Carbon::parse($user->fecha_nacimiento)->age : null;
        return view('profile.view', compact('user', 'age'));
    }

    public function edit()
    {
        $user = Auth::user();
        $paises = Pais::all();
        $sexos = Sexo::all(); // Asegúrate de que estás recuperando todos los sexos
    
        return view('profile.edit', compact('user', 'paises', 'sexos'));
    }

    protected function validateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|unique:users,numero_identidad',
            'numero_colegiacion' => 'nullable|string|unique:users,numero_colegiacion',
            'rtn' => 'nullable|string|max:20|unique:users,rtn',
            'sexo_id' => 'nullable|exists:sexos,id',
            'fecha_nacimiento' => 'required|date',
            'pais_id' => 'nullable|exists:pais,id',
            'telefono' => 'nullable|string|max:40|regex:/^[\d-]*$/',
            'telefono_celular' => 'required|string|max:40|regex:/^[\d-]*$/',
            'email' => 'required|email|max:255|unique:users,email',
            'email_confirmation' => 'required|email|same:email',
            'password' => 'required|string|min:8|max:20|confirmed|regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'bio' => 'nullable|string|max:1000',
        ], [
            // campos únicos
            'numero_identidad.unique' => 'El número de identidad ya está en uso',
            'numero_colegiacion.unique' => 'El número de colegiación ya está en uso',
            'rtn.unique' => 'El RTN ya está en uso',
            'email.unique' => 'El correo electrónico ya está en uso',
            // cambio de contraseña
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o carácter especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
            'old_password' => 'El campo de contraseña actual no coincide con su contraseña',
            // teléfonos
            'telefono.regex' => 'El número de teléfono fijo sólo debe contener números y guiones',
            'telefono_celular.regex' => 'El número de celular sólo debe contener números y guiones',
            // foto de perfil
            'profile_image.image' => 'El archivo debe ser una imagen.',
            'profile_image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico, avif',
            'profile_image.max' => 'La imagen no debe exceder los 10MB.',
            // enlaces de las redes sociales
            'facebook_link.url' => 'El enlace de Facebook debe ser una URL válida.',
            'instagram_link.url' => 'El enlace de Twitter debe ser una URL válida.',
            'linkedin_link.url' => 'El enlace de Twitter debe ser una URL válida.',
            'twitter_link.url' => 'El enlace de Twitter debe ser una URL válida.',
            // reseña biográfica
            'bio.max' => 'La biografía no debe exceder los 1000 caracteres.',
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'name2' => 'nullable|string|max:255',
            'apellido' => 'required|string|max:255',
            'apellido2' => 'nullable|string|max:255',
            'numero_identidad' => 'required|string|unique:users,numero_identidad,' . $user->id,
            'numero_colegiacion' => 'nullable|string|unique:users,numero_colegiacion,' . $user->id,
            'rtn' => 'nullable|string|max:20|unique:users,rtn,' . $user->id,
            'sexo_id' => 'nullable|exists:sexos,id',
            'fecha_nacimiento' => 'required|date',
            'pais_id' => 'nullable|exists:pais,id',
            'telefono' => 'nullable|string|max:40|regex:/^[\d-]*$/',
            'telefono_celular' => 'required|string|max:40|regex:/^[\d-]*$/',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'email_confirmation' => 'required|email|same:email',
            'password' => 'required|string|min:8|max:20|confirmed|regex:/^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,tif,ico,avif|max:10240',
            'facebook_link' => 'nullable|url',
            'instagram_link' => 'nullable|url',
            'linkedin_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'bio' => 'nullable|string|max:1000',
        ], [
            // campos únicos
            'numero_identidad.unique' => 'El número de identidad ya está en uso',
            'numero_colegiacion.unique' => 'El número de colegiación ya está en uso',
            'rtn.unique' => 'El RTN ya está en uso',
            'email.unique' => 'El correo electrónico ya está en uso',
            // cambio de contraseña
            'password.required' => 'El campo contraseña es obligatorio',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'password.confirmed' => 'La confirmación de la contraseña no coincide',
            'password.regex' => 'La contraseña debe contener al menos un símbolo o carácter especial, como por Ejemplo: ^?=.,[]{}()!@#$%^&*"|<:>\ ',
            'old_password' => 'El campo de contraseña actual no coincide con su contraseña',
            // teléfonos
            'telefono.regex' => 'El número de teléfono fijo sólo debe contener números y guiones',
            'telefono_celular.regex' => 'El número de celular sólo debe contener números y guiones',
            // foto de perfil
            'profile_image.image' => 'El archivo debe ser una imagen.',
            'profile_image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg, webp, bmp, tiff, tif, ico, avif',
            'profile_image.max' => 'La imagen no debe exceder los 10MB.',
            // enlaces de las redes sociales
            'facebook_link.url' => 'El enlace de Facebook debe ser una URL válida.',
            'instagram_link.url' => 'El enlace de Instagram debe ser una URL válida.',
            'linkedin_link.url' => 'El enlace de Linkendin debe ser una URL válida.',
            'twitter_link.url' => 'El enlace de X debe ser una URL válida.',
            // reseña biográfica
            'bio.max' => 'La biografía no debe exceder los 1000 caracteres.',
        ]);

        $user->update($request->only([
            'name',
            'name2',
            'apellido',
            'apellido2',
            'numero_identidad',
            'numero_colegiacion',
            'rtn',
            'sexo_id',
            'fecha_nacimiento',
            'telefono',
            'telefono_celular',
            'email',
            'facebook_link',
            'instagram_link',
            'linkedin_link',
            'twitter_link',
            'bio',
            'pais_id',
        ]));

        if ($request->hasFile('profile_image')) {
            $path = $request->file('profile_image')->store('profile_images');
            $user->profile_image = $path;
            $user->save();
        }

        return redirect()->route('profile.show')->with('success', '¡Perfil actualizado con éxito!');
    }

    public function showChangePasswordForm()
    {
        return view('profile.cambiar-contrasenia');
    }

    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withPasswordStatus(__('¡Tu contraseña se ha cambiado con éxito!'));
    }

}