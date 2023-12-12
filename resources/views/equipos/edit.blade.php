@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Editar Equipo
                </div>
                <div class="float-end">
                    <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('equipos.update', $equipo->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <!-- Tipo de Equipo -->
                    <div class="mb-3 row">
                        <label for="tipo_equipo" class="col-md-4 col-form-label text-md-end text-start">Tipo de Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('tipo_equipo') is-invalid @enderror" id="tipo_equipo" name="tipo_equipo" value="{{ $equipo->tipo_equipo }}">
                            @error('tipo_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Marca del Equipo -->
                    <div class="mb-3 row">
                        <label for="marca_equipo" class="col-md-4 col-form-label text-md-end text-start">Marca del Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('marca_equipo') is-invalid @enderror" id="marca_equipo" name="marca_equipo" value="{{ $equipo->marca_equipo }}">
                            @error('marca_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modelo del Equipo -->
                    <div class="mb-3 row">
                        <label for="modelo_equipo" class="col-md-4 col-form-label text-md-end text-start">Modelo del Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('modelo_equipo') is-invalid @enderror" id="modelo_equipo" name="modelo_equipo" value="{{ $equipo->modelo_equipo }}">
                            @error('modelo_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Recepción -->
                    <div class="mb-3 row">
                        <label for="fecha_recepcion" class="col-md-4 col-form-label text-md-end text-start">Fecha de Recepción</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_recepcion') is-invalid @enderror" id="fecha_recepcion" name="fecha_recepcion" value="{{ $equipo->fecha_recepcion }}">
                            @error('fecha_recepcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Entrega -->
                    <div class="mb-3 row">
                        <label for="fecha_entrega" class="col-md-4 col-form-label text-md-end text-start">Fecha de Entrega</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" id="fecha_entrega" name="fecha_entrega" value="{{ $equipo->fecha_entrega }}">
                            @error('fecha_entrega')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Retiro -->
                    <div class="mb-3 row">
                        <label for="fecha_retiro" class="col-md-4 col-form-label text-md-end text-start">Fecha de Retiro</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_retiro') is-invalid @enderror" id="fecha_retiro" name="fecha_retiro" value="{{ $equipo->fecha_retiro }}">
                            @error('fecha_retiro')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Equipo Retirado -->
                    <div class="mb-3 row">
                        <label for="equipo_retirado" class="col-md-4 col-form-label text-md-end text-start">Equipo Retirado</label>
                        <div class="col-md-6">
                            <input type="checkbox" class="@error('equipo_retirado') is-invalid @enderror" id="equipo_retirado" name="equipo_retirado" value="1" {{ $equipo->equipo_retirado ? 'checked' : '0' }}>
                            @error('equipo_retirado')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Actualizar">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection
