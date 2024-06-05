<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
{
    $usuarios = User::latest()->paginate(5); // Cambia 5 al número deseado por página
    return view('users.index', compact('usuarios'));
}

}


