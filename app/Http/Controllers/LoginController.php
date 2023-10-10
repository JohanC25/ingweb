<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function userPage()
    {
        $usuarios = Usuario::all();
        return url('/usuarios', ['usuarios' => $usuarios]);
    }
}