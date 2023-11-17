@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Información del Equipo
                </div>
                <div class="float-end">
                    <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <label for="tipo_equipo" class="col-md-4 col-form-label text-md-end text-start"><strong>Tipo de Equipo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->tipo_equipo }}
                    </div>
                </div>

                <div class="row">
                    <label for="marca_equipo" class="col-md-4 col-form-label text-md-end text-start"><strong>Marca del Equipo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->marca_equipo }}
                    </div>
                </div>

                <div class="row">
                    <label for="modelo_equipo" class="col-md-4 col-form-label text-md-end text-start"><strong>Modelo del Equipo:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->modelo_equipo }}
                    </div>
                </div>

                <div class="row">
                    <label for="fecha_recepcion" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Recepción:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->fecha_recepcion }}
                    </div>
                </div>

                <div class="row">
                    <label for="fecha_entrega" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Entrega:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->fecha_entrega }}
                    </div>
                </div>

                <div class="row">
                    <label for="fecha_retiro" class="col-md-4 col-form-label text-md-end text-start"><strong>Fecha de Retiro:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->fecha_retiro }}
                    </div>
                </div>

                <div class="row">
                    <label for="equipo_retirado" class="col-md-4 col-form-label text-md-end text-start"><strong>Equipo Retirado:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->equipo_retirado ? 'Sí' : 'No' }}
                    </div>
                </div>

                <div class="row">
                    <label for="cliente" class="col-md-4 col-form-label text-md-end text-start"><strong>Cliente:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->cliente->nombre }}
                    </div>
                </div>

                <div class="row">
                    <label for="multa" class="col-md-4 col-form-label text-md-end text-start"><strong>Multa:</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $equipo->multa }}
                    </div>
                </div>

            </div>
        </div>
    </div>    
</div>
    
@endsection
