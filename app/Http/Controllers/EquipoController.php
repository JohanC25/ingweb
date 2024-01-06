<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Models\Cliente;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

//use Illuminate\Support\Facades\Log;

class EquipoController extends Controller
{
    /**
     * Instantiate a new EquipoController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-equipo|edit-equipo|delete-equipo', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-equipo', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-equipo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-equipo', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('equipos.index', [
            'equipos' => Equipo::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $clientes = Cliente::all(); // Obtener todos los clientes
        return view('equipos.create', compact('clientes'));
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
        $equipo->load('cliente');
        return view('equipos.edit', [
            'equipo' => $equipo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEquipoRequest $request, Equipo $equipo): RedirectResponse
    {
        // Convertir la entrada a una instancia de Carbon.
        $fechaRetiro = \Carbon\Carbon::createFromFormat('Y-m-d', $request->input('fecha_retiro'));
        $fechaEntrega = \Carbon\Carbon::createFromFormat('Y-m-d', $equipo->fecha_entrega);

        // Comprobar si la fecha de retiro es después de la fecha de entrega.
        if ($fechaRetiro->isAfter($fechaEntrega)) {
            // Calcular la multa como el 25% del monto a pagar.
            $multa = $equipo->monto_pagar * 0.25;

            //Log::info("Multa calculada: {$multa}");

            // Establecer la multa en el equipo.
            $equipo->multa = $multa;

            // Actualizar el monto a pagar si se aplica la multa.
            //$equipo->monto_pagar += $multa;
        } else {
            // Si no hay multa, asegurarse de que el valor de multa sea cero.
            $equipo->multa = 0;
        }

        // Actualizar el equipo con los datos del formulario.
        $equipo->update($request->all());

        // Redirigir a la página anterior con un mensaje de éxito.
        return redirect()->back()
            ->withSuccess('Equipo actualizado correctamente.');
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
