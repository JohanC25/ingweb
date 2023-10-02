@extends('layout/template')

@section('title', 'Editar Usuarios')

@section('contenido')

<main>
    <div class="contain py-4">
        <h2>Editar Usuarios</h2>

        @if($errors->any())
            <div class="alert alert-warning alert-dismissable fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>                        
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ url('usuarios/'.$usuario->id) }}" method="post">
            @method("PUT")
            @csrf

            <div class="mb-3 row">
                <label for="nombre_usuario" class="col-sm-2 col-form-label">Nombre Usuario</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" value="{{ $usuario->nombre_usuario }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="contrasenia" class="col-sm-2 col-form-label">Contraseña</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="contrasenia" id="contrasenia" value="{{ $usuario->contrasenia}}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="correo" id="correo" value="{{ $usuario->correo }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $usuario->nombre }}" required>
                </div>
            </div>

            <div class="mb-3 row">
                <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $usuario->apellido }}">
                </div>
            </div>

            <a href="{{url('usuarios')}}" class="btn btn-secundary">Regresar</a>

            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
        
    </div>
</main>