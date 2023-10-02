<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {
        return view('usuarios.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|unique:usuarios|max:255',
            'contrasenia' => 'required|min:8',
            'correo' => 'required|correo|unique:usuarios',
            'nombre' => 'required|max:255',
            'apellido' => 'nullable|max:255',
        ]);

        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->input('nombre_usuario');
        $usuario->contrasenia = $request->input('contrasenia');
        $usuario->correo = $request->input('correo');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');

        $usuario->save();

        return view("usuarios.message", ['msg' => "Registro exitoso"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
