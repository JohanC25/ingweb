@extends('layout/template')

@section('title', 'Usuarios')

@section('contenido')
<style>
    table {
        border-collapse: collapse;
        margin: auto;
        width: 80%;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
        text-align: left;
    }

    .contain {
        text-align: center;
    }
</style>

<main>
    <div class="contain py-4">
        <h2>Listado de Usuarios</h2>

        <a href="{{ url('usuarios/create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
        <a href="{{ url('/') }}" class="btn btn-primary btn-sm">Log Out</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre Usuario</th>
                <th>Correo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td>{{$usuario->id}}</td>
                        <td>{{$usuario->nombre_usuario}}</td>
                        <td>{{$usuario->correo}}</td>
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellido}}</td>
                        <td><a href="{{url('usuarios/'.$usuario->id.'/edit')}}" class="btn btn-warning btn-">Editar</a></td>
                        <td>
                            <form action="{{url('usuarios/'.$usuario->id) }}" method="post">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tr>
        </tbody>
    </table>

</main>