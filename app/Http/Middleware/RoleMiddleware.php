<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role != $role) {
            // Redirige al usuario si no tiene el rol requerido
            return redirect('home');
        }
        return $next($request);        
    }
}
