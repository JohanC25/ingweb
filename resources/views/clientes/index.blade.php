@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Clientes</h2>
            </div>
            <div class="pull-right">
                @can('client-create')
                <a class="btn btn-success" href="{{ route('clientes.create') }}"> Create New Client</a>
                @endcan
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Direccion</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $cliente->nombre }}</td>
            <td>{{ $cliente->apellido }}</td>
            <td>{{ $cliente->correo }}</td>
            <td>{{ $cliente->celular }}</td>
            <td>{{ $cliente->direccion }}</td>
            <td>
                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('clientes.show',$cliente->id) }}">Show</a>
                    @can('client-edit')
                    <a class="btn btn-primary" href="{{ route('clientes.edit',$cliente->id) }}">Edit</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('client-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $clientes->links() !!}

@endsection
