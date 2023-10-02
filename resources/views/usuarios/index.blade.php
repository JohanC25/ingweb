@extends('layout/template')

@section('title', 'Usuarios')

@section('contenido')

<main>
    <div class="contain py-4">
        <h2>Listado de Usuarios</h2>

        <a href="{{ url('alumnos/create') }}" class="btn btn-primary btn-sm">Nuevo Usuario</a>
    </div>

    
</main>