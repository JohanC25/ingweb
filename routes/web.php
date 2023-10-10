<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\DB;

//DB::get
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::view('/login', "login")->name('login');
Route::view('/registro', "usuarios.create")->name('registro');
Route::view('/index', "usuarios.index")->middleware('auth')->name('index');

Route::post('/validar-registro', [UsuarioController::class, 'index'])->name('validar-registro');
Route::post('/iniciar-sesion', [UsuarioController::class, 'login'])->name('iniciar-sesion');
Route::get('/logout', [UsuarioController::class, 'logout'])->name('logout');

/*Route::resource('/usuarios', UsuarioController::class);
Route::get('/login', [UsuarioController::class, 'login']);
Route::post('/', [UsuarioController::class, 'login']);*/
//Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');
/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('usuarios', [UsuarioController::class, 'index']);
//Route::get('usuarios/create', [UsuarioController::class, 'index']);
//Route::get('/', [LoginController::class, 'index']);
//Route::resource('/', LoginController::class);