<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_usuario' => 'required|max:255',
            'contrasenia' => 'required|min:8',
            'correo' => 'required|max:150',
            'nombre' => 'required|max:255',
            'apellido' => 'nullable|max:255',
        ]);

        $usuario = new Usuario();
        $usuario->nombre_usuario = $request->input('nombre_usuario');
        $usuario->contrasenia = $request->input('contrasenia');
        //$usuario->contrasenia = bcrypt($request->input('contrasenia'));
        $usuario->correo = $request->input('correo');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente!');

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
    public function edit($id)
    {
        $usuario = Usuario::find($id);

        return view('usuarios.edit', ['usuario' => $usuario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_usuario' => 'required|max:255',
            'contrasenia' => 'required|min:8',
            'correo' => 'required|max:150',
            'nombre' => 'required|max:255',
            'apellido' => 'nullable|max:255',
        ]);

        $usuario = Usuario::find($id);
        $usuario->nombre_usuario = $request->input('nombre_usuario');
        $usuario->contrasenia = $request->input('contrasenia');
        $usuario->correo = $request->input('correo');
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');

        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        $usuario->delete();

        return redirect("usuarios");
    }
}
