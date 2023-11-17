@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Lista de Equipos</div>
    <div class="card-body">
        @can('create-equipo')
            <a href="{{ route('equipos.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar Equipo</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tipo de Equipo</th>
                    <th scope="col">Marca del Equipo</th>
                    <th scope="col">Modelo del Equipo</th>
                    <th scope="col">Fecha de Recepción</th>
                    <th scope="col">Fecha de Entrega</th>
                    <th scope="col">Fecha de Retiro</th>
                    <th scope="col">Equipo Retirado</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Multa</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($equipos as $equipo)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $equipo->tipo_equipo }}</td>
                    <td>{{ $equipo->marca_equipo }}</td>
                    <td>{{ $equipo->modelo_equipo }}</td>
                    <td>{{ $equipo->fecha_recepcion }}</td>
                    <td>{{ $equipo->fecha_entrega }}</td>
                    <td>{{ $equipo->fecha_retiro }}</td>
                    <td>{{ $equipo->equipo_retirado ? 'Sí' : 'No' }}</td>
                    <td>{{ $equipo->cliente->nombre }}</td> <!-- Asumiendo que cada equipo tiene un cliente asociado -->
                    <td>{{ $equipo->multa }}</td>
                    <td>
                        <form action="{{ route('equipos.destroy', $equipo->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('equipos.show', $equipo->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-equipo')
                                <a href="{{ route('equipos.edit', $equipo->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-equipo')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this equipment?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="11">
                        <span class="text-danger">
                            <strong>No Equipment Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $equipos->links() }}

    </div>
</div>
@endsection
