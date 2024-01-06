@extends('layouts.app')

@section('head')
    <link href="{{ asset('css/tablas.css') }}" rel="stylesheet">
@endsection

@section('content')
    @php
        $mes_actual = date('n');
        //$semestre_actual = $mes_actual <= 6 ? '1' : '2';
    @endphp
    <h1>Reporte de Clientes y Equipos</h1>
    <br>
    <form action="{{ route('reportes.search') }}" method="GET">
        <div class="search-bar">
            <label for="periodo">Período de búsqueda:</label>
            <select id="periodo" name="periodo" onchange="togglePeriodo()">
                <option value="entre_fechas" {{ old('periodo') == 'entre_fechas' ? 'selected' : '' }}>Entre Fechas</option>
                {{-- <option value="por_mes" {{ old('periodo') == 'por_mes' ? 'selected' : '' }}>Por Mes</option>
                <option value="por_semestre" {{ old('periodo') == 'por_semestre' ? 'selected' : '' }}>Por Semestre</option> --}}
            </select>

            <div id="entre_fechas" style="display: none;">
                <label for="fecha_inicio">Fecha de inicio:</label>
                <input type="date" id="fecha_inicio" name="fecha_inicio" value="{{ old('fecha_inicio', date('Y-m-d', strtotime('-7 days'))) }}">
                <label for="fecha_fin">Fecha de fin:</label>
                <input type="date" id="fecha_fin" name="fecha_fin" value="{{ old('fecha_fin', date('Y-m-d')) }}">
            </div>

             {{-- <div id="por_mes" style="display: none;">
                <label for="mes">Mes:</label>
                <select id="mes" name="mes">
                    <option value="1" {{ old('mes', $mes_actual) == '1' ? 'selected' : '' }}>Enero</option>
                    <option value="2" {{ old('mes', $mes_actual) == '2' ? 'selected' : '' }}>Febrero</option>
                    <option value="3" {{ old('mes', $mes_actual) == '3' ? 'selected' : '' }}>Marzo</option>
                    <option value="4" {{ old('mes', $mes_actual) == '4' ? 'selected' : '' }}>Abril</option>
                    <option value="5" {{ old('mes', $mes_actual) == '5' ? 'selected' : '' }}>Mayo</option>
                    <option value="6" {{ old('mes', $mes_actual) == '6' ? 'selected' : '' }}>Junio</option>
                    <option value="7" {{ old('mes', $mes_actual) == '7' ? 'selected' : '' }}>Julio</option>
                    <option value="8" {{ old('mes', $mes_actual) == '8' ? 'selected' : '' }}>Agosto</option>
                    <option value="9" {{ old('mes', $mes_actual) == '9' ? 'selected' : '' }}>Septiembre</option>
                    <option value="10" {{ old('mes', $mes_actual) == '10' ? 'selected' : '' }}>Octubre</option>
                    <option value="11" {{ old('mes', $mes_actual) == '11' ? 'selected' : '' }}>Noviembre</option>
                    <option value="12" {{ old('mes', $mes_actual) == '12' ? 'selected' : '' }}>Diciembre</option>
                </select>
            </div> --}}

            {{-- <div id="por_semestre" style="display: none;">
                <label for="semestre">Semestre:</label>
                <select id="semestre" name="semestre">
                    <option value="1" {{ old('semestre', $semestre_actual) == '1' ? 'selected' : '' }}>Primer Semestre
                        (Enero - Junio)</option>
                    <option value="2" {{ old('semestre', $semestre_actual) == '2' ? 'selected' : '' }}>Segundo
                        Semestre (Julio - Diciembre)</option>
                </select>
            </div> --}}

             <div>
                <label for="solo_multas">Solo con Multas:</label>
                <input type="checkbox" id="solo_multas" name="solo_multas" {{ old('solo_multas') ? 'checked' : '' }}>
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-search"></i> Buscar
            </button>

            <a href="{{ route('reportes.pdf', request()->query()) }}" class="btn btn-secondary">
                <i class="fa fa-file-pdf"></i> Descargar PDF
            </a>
        </div>
    </form>
    <br>

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
                <th>Total a Pagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                @foreach ($cliente->equipos as $equipo)
                    <tr>
                        <td>{{ $cliente->nombre }}</td>
                        <td>{{ $equipo->tipo_equipo }}</td>
                        <td>{{ $equipo->modelo_equipo }}</td>
                        <td>{{ ($equipo->multa != null) ? $equipo->multa : 0 }}</td>
                        <td>{{ $equipo->equipo_retirado ? 'Retirado' : 'Sin retirar' }}</td>
                        <td>{{ $equipo->fecha_recepcion }}</td>
                        <td>{{ $equipo->fecha_entrega }}</td>
                        <td>{{ $equipo->multa ? $equipo->multa + $equipo->monto_pagar : $equipo->monto_pagar }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    <script>
        function togglePeriodo() {
            var periodo = document.getElementById('periodo').value;
            document.getElementById('entre_fechas').style.display = periodo === 'entre_fechas' ? 'block' : 'none';
            document.getElementById('por_mes').style.display = periodo === 'por_mes' ? 'block' : 'none';
            document.getElementById('por_semestre').style.display = periodo === 'por_semestre' ? 'block' : 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            togglePeriodo();
        });
    </script>
@endsection
