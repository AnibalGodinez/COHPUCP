<?php

use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFUsuariosController;
use App\Http\Controllers\PaisController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SexoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\IdiomaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\CapacitacioneController;
use App\Http\Controllers\FooterContentController;
use App\Http\Controllers\PDFInscripcionController;
use App\Http\Controllers\WelcomeContentController;
use App\Http\Controllers\DashboardContentController;
use App\Http\Controllers\InscripcionFirmaController;
use App\Http\Controllers\SecurityQuestionController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\NumeroColegiacionController;

    // RUTA DE BIENVENIDA
    Route::get('/', function () {
        return view('welcome');
    });

    // RUTAS DE AUTENTICACIÓN CON VERIFICACIÓN DE CORREO ELECTRÓNICO
    Auth::routes(['verify' => true]);

    // RUTAS DE VERIFICACIÓN DE CORREO ELECTRÓNICO
    Route::get('/email/verify', [VerificationController::class, 'show'])
        ->middleware('auth')
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.send');

    // RUTA DE INICIO (DASHBOARD)
    Route::group(['middleware' => ['auth', 'verified']], function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // RUTAS DE USUARIOS
    Route::resource('usuarios', UserController::class);
    Route::get('usuarios/{userId}/delete', [UserController::class, 'destroy']);
    Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('ver/usuarios', [UserController::class, 'verUsuarios'])->name('usuarios.ver');
    Route::get('/previsualizacion/pdf/usuario/{id}', [PDFUsuariosController::class, 'preview'])->name('user.pdf.preview');
    Route::get('/descargar/pdf/usuario/{id}', [PDFUsuariosController::class, 'download'])->name('user.pdf.download');
    Route::get('/get-user-data/{identifier}', [UserController::class, 'getUserData']);
    // RUTAS PARA DESCARGAR EXCEL DE LOS USUARIOS
    Route::get('usuarios/export/excel', function () {
        return Excel::download(new UsersExport, 'usuarios.xlsx');
    })->name('usuarios.export.excel');

    // RUTAS DE PERFIL DE USUARIO
    Route::get('ver/perfil', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('editar/perfil', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('cambiar-contraseña/perfil', [ProfileController::class, 'showChangePasswordForm'])->name('profile.changePassword');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    // RUTAS DE ROLES
    Route::resource('permission', PermissionController::class);
    Route::get('permission/{permissionId}/delete', [PermissionController::class, 'destroy']);
    Route::get('ver/permisos', [PermissionController::class, 'verPermisos'])->name('permissions.ver');

    // RUTAS DE PERMISOS
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/agregar-permisos', [RoleController::class, 'AddPermissionRole']);
    Route::put('roles/{roleId}/agregar-permisos', [RoleController::class, 'givePermissionRole']);
    Route::get('ver/roles', [RoleController::class, 'verRoles'])->name('roles.ver');

    // RUTAS DE CAPACITACIONES
    Route::resource('capacitaciones', CapacitacioneController::class);

    // RUTAS DE CÓDIGOS TELEFÓNICOS DE LOS PAÍSES
    Route::resource('pais', PaisController::class);
    Route::get('ver/paises', [PaisController::class, 'view'])->name('pais.view');

    // RUTAS DE CURSOS
    Route::resource('cursos', CursoController::class);
    Route::get('/ver/cursos', [CursoController::class, 'viewCursos'])->name('cursos.view');

    // RUTAS DE CONTENIDO DE LA PÁGINA DE INICIO
    Route::resource('welcome-content', WelcomeContentController::class);

    // RUTAS DE CONTENIDO DEL DASHBOARD
    Route::resource('dashboard-content', DashboardContentController::class);

    // RUTAS DE CONTENIDO DEL PIE DE PÁGINA
    Route::resource('footer-content', FooterContentController::class);

    // RUTAS DE LOS IDIOMAS DE LOS CURSOS
    Route::resource('idiomas', IdiomaController::class);

    // RUTAS DE LAS CATEGORÍAS DE LOS CURSOS
    Route::resource('categorias', CategoriaController::class);

    // RUTAS DE INSCRIPCIONES
    Route::resource('inscripciones', InscripcionController::class);
    Route::get('/previsualizacion/pdf/inscripcion/{id}', [PDFInscripcionController::class, 'preview'])->name('inscripcion.pdf.preview');
    Route::get('/descargar/pdf/inscripcion/{id}', [PDFInscripcionController::class, 'download'])->name('inscripcion.pdf.download');

    // RUTAS DE INSCRIPCIONES DE FIRMAS
    Route::resource('inscripcion_firmas', InscripcionFirmaController::class);

    // RUTAS DE UNIVERSIDADES
    Route::resource('universidades', UniversidadController::class);

    // RUTAS DE SEXOS
    Route::resource('sexos', SexoController::class);

    // RUTAS DE NÚMERO DE COLEGIACIÓN
    Route::resource('numero_colegiacion', NumeroColegiacionController::class);
});

// RUTAS DE RECUPERACIÓN DE CONTRASEÑA MEDIANTE PREGUNTAS DE SEGURIDAD
Route::resource('security_questions', SecurityQuestionController::class);
Route::get('security_questions/{question}/delete', [SecurityQuestionController::class, 'destroy'])->name('security_questions.delete');
Route::get('opciones/recuperacion-contraseña', [SecurityQuestionController::class, 'viewOpcionRecuperacion'])->name('opcion.recuperacion');
Route::get('preguntas-seguridad', [SecurityQuestionController::class, 'view'])->name('preguntas-seguridad.view');
