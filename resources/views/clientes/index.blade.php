@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Cliente List</div>
    <div class="card-body">
        @can('create-cliente')
            <a href="{{ route('clientes.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Agregar Cliente</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Correo</th>
                <th scope="col">Celular</th>
                <th scope="col">Dirección</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $cliente->nombre }}</td>
                    <td>{{ $cliente->apellido }}</td>
                    <td>{{ $cliente->correo }}</td>
                    <td>{{ $cliente->celular }}</td>
                    <td>{{ $cliente->direccion }}</td>
                    <td>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-cliente')
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-cliente')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this client?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Cliente Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $clientes->links() }}

    </div>
</div>
@endsection