<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CapacitacioneController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('icons', 		['as' 	=> 'pages.icons', 'uses' 		=> 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', 			['as'	=> 'pages.maps', 'uses' 		=> 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as'	=> 'pages.notifications', 'uses'=> 'App\Http\Controllers\PageController@notifications']);
	Route::get('tables', 		['as' 	=> 'pages.tables', 'uses' 		=> 'App\Http\Controllers\PageController@tables']);
});

Route::group(['middleware' => 'auth'], function () {
	Route::get		('perfil', 										['as' 		=> 'profile.index', 	'uses' => 'App\Http\Controllers\ProfileController@index']);
	Route::get		('editar-perfil', 								['as' 		=> 'profile.edit', 		'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put		('profile', 									['as' 		=> 'profile.update', 	'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put		('profile/password', 							['as' 		=> 'profile.password', 	'uses' => 'App\Http\Controllers\ProfileController@password']);
	//Ruta para cambiar la contraseña
	Route::get		('cambiar-contrasenia', 'App\Http\Controllers\ProfileController@cambiarContasenia')->name('cambiar-contrasenia.contrasenia');
});

//Rutas de los modulos de la Plataforma de COHPUCP
Route::group(['middleware' => 'auth'], function () {

	//Ruta para los permisos
	Route::resource('permission', PermissionController::class);
	Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);

	//Ruta para los roles
	Route::resource('roles', RoleController::class);
	Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
	Route::get('roles/{roleId}/agregar-permisos', [RoleController::class, 'AddPermissionRole']);
	
    Route::resource('usuarios', UserController::class);
	Route::resource('cursos', CursoController::class);
	Route::resource('capacitaciones', CapacitacioneController::class);
});

