@extends('layouts.app')

@section('content')

@foreach ($cursos as $curso)

@if ($curso->layout === 'Imagen de fondo')
    <div class="container-fluid p-1 mb-4" style="margin-top: 69px;">
        <div class="card border-0 position-relative" style="height: 50vh;">
            @if ($curso->imagen)
                <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid w-100 h-100" style="object-fit: cover;">
            @endif
            <div class="card-img-overlay d-flex flex-column justify-content-center align-items-start bg-overlay">
                
                <div class="text-box">
                    <h1 class="card-title text-white" style="margin-left: 150px;"> {{ $curso->titulo }} </h1>
                    <p class="card-text text-white" style="margin-left: 150px; font-size: 1.30em;">{!! nl2br(e(Str::limit($curso->descripcion, 500))) !!}</p><br>
                    @if ($curso->enlace || $curso->icono)
                        <div>
                            @if ($curso->enlace)
                                <a href="{{ $curso->enlace }}" class="btn btn-danger" target="_blank" style="margin-left: 150px;">Inscíbete a los cursos</a>
                            @endif
                            @if ($curso->icono)
                                <a href="{{ $curso->icono }}" class="btn btn-danger" target="_blank">Icono</a>
                            @endif
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endif


@if ($curso->layout === 'Imagen a la derecha')
    <div class="container-fluid mb-4">
        <div class="card h-100">
            <div class="row no-gutters">
                <div class="col-md-8 d-flex justify-content-center align-items-center">
                    <div class="card-body text-box">
                        <h1 class="card-title" style="margin-left: 150px;"><strong>{{ $curso->titulo }}</strong></h1>
                        <p class="card-text" style="margin-left: 150px; font-size: 1.20em;">{!! nl2br(e($curso->descripcion)) !!}</p>
                        <div>
                            @if ($curso->enlace)
                                <a href="{{ $curso->enlace }}" class="btn btn-info" target="_blank">Ver Curso</a>
                            @endif
                            @if ($curso->icono)
                                <a href="{{ $curso->icono }}" class="btn btn-info" target="_blank">Icono</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-center">
                    @if ($curso->imagen)
                        <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid" style="max-width: 80%; height: auto;">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif


@if ($curso->layout === 'Tarjetas de cursos')
    <div class="container mb-8">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card rounded h-100">
                    @if ($curso->imagen)
                        <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" class="card-img-top rounded-top" alt="{{ $curso->nombre }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong>{{ $curso->nombre }}</strong></h4>
                        <p class="card-text">{{ Str::limit($curso->descripcion, 100) }}</p>
                        <p class="card-text"><strong>PRECIO:</strong> <span class="text-success"><strong><strong>{{ $curso->precio }} US$</strong></strong></span></p>
                        <p class="card-text"><strong>CALIFICACIÓN:</strong> {{ $curso->calificacion }}</p>
                        <p class="card-text"><strong>IDIOMA:</strong> {{ $curso->idioma ? $curso->idioma->nombre : 'No disponible' }}</p>
                        <p class="card-text"><strong>CATEGORÍA:</strong> {{ $curso->categoria ? $curso->categoria->nombre : 'No disponible' }}</p>
                        <div class="text-center mt-3">
                            <a href="{{ $curso->enlace }}" class="btn btn-info" target="_blank">Ver Curso</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endforeach

@endsection
