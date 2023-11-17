<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
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
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-cliente|edit-cliente|delete-cliente', ['only' => ['index','show']]);
       $this->middleware('permission:create-cliente', ['only' => ['create','store']]);
       $this->middleware('permission:edit-cliente', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-cliente', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('clientes.index', [
            'clientes' => Cliente::latest()->paginate(3),
        ]);
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
    public function store(StoreClienteRequest $request): RedirectResponse
    {
        Cliente::create($request->all());
        return redirect()->route('clientes.create')
                ->withSuccess('New client is added successfully.');
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

     public function update(UpdateClienteRequest $request, Cliente $cliente): RedirectResponse
     {
         $cliente->update($request->all());
         return redirect()->back()
                 ->withSuccess('Client is updated successfully.');
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