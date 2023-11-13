<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:client-list|client-create|client-edit|client-delete', ['only' => ['index','show']]);
         $this->middleware('permission:client-create', ['only' => ['create','store']]);
         $this->middleware('permission:client-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:client-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $clientes = Cliente::latest()->paginate(5);
        return view('clientes.index',compact('clientes'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'celular' => 'required|max:255',
            'direccion' => 'nullable',
        ]);
    
        Cliente::create($request->all());

        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente): View
    {
        return view('clientes.show',compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente): View
    {
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Actualiza un cliente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Cliente $cliente): RedirectResponse
    {
         request()->validate([
            'nombre' => 'required|max:255',
            'apellido' => 'required|max:255',
            'correo' => 'required|email|unique:clientes,correo,'.$cliente->id,
            'celular' => 'required|max:255',
            'direccion' => 'nullable',
        ]);
    
        $cliente->update($request->all());
    
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente actualizado con éxito.');
    }

    /**
     * Elimina un cliente de la base de datos.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente): RedirectResponse
    {
        $cliente->delete();
    
        return redirect()->route('clientes.index')
                         ->with('success', 'Cliente eliminado con éxito.');
    }
}