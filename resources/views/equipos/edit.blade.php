@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Equipo
                    <div class="float-end">
                        <a href="{{ route('equipos.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                    </div>
                </div>
                <div class="card-body">
                        <!-- Bloque para mostrar errores de validación -->
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('equipos.update', $equipo->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="mb-3 row">
                            <label for="tipo_equipo" class="col-md-4 col-form-label text-md-end">Tipo de Equipo</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo"
                                    value="{{ $equipo->tipo_equipo }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="marca_equipo" class="col-md-4 col-form-label text-md-end">Marca del Equipo</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="marca_equipo" name="marca_equipo"
                                    value="{{ $equipo->marca_equipo }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="modelo_equipo" class="col-md-4 col-form-label text-md-end">Modelo del Equipo</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="modelo_equipo" name="modelo_equipo"
                                    value="{{ $equipo->modelo_equipo }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_recepcion" class="col-md-4 col-form-label text-md-end">Fecha de
                                Recepción</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="fecha_recepcion" name="fecha_recepcion"
                                    value="{{ $equipo->fecha_recepcion }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_entrega" class="col-md-4 col-form-label text-md-end">Fecha de Entrega</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="fecha_entrega" name="fecha_entrega"
                                    value="{{ $equipo->fecha_entrega }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="fecha_retiro" class="col-md-4 col-form-label text-md-end">Fecha de Retiro</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" id="fecha_retiro" name="fecha_retiro"
                                    value="{{ $equipo->fecha_retiro }}">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="cliente_nombre" class="col-md-4 col-form-label text-md-end">Nombre del Cliente</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre"
                                    value="{{ $equipo->cliente->nombre ?? 'No asignado' }}" readonly>
                            </div>
                        </div>

                        <input type="hidden" name="id_cliente" value="{{ $equipo->cliente->id ?? '' }}">

                        <div class="mb-3 row">
                            <label for="equipo_retirado" class="col-md-4 col-form-label text-md-end">Equipo Retirado</label>
                            <div class="col-md-6">
                                <input type="hidden" name="equipo_retirado" value="0">
                                <input type="checkbox" id="equipo_retirado" name="equipo_retirado" value="1" {{ $equipo->equipo_retirado ? 'checked' : '' }}>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="monto_pagar" class="col-md-4 col-form-label text-md-end">Monto a Pagar</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('monto_pagar') is-invalid @enderror" id="monto_pagar" name="monto_pagar" value="{{ old('monto_pagar', $equipo->monto_pagar) }}">
                                @error('monto_pagar')
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
