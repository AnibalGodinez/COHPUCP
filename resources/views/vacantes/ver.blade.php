@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card mt-7">
                <div class="card-body">
                    <h2 class="text-center"><strong>VACANTES DISPONIBLES</strong></h2>

                    @if($vacantes->isEmpty())
                        <p>No hay vacantes disponibles en este momento</p>
                    @else
                        <div class="list-group">
                            @foreach($vacantes as $vacante)

                                <a class="list-group-item list-group-item-action mb-4">
                                    <h4 class="text-center" style="text-transform: uppercase;">{{ $vacante->nombre_vacante }} - {{ $vacante->nombre_empresa }}</h4>
                                    
                                    <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                    Descripción de la vacante
                                    <h4>{!! nl2br(e($vacante->descripcion)) !!}</h4>

                                    <i class="fas fa-tasks" style="margin-right: 8px;"></i>
                                    <strong>Responsabilidades</strong>
                                    <h4>{!! nl2br(e($vacante->responsabilidades)) !!}</h4>
                                    
                                    <i class="fas fa-list-alt" style="margin-right: 8px;"></i>
                                    <strong>Requisitos</strong>
                                    <h4>{!! nl2br(e($vacante->requisitos)) !!}</h4>

                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                    <strong>Experiencia</strong>
                                    <h4>{!! nl2br(e($vacante->experiencia)) !!}</h4>

                                    <i class="fas fa-clock" style="margin-right: 8px;"></i>
                                    <strong>Tiempo</strong>
                                    <h4>{!! nl2br(e($vacante->tiempo)) !!}</h4>

                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>Correo electónico</strong>
                                    <h4>{{ $vacante->correo }}</h4>

                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>Teléfono fijo</strong>
                                    <h4>{{ $vacante->telefono }}</h4>

                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>Celular</strong>
                                    <h4>{{ $vacante->celular }}</h4>

                                    <small>{{ $vacante->ubicacion }}</small>
                                </a>

                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
