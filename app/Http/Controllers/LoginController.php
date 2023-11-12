<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $usuarios = User::all();
        return url('/usuarios', ['usuarios' => $usuarios]);
    }
}