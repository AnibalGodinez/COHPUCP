<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        $loginType = request()->input('login_type');
        $field = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'numero_colegiacion';
        request()->merge([$field => $loginType]);

        return $field;
    }

    protected function attemptLogin(Request $request)
    {
    $credentials = $this->credentials($request);

    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        if ($user->isActive()) {
            return true;
        }

        Auth::logout();
        // Aquí agregamos el mensaje de error personalizado
        throw ValidationException::withMessages([
            'estado' => 'Tu cuenta está inactiva, favor comunícate con el administrador de la página.'
        ]);
    }

    return false;
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        return $this->authenticated($request, Auth::user())
                ?: redirect()->intended($this->redirectPath());
    }

     public function login(Request $request)
    {
        // Validar los campos de entrada
        $request->validate([
            'login_type' => 'required|string',
            'password' => 'required|string',
        ]);

        // Obtener el usuario por el correo electrónico
        $user = User::where('email', $request->login_type)->first();

        // Si el usuario no existe, mostrar mensaje de error del correo
        if (!$user) {
            return back()->withErrors(['login_type' => 'El correo electrónico no está registrado.'])->withInput($request->only('login_type'));
        }

        // Si la contraseña es incorrecta, mostrar mensaje de error
        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors(['password' => 'La contraseña es incorrecta.'])->withInput($request->only('login_type'));
        }

        // Intentar iniciar sesión con las credenciales proporcionadas
        if (Auth::attempt(['email' => $request->login_type, 'password' => $request->password])) {
            // Redirigir a la página de inicio
            return redirect()->intended('home');
        }
    }

    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'login_type' => [trans('auth.failed')],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
