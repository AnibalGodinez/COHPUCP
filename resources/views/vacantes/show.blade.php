@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-10">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title" style="color: white"><strong>Detalles de la solicitud de la vacante</strong></h3>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4" style="text-decoration: underline; text-transform: uppercase;"><strong><strong>{{ $solicitud->nombre_empresa }}</strong></strong></h3>
                        <div class="row">

                            <div class="col-md-1">
                                {{-- ESPACIO --}}
                            </div>
                            <div class="col-md-10 mb-4">
                                <p class="mb-4"><strong><strong>NOMBRE DE LA VACANTE</strong></strong><br> {{ $solicitud->nombre_vacante }}</p>
                                <p class="mb-4"><strong><strong>DESCRIPCIÓN</strong></strong><br> {{ $solicitud->descripcion }}</p>
                                <p class="mb-4"><strong><strong>RESPONSABILIDADES</strong></strong><br>  {!! nl2br(e($solicitud->responsabilidades)) !!}</p>
                                <p class="mb-4"><strong><strong>REQUISITOS</strong></strong><br> {!! nl2br(e($solicitud->requisitos)) !!}</p>
                                <p class="mb-4"><strong><strong>EXPERIENCIA</strong></strong><br> {{ $solicitud->experiencia }}</p>
                                <p class="mb-4"><strong><strong>UBICACIÓN</strong></strong><br> {{ $solicitud->ubicacion }}</p>
                            </div>
                            <div class="col-md-1">
                                {{-- ESPACIO --}}
                            </div>


                            <div class="col-md-2">
                                {{-- ESPACIO --}}
                            </div>

                            <div class="col-md-3">
                                <p class="mb-4"><strong><strong>TIEMPO</strong></strong><br> {{ $solicitud->tiempo }}</p>                            
                                <p><strong><strong>CELULAR</strong></strong><br> {{ $solicitud->celular }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-4"><strong><strong>CORREO</strong></strong><br> {{ $solicitud->correo }}</p>
                                <p><strong><strong>ENLACE</strong></strong><br> <a href="{{ $solicitud->enlace }}" target="_blank">{{ $solicitud->enlace }}</a></p>
                            </div>
                            <div class="col-md-3">
                                <p class="mb-4"><strong><strong>TELÉFONO</strong></strong><br> {{ $solicitud->telefono }}</p>
                                <p><strong><strong>ESTADO</strong></strong><br> {{ ucfirst($solicitud->estado) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <a href="{{ route('vacantes.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Volver a la lista
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
