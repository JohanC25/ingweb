@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Cliente Information
                </div>
                <div class="float-end">
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end text-start"><strong>Nombre:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->nombre }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="apellido" class="col-md-4 col-form-label text-md-end text-start"><strong>Apellido:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->apellido }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="correo" class="col-md-4 col-form-label text-md-end text-start"><strong>Correo:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->correo }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="celular" class="col-md-4 col-form-label text-md-end text-start"><strong>Celular:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->celular }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="direccion" class="col-md-4 col-form-label text-md-end text-start"><strong>Direccion:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $cliente->direccion }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection