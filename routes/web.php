<?php


use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\EntecoformadoresController;
use App\Http\Controllers\CentrosdeformacionController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\EpsController;
use App\Models\instructores;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('index.php');
});

Route::get('/rolesadministrativos', [RolesadministrativosController::class, 'index']) 
    ->name('rolesadministrativos.index');

    Route::get('/eps', [EpsController::class, 'index']) 
    ->name('eps.index');

    Route::get('/aprendices', [AprendicesController::class, 'index']) 
    ->name('aprendices.index');

    Route::get('/centrosdeformacion', [CentrosdeformacionController::class, 'index']) 
    ->name('centrosdeformacion.index');

    Route::get('/entecoformadores', [EntecoformadoresController::class, 'index']) 
    ->name('entecoformadores.index');

    Route::get('/fichasdecaracterizacion', [FichasdecaracterizacionController::class, 'index']) 
    ->name('fichasdecaracterizacion.index');

    Route::get('/instructores', [InstructoresController::class, 'index']) 
    ->name('instructores.index');

    Route::get('/programasdeformacion', [ProgramasdeformacionController::class, 'index']) 
    ->name('programasdeformacion.index');

    Route::get('/regionales', [RegionalesController::class, 'index']) 
    ->name('regionales.index');

    Route::get('/tiposdocumentos', [TiposdocumentosController::class, 'index']) 
    ->name('tiposdocumentos.index');


Route::resource('regionales', RegionalesController::class);

Route::resource('eps', EpsController::class);

Route::resource('tiposdocumentos', TiposdocumentosController::class);

Route::resource('programasdeformacion', ProgramasdeformacionController::class);

Route::resource('instructores', InstructoresController::class);

Route::resource('rolesadministrativos', RolesadministrativosController::class);

Route::resource('centrosdeformacion', CentrosdeformacionController::class);

Route::resource('fichasdecaracterizacion', FichasdecaracterizacionController::class);

Route::resource('entecoformadores', EntecoformadoresController::class);

Route::resource('aprendices', AprendicesController::class);

Route::get('/archivos', [ArchivoController::class, 'index'])->name('archivos.index');
Route::post('/archivos', [ArchivoController::class, 'store'])->name('archivos.store');


Route::get('/', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
 
Route::get('/index', function () {
    return view('index');
});
