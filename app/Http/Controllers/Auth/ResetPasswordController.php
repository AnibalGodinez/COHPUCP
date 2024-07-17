<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Validate the request for resetting the password.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateReset(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                function ($attribute, $value, $fail) {
                    if (!User::where('email', $value)->exists()) {
                        $fail('El correo electrónico no existe en nuestra base de datos.');
                    }
                },
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/', 
                'regex:/[0-9]/', 
                'regex:/[@$!%*#?&]/',
                'confirmed',
            ],
        ]);
    }
}
