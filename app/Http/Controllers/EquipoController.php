<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class EquipoController extends Controller
{
    /**
     * Instantiate a new EquipoController instance.
     */
    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-equipo|edit-equipo|delete-equipo', ['only' => ['index','show']]);
       $this->middleware('permission:create-equipo', ['only' => ['create','store']]);
       $this->middleware('permission:edit-equipo', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-equipo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('equipos.index', [
            'equipos' => Equipo::latest()->paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEquipoRequest $request): RedirectResponse
    {
        Equipo::create($request->all());
        return redirect()->route('equipos.index')
                ->withSuccess('New equipo is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Equipo $equipo): View
    {
        return view('equipos.show', [
            'equipo' => $equipo
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Equipo $equipo): View
    {
        return view('equipos.edit', [
            'equipo' => $equipo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipoRequest $request, Equipo $equipo): RedirectResponse
    {
        $equipo->update($request->all());
        return redirect()->back()
                ->withSuccess('Equipo is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Equipo $equipo): RedirectResponse
    {
        $equipo->delete();
        return redirect()->route('equipos.index')
                ->withSuccess('Equipo is deleted successfully.');
    }
}