<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
            return false;
        }

        return false;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => [trans('auth.email')],
            ]);
        }

        if (!$user->isActive()) {
            throw ValidationException::withMessages([
                'estado' => [trans('auth.inactive')],
            ]);
        }

        throw ValidationException::withMessages([
            'password' => [trans('auth.password')],
        ]);
    }
}
