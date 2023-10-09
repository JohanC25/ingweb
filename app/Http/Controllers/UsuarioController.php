<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {  // Check if the method is POST
            $request->validate([
                'nombre_usuario' => 'required',
                'contrasenia' => 'required',
            ]);
    
            $credentials = $request->only('nombre_usuario', 'contrasenia');
    
            $user = Usuario::where('nombre_usuario', $credentials['nombre_usuario'])->first();
    
            if ($user && Hash::check($credentials['contrasenia'], $user->contrasenia)) {
                Auth::login($user);
                return route('usuarios.index');
                //return redirect()->intended('usuarios.index');
            } else {
                return back()->withErrors([
                    'login_error' => 'The provided credentials do not match our records.',
                ]);
            }
        }

        return view('login');
    }

}
