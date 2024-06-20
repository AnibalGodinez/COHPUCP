<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CapacitacioneController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

	// RUTA DE BIENVENIDA
	Route::get('/', function () {
		return view('welcome');
	});

	// RUTA DE AUTENTICACIÓN
	Auth::routes();

	// RUTA DE INICIO (DASHBOARD)
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
		->name('home')
		->middleware('auth');

	// RUTAS QUE SOLO MUESTRAN VISTAS
	Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', 'App\Http\Controllers\PageController@icons')->name('pages.icons');
	});

	// RUTAS DE MANTENIMIENTO
	Route::group(['middleware' => 'auth'], function () {
		// Rutas de permisos
		Route::resource('permission', PermissionController::class);
		Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
		Route::get('ver-permisos', [PermissionController::class, 'verPermisos'])->name('permissions.ver');

		// Rutas de roles
		Route::resource('roles', RoleController::class);
		Route::get('roles/{roleId}/delete', 		  [RoleController::class, 'destroy']);
		Route::get('roles/{roleId}/agregar-permisos', [RoleController::class, 'AddPermissionRole']);
		Route::put('roles/{roleId}/agregar-permisos', [RoleController::class, 'givePermissionRole']);
		Route::get('ver-roles', 					  [RoleController::class, 'verRoles'])->name('roles.ver');

		// Rutas de usuarios
		Route::resource('usuarios', UserController::class);
		Route::get('usuarios/{userId}/delete', [UserController::class, 'destroy']);
		Route::get('ver-usuarios', 			   [UserController::class, 'verUsuarios'])->name('usuarios.ver');

		// Rutas de perfil
		Route::get('perfil', 			['as' => 'profile.index', 'uses' => 'App\Http\Controllers\ProfileController@index']);
		Route::get('editar-perfil', 	['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
		Route::put('profile', 			['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
		Route::put('profile/password',  ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		Route::get('cambiar-contrasenia', 'App\Http\Controllers\ProfileController@cambiarContasenia')->name('cambiar-contrasenia.contrasenia');

		// Rutas de cursos
		Route::resource('cursos', CursoController::class);

		// Rutas de capacitaciones
		Route::resource('capacitaciones', CapacitacioneController::class);
	});
