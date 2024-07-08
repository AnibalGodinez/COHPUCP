<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CapacitacioneController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SecurityQuestionController;

	// RUTA DE BIENVENIDA
	Route::get('/', function () {
		return view('welcome');
	});

	// RUTA DE AUTENTICACIÓN
	Auth::routes();

	// RUTA DE INICIO (DASHBOARD)
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

	// RUTAS DE RECUPERACIÓN DE CONTRASEÑA MEDIANTE PREGUNTAS DE SEGURIDAD
	Route::resource('security_questions', SecurityQuestionController::class);
	Route::get('security_questions/{question}/delete', [SecurityQuestionController::class, 'destroy'])->name('security_questions.delete');
	Route::get('opcion-recuperacionContrasenia', [SecurityQuestionController::class, 'viewOpcionRecuperacion'])->name('opcion.recuperacion');


	// RUTAS DE USUARIOS
	Route::group(['middleware' =>[ 'auth']], function () {
	Route::resource('usuarios', UserController::class);
	Route::get('usuarios/{userId}/delete', [UserController::class, 'destroy']);
	Route::get('ver-usuarios', 			   [UserController::class, 'verUsuarios'])->name('usuarios.ver');
	});

	// RUTAS DE PERFIL DE USUARIO
	Route::group(['middleware' =>[ 'auth', 'role:Administrador|Agremiado|Invitado']], function () {
		Route::get('perfil', 			['as' => 'profile.index', 'uses' => 'App\Http\Controllers\ProfileController@index']);
		Route::get('editar-perfil', 	['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
		Route::put('profile', 			['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
		Route::put('profile/password',  ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		Route::get('cambiar-contrasenia', 'App\Http\Controllers\ProfileController@cambiarContasenia')->name('cambiar-contrasenia.contrasenia');
	});

	// RUTAS DE ROLES
	Route::group(['middleware' =>[ 'auth']], function () {
		Route::resource('permission', PermissionController::class);
		Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
		Route::get('ver-permisos', [PermissionController::class, 'verPermisos'])->name('permissions.ver');
	});

	// RUTAS DE PERMISOS
	Route::group(['middleware' =>[ 'auth']], function () {
		Route::resource('roles', RoleController::class);
		Route::get('roles/{roleId}/delete', 		  [RoleController::class, 'destroy']);
		Route::get('roles/{roleId}/agregar-permisos', [RoleController::class, 'AddPermissionRole']);
		Route::put('roles/{roleId}/agregar-permisos', [RoleController::class, 'givePermissionRole']);
		Route::get('ver-roles', 					  [RoleController::class, 'verRoles'])->name('roles.ver');
	});

	// RUTAS DE CAPACITACIONES
	Route::group(['middleware' =>[ 'auth', 'role:Administrador|Agremiado|Invitado']], function () {
		Route::resource('capacitaciones', CapacitacioneController::class);
	});

	// RUTAS DE CURSOS
	Route::group(['middleware' =>[ 'auth', 'role:Administrador|Agremiado|Invitado']], function () {
		Route::resource('cursos', CursoController::class);
	});
