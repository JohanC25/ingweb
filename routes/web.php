<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class,
    'clientes' => ClienteController::class,
    'equipos' => EquipoController::class,
]);

Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes');

Route::get('/reportes/search', [ReporteController::class, 'search'])->name('reportes.search');

Route::get('/reportes/pdf', [ReporteController::class, 'downloadPdf'])->name('reportes.pdf');
