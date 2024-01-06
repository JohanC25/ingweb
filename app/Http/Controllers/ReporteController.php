<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Equipo;
use Barryvdh\DomPDF;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Log;


class ReporteController extends Controller
{
    public function index()
    {

        $fechaInicio = now()->subDays(7)->format('Y-m-d');
        $fechaFin = now()->format('Y-m-d');

        $clientes = Cliente::whereHas('equipos', function ($query) use ($fechaInicio, $fechaFin) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
        })->with('equipos')->get();

        return view('reportes.index', compact('clientes'));
    }

    public function search(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', now()->subDays(7)->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', now()->format('Y-m-d'));
        $soloMultas = $request->has('solo_multas');

        $clientes = Cliente::whereHas('equipos', function ($query) use ($fechaInicio, $fechaFin, $soloMultas) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
            if ($soloMultas) {
                $query->where('multa', '>', 0);
            }
        })->with(['equipos' => function ($query) use ($fechaInicio, $fechaFin, $soloMultas) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
            if ($soloMultas) {
                $query->where('multa', '>', 0);
            }
        }])->get();

        return view('reportes.index', compact('clientes'));
    }


    public function downloadPdf(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio', now()->subDays(7)->format('Y-m-d'));
        $fechaFin = $request->input('fecha_fin', now()->format('Y-m-d'));
        $soloMultas = $request->has('solo_multas');

        $clientes = Cliente::whereHas('equipos', function ($query) use ($fechaInicio, $fechaFin, $soloMultas) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
            if ($soloMultas) {
                $query->where('multa', '>', 0);
            }
        })->with(['equipos' => function ($query) use ($fechaInicio, $fechaFin, $soloMultas) {
            $query->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin]);
            if ($soloMultas) {
                $query->where('multa', '>', 0);
            }
        }])->get();

        $gananciaTotal = 0;
        $gananciaSinMultas = 0;
        $totalMultas = 0;

        foreach ($clientes as $cliente) {
            foreach ($cliente->equipos as $equipo) {
                $gananciaTotal += $equipo->monto_pagar;
                $gananciaSinMultas += $equipo->multa ? $equipo->monto_pagar - $equipo->multa : $equipo->monto_pagar;
                $totalMultas += $equipo->multa ?? 0;
            }
        }

        $porcentajeGananciaSinMultas = $gananciaTotal > 0 ? ($gananciaSinMultas / $gananciaTotal) * 100 : 0;
        $porcentajeTotalMultas = $gananciaTotal > 0 ? ($totalMultas / $gananciaTotal) * 100 : 0;

        $conteoTiposEquipo = Equipo::selectRaw('tipo_equipo, count(*) as cantidad')
            ->whereBetween('fecha_recepcion', [$fechaInicio, $fechaFin])
            ->groupBy('tipo_equipo')
            ->get();

        $pdf = PDF::loadView('reportes.pdf', compact
            (
                'clientes',
                'gananciaTotal',
                'gananciaSinMultas',
                'totalMultas',
                'porcentajeGananciaSinMultas',
                'porcentajeTotalMultas',
                'fechaInicio',
                'fechaFin',
                'conteoTiposEquipo'
            ));

        // Devuelve el PDF para su descarga
        return $pdf->download('reporte-clientes-equipos.pdf');
    }
}
