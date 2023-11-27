@extends('layouts.app')
<link href="/resources/css/tablas.css" rel="stylesheet">

@section('content')
    <h1>Reporte de Clientes y Equipos</h1>
    <table class="report-table">
        <thead>
            <tr>
                <th>Nombre Cliente</th>
                <th>Equipo No Retirado</th>
                <th>Monto de la Multa</th>
                <th>Monto por Reparación</th>
                <th>Monto Total</th>
                <th>Fecha de Recepción</th>
                <th>Fecha de Entrega</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                @foreach ($cliente->equipos as $equipo)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $equipo->nombre }}</td>
                        <td>{{ $equipo->monto_multa }}</td> {{-- Ajusta estos campos según tus datos --}}
                        <td>{{ $equipo->monto_reparacion }}</td>
                        <td>{{ $equipo->monto_total }}</td>
                        <td>{{ $equipo->fecha_recepcion->format('d/m/Y') }}</td>
                        <td>{{ $equipo->fecha_entrega->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
