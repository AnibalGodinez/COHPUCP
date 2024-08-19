<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CapacitacioneController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PaisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\WelcomeContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardContentController;
use App\Http\Controllers\FooterContentController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\UniversidadController;

	// RUTA DE BIENVENIDA
	Route::get('/', function () {
		return view('welcome');
	});

	// RUTA DE AUTENTICACIÓN
	Auth::routes();

	// RUTA DE AUTENTICACIÓN CON VERIFICACION DE CORREO ELECTRÓNICO
	Auth::routes(['verify' => true]);
		
	// RUTA PARA MOSTRAR LA VISTA DE VERIFICACIÓN DE CORREO ELECTRÓNICO
	Route::get('/email/verify', [VerificationController::class, 'show'])
    ->middleware('auth')
    ->name('verification.notice');
	

	// RUTA PARA MANEJAR LA VERIFICACIÓN DEL CORREO ELECTRÓNICO
	Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])
    ->name('verification.verify');


	// RUTA PARA REENVIAR EL CORREO ELECTRÓNICO
	Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');


	// RUTA DE INICIO (DASHBOARD)
	Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

	// RUTAS DE RECUPERACIÓN DE CONTRASEÑA MEDIANTE PREGUNTAS DE SEGURIDAD
	Route::resource('security_questions', SecurityQuestionController::class);
	Route::get('security_questions/{question}/delete', [SecurityQuestionController::class, 'destroy'])->name('security_questions.delete');
	Route::get('opciones/recuperacion-contraseña', [SecurityQuestionController::class, 'viewOpcionRecuperacion'])->name('opcion.recuperacion');
	Route::get('preguntas-seguridad', [SecurityQuestionController::class, 'view'])->name('preguntas-seguridad.view');

	// RUTAS DE USUARIOS
	Route::group(['middleware' =>['auth']], function () {
	Route::resource('usuarios', UserController::class);
	Route::get('usuarios/{userId}/delete', [UserController::class, 'destroy']);
	Route::get('usuarios/{id}', [UserController::class, 'show'])->name('users.show');
	Route::get('ver/usuarios', 			   [UserController::class, 'verUsuarios'])->name('usuarios.ver');
	});

	// RUTAS DE PERFIL DE USUARIO
	Route::group(['middleware' =>['auth']], function () {
		Route::get('ver/perfil', [ProfileController::class, 'show'])->name('profile.show');
		Route::get('editar/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
		Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
		Route::get('cambiar-contraseña/perfil', [ProfileController::class, 'showChangePasswordForm'])->name('profile.changePassword');
		Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
		Route::put('profile/password',  ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		});

	// RUTAS DE ROLES
	Route::group(['middleware' =>['auth']], function () {
		Route::resource('permission', PermissionController::class);
		Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
		Route::get('ver/permisos', [PermissionController::class, 'verPermisos'])->name('permissions.ver');
		Route::get('/get-user-data/{identifier}', [UserController::class, 'getUserData']);
	});

	// RUTAS DE PERMISOS
	Route::group(['middleware' =>['auth']], function () {
		Route::resource('roles', RoleController::class);
		Route::get('roles/{roleId}/delete', 		  [RoleController::class, 'destroy']);
		Route::get('roles/{roleId}/agregar-permisos', [RoleController::class, 'AddPermissionRole']);
		Route::put('roles/{roleId}/agregar-permisos', [RoleController::class, 'givePermissionRole']);
		Route::get('ver/roles', 					  [RoleController::class, 'verRoles'])->name('roles.ver');
	});

	// RUTAS DE CAPACITACIONES
	Route::group(['middleware' =>['auth']], function () {
		Route::resource('capacitaciones', CapacitacioneController::class);
	});

	// RUTAS DE CODIGOS TELÉFONICOS DE LOS PAISES
	Route::group(['middleware' =>['auth']], function () {
		Route::resource('pais', PaisController::class);
		Route::get('ver/paises', [PaisController::class, 'view'])->name('pais.view');
	});

	// RUTAS DE CURSOS
	Route::group(['middleware' =>['auth']], function () {
		Route::resource('cursos', CursoController::class);
		Route::get('/ver/cursos', [CursoController::class, 'viewCursos'])->name('cursos.view');
	});

	// RUTAS DE CONTENIDO DE LA PÁGINA DE INICIO
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('welcome-content', WelcomeContentController::class);
	});

	// RUTAS DE CONTENIDO DEL DASHBOARD
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('dashboard-content', DashboardContentController::class);
	});

	// RUTAS DE CONTENIDO DEL PIE DE PÁGINA
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('footer-content', FooterContentController::class);
	});

	// RUTAS DE LOS IDIOMAS DE LOS CURSOS
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('idiomas', IdiomaController::class);
	});

	// RUTAS DE LOS CATEGORÍAS DE LOS CURSOS
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('categorias', CategoriaController::class);
	});

	// RUTAS DE INSCRIPCIONES
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('inscripciones', InscripcionController::class);
	});

	// RUTAS DE UNIVERSIDADES
	Route::group(['middleware' => ['auth']], function () {
		Route::resource('universidades', UniversidadController::class);
	});



