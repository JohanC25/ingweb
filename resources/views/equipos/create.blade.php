@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Agregar Equipo
                </div>
                <div class="float-end">
                    <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('equipos.store') }}" method="post">
                    @csrf

                    <!-- Tipo de Equipo -->
                    <div class="mb-3 row">
                        <label for="tipo_equipo" class="col-md-4 col-form-label text-md-end text-start">Tipo de Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('tipo_equipo') is-invalid @enderror" id="tipo_equipo" name="tipo_equipo" value="{{ old('tipo_equipo') }}">
                            @error('tipo_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Marca del Equipo -->
                    <div class="mb-3 row">
                        <label for="marca_equipo" class="col-md-4 col-form-label text-md-end text-start">Marca del Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('marca_equipo') is-invalid @enderror" id="marca_equipo" name="marca_equipo" value="{{ old('marca_equipo') }}">
                            @error('marca_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Modelo del Equipo -->
                    <div class="mb-3 row">
                        <label for="modelo_equipo" class="col-md-4 col-form-label text-md-end text-start">Modelo del Equipo</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('modelo_equipo') is-invalid @enderror" id="modelo_equipo" name="modelo_equipo" value="{{ old('modelo_equipo') }}">
                            @error('modelo_equipo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Recepción -->
                    <div class="mb-3 row">
                        <label for="fecha_recepcion" class="col-md-4 col-form-label text-md-end text-start">Fecha de Recepción</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_recepcion') is-invalid @enderror" id="fecha_recepcion" name="fecha_recepcion" value="{{ old('fecha_recepcion') }}">
                            @error('fecha_recepcion')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Entrega -->
                    <div class="mb-3 row">
                        <label for="fecha_entrega" class="col-md-4 col-form-label text-md-end text-start">Fecha de Entrega</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_entrega') is-invalid @enderror" id="fecha_entrega" name="fecha_entrega" value="{{ old('fecha_entrega') }}">
                            @error('fecha_entrega')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Fecha de Retiro -->
                    <div class="mb-3 row">
                        <label for="fecha_retiro" class="col-md-4 col-form-label text-md-end text-start">Fecha de Retiro</label>
                        <div class="col-md-6">
                            <input type="date" class="form-control @error('fecha_retiro') is-invalid @enderror" id="fecha_retiro" name="fecha_retiro" value="{{ old('fecha_retiro') }}">
                            @error('fecha_retiro')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Cliente -->
                    <div class="mb-3 row">
                        <label for="id_cliente" class="col-md-4 col-form-label text-md-end text-start">Cliente</label>
                        <div class="col-md-6">
                            <select class="form-control @error('id_cliente') is-invalid @enderror" id="id_cliente" name="id_cliente">
                                <option value="">Seleccione un Cliente</option>
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ old('id_cliente') == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                            @error('id_cliente')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Botón de Envío -->
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>

@endsection
