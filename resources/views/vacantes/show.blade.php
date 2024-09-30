@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-10">
                <div class="card">

                    <div class="card-body">
                        <h3 class="card-title text-center mb-4" style="text-decoration: underline; text-transform: uppercase;"><strong><strong>{{ $solicitud->nombre_empresa }}</strong></strong></h3>
                        
                        <div class="row">

                            <div class="col-md-1">
                                {{-- ESPACIO --}}
                            </div>
                            <div class="col-md-10 mb-4">
                                <p class="mb-4"><strong><strong><i class="fas fa-briefcase"></i> NOMBRE DE LA VACANTE</strong></strong><br> {{ $solicitud->nombre_vacante }} </p>
                                <p class="mb-4"><strong><strong><i class="fas fa-align-left"></i> DESCRIPCIÓN</strong></strong><br>  {!! nl2br(e($solicitud->descripcion )) !!} </p>
                                <p class="mb-4"><strong><strong><i class="fas fa-tasks"></i> RESPONSABILIDADES</strong></strong><br> {!! nl2br(e($solicitud->responsabilidades)) !!} </p>
                                <p class="mb-4"><strong><strong><i class="fas fa-list"></i> REQUISITOS</strong></strong><br> {!! nl2br(e($solicitud->requisitos)) !!} </p>
                                <p class="mb-4"><strong><strong><i class="fas fa-briefcase"></i> EXPERIENCIA</strong></strong><br> {!! nl2br(e($solicitud->experiencia )) !!} </p>
                                <p class="mb-4"><strong><strong><i class="fas fa-map-marker-alt"></i> UBICACIÓN</strong></strong><br> {!! nl2br(e($solicitud->ubicacion )) !!} </p>
                            </div>
                            <div class="col-md-1">
                                {{-- ESPACIO --}}
                            </div>


                            <div class="col-md-2">
                                {{-- ESPACIO --}}
                            </div>

                            <div class="col-md-3">
                                <p class="mb-4"><strong><strong><i class="fas fa-clock"></i> TIEMPO</strong></strong><br> {{ $solicitud->tiempo }}</p>                            
                                <p><strong><strong><i class="fas fa-mobile-alt"></i> CELULAR</strong></strong><br> {{ $solicitud->celular }}</p>
                            </div>
                            <div class="col-md-4">
                                <p class="mb-4"><strong><strong><i class="fas fa-envelope"></i>  CORREO</strong></strong><br> {{ $solicitud->correo }}</p>
                                <p><strong><strong><i class="fas fa-link"></i> ENLACE</strong></strong><br> <a href="{{ $solicitud->enlace }}" target="_blank">{{ $solicitud->enlace }}</a></p>
                            </div>
                            <div class="col-md-3">
                                <p class="mb-4"><strong><strong><i class="fas fa-phone"></i> TELÉFONO</strong></strong><br> {{ $solicitud->telefono }}</p>
                                <p><strong><strong>ESTADO</strong></strong><br> {{ ucfirst($solicitud->estado) }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <a href="{{ route('vacantes.ver') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left mr-2"></i> Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
