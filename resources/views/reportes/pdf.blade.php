<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Clientes y Equipos</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .report-table th,
        .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .report-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Reporte de Clientes y Equipos</h1>

    <p>
        <strong>Fecha de inicio:</strong> {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }}<br>
        <strong>Fecha de fin:</strong> {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}
    </p>

    <table class="report-table">
        <thead>
            <tr>
                <th>Ganancias Totales</th>
                <th>Ganancia Sin Multas</th>
                <th>Total de Multas</th>
                <th>% de Ganancia Sin Multas</th>
                <th>% de Multas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ number_format($gananciaTotal, 2) }}</td>
                <td>{{ number_format($gananciaSinMultas, 2) }}</td>
                <td>{{ number_format($totalMultas, 2) }}</td>
                <td>{{ number_format($porcentajeGananciaSinMultas, 2) }}%</td>
                <td>{{ number_format($porcentajeTotalMultas, 2) }}%</td>
            </tr>
        </tbody>
    </table>

    <h2>Conteo de Tipos de Equipos</h2>
    <table class="report-table">
        <thead>
            <tr>
                <th>Tipo de Equipo</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($conteoTiposEquipo as $tipo)
                <tr>
                    <td>{{ $tipo->tipo_equipo }}</td>
                    <td>{{ $tipo->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

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
                        <td>{{ number_format($equipo->multa ?? 0, 2) }}</td>
                        <td>{{ $equipo->equipo_retirado ? 'Retirado' : 'Sin retirar' }}</td>
                        <td>{{ $equipo->fecha_recepcion }}</td>
                        <td>{{ $equipo->fecha_entrega }}</td>
                        <td>{{ number_format(($equipo->multa ?? 0) + $equipo->monto_pagar, 2) }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>

</html>
