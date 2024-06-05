<?php

use App\Http\Controllers\PlataformaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguridadController;
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

// Rutas para la sección de seguridad
Route::group(['middleware' => 'auth'], function () {
    Route::get('usuarios', 			['as'   => 'seguridad.usuarios', 		'uses' => 'App\Http\Controllers\SeguridadController@usuarios']);
    Route::get('roles-permisos', 	['as'   => 'seguridad.roles_permisos', 	'uses' => 'App\Http\Controllers\SeguridadController@rolesPermisos']);
    Route::get('gestion-roles', 	['as'   => 'seguridad.gestion_roles', 	'uses' => 'App\Http\Controllers\SeguridadController@gestionRoles']);
});

//Rutas para la sección de Plataformas tecnológicas
Route::group(['middleware' => 'auth'], function () {
    Route::get('cursos', 			['as'   => 'plataforma.cursos', 		'uses' => 'App\Http\Controllers\PlataformaController@cursos']);
    Route::get('capacitaciones', 	['as'   => 'plataforma.capacitaciones', 'uses' => 'App\Http\Controllers\PlataformaController@capacitaciones']);
    Route::get('agendas', 			['as'   => 'plataforma.agendas', 		'uses' => 'App\Http\Controllers\PlataformaController@agendas']);
	Route::get('gestiones', 		['as'   => 'plataforma.gestiones', 		'uses' => 'App\Http\Controllers\PlataformaController@gestiones']);
	Route::get('consultas', 		['as'   => 'plataforma.consultas', 		'uses' => 'App\Http\Controllers\PlataformaController@consultas']);
});

Route::group(['middleware' 				=> 'auth'], function () {
	Route::get('icons', 		['as' 	=> 'pages.icons', 'uses' 		=> 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', 			['as'	=> 'pages.maps', 'uses' 		=> 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as'	=> 'pages.notifications', 'uses'=> 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', 			['as' 	=> 'pages.rtl', 'uses'			=> 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', 		['as' 	=> 'pages.tables', 'uses' 		=> 'App\Http\Controllers\PageController@tables']);
	Route::get('typography',	['as' 	=> 'pages.typography', 'uses' 	=> 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', 		['as' 	=> 'pages.upgrade', 'uses' 		=> 'App\Http\Controllers\PageController@upgrade']);

});

Route::group(['middleware' => 'auth'], function () {
	Route::resource	('user', 'App\Http\Controllers\UserController', ['except' 	=> ['show']]);
	Route::get		('profile', 									['as' 		=> 'profile.edit', 		'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put		('profile', 									['as' 		=> 'profile.update', 	'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put		('profile/password', 							['as' 		=> 'profile.password', 	'uses' => 'App\Http\Controllers\ProfileController@password']);
});

