<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;

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

Route::resource('/usuarios', UsuarioController::class);
Route::get('/', [UsuarioController::class, 'login']);
Route::post('/', [UsuarioController::class, 'login']);
//Route::get('/usuarios', 'UsuarioController@index')->name('usuarios.index');


/*Route::get('/', function () {
    return view('welcome');
});*/
//Route::get('usuarios', [UsuarioController::class, 'index']);
//Route::get('usuarios/create', [UsuarioController::class, 'index']);
//Route::get('/', [LoginController::class, 'index']);
//Route::resource('/', LoginController::class);