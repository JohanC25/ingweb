<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;

/*Route::get('/', [UsuarioController::class, 'loginPage'])->name('login');
Route::post('/', [UsuarioController::class, 'login'])->name('login.post');*/
//Route::get('/', [LoginController::class, 'index'])->name('login');
//Route::post('/', [UsuarioController::class, 'index'])->name('userPage');
//Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('create');
Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/usuarios', UsuarioController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('clientes', ClienteController::class);
});

