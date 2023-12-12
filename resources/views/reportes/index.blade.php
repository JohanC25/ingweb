@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/tablas.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Reporte de Clientes y Equipos</h1>

    <form action="{{ route('reportes.search') }}" method="GET">
        <div class="search-bar">
            <label for="fecha_inicio">Fecha de inicio:</label>
            <input type="date" id="fecha_inicio" name="fecha_inicio">

            <label for="fecha_fin">Fecha de fin:</label>
            <input type="date" id="fecha_fin" name="fecha_fin">

            <button type="submit">Buscar</button>
        </div>
    </form>

    <table class="report-table">
        <thead>
            <tr>
                <th>Nombre Cliente</th>
                <th>Tipo Equipo</th>
                <th>Modelo Equipo</th>
                <th>Monto de la Multa</th>
                <th>Estado de Retiro</th>
                <th>Fecha de Recepción</th>
                <th>Fecha de Entrega</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                @foreach ($cliente->equipos as $equipo)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $equipo->tipo_equipo }}</td>
                        <td>{{ $equipo->modelo_equipo }}</td>
                        <td>{{ $equipo->multa }}</td>
                        <td>{{ $equipo->equipo_retirado ? 'Retirado' : 'Sin retirar' }}</td>
                        <td>{{ $equipo->fecha_recepcion }}</td>
                        <td>{{ $equipo->fecha_entrega }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endsection
