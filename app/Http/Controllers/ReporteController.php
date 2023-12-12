<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Equipo;

class ReporteController extends Controller
{
    /*public function index()
    {
        //$clientes = Cliente::with(['equipos'])->get();

        $clientes = Cliente::all();

        $equipos = Equipo::all();

        return view('reportes.index', compact('clientes', 'equipos'));
    }*/

    public function index()
    {
        $clientes = Cliente::with('equipos')->get();

        return view('reportes.index', compact('clientes'));
    }

    private function calcularMontoTotal($equipo)
    {
        $montoTotal = 0;
        if ($equipo->multa) {
            $montoTotal += $equipo->multa;
        }

        return $montoTotal;
    }

    public function search(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');
        $today = now();

        $clientes = Cliente::whereHas('equipos', function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
        })->with('equipos')->get();

        foreach ($clientes as $cliente) {
            foreach ($cliente->equipos as $equipo) {
                if (!$equipo->equipo_retirado && $today->gt($equipo->fecha_entrega)) {
                    $equipo->multa = $this->calcularMontoTotal($equipo);
                }
            }
        }

        return view('reportes.index', compact('clientes'));
    }
}
