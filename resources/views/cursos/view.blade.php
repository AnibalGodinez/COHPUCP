@extends('layouts.app')

@section('content')

@php
    $counter = 0;
@endphp

@foreach ($cursos as $curso)

@if ($curso->layout === 'Imagen de fondo') 
    <div class="container-fluid p-1 mb-4" style="margin-top: 69px;">
        <div class="card border-0 position-relative" style="height: 60vh;">
            @if ($curso->imagen)
                <div class="image-container" style="overflow: hidden;">
                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid w-100 h-100 curso-image" style="object-fit: cover;">
                    <div class="card-img-overlay d-flex flex-column justify-content-center align-items-start bg-overlay text-box">
                        <h1 class="card-title text-white" style="margin-left: 150px;"> {{ $curso->titulo }} </h1>
                        <p class="card-text text-white" style="margin-left: 150px; font-size: 2.50em;"><strong>{!! nl2br(e(Str::limit($curso->descripcion, 500))) !!}</strong></p><br>
                        @if ($curso->enlace || $curso->icono)
                            <div>
                                @if ($curso->enlace)
                                    <a href="{{ $curso->enlace }}" class="btn btn-danger" target="_blank" style="margin-left: 150px;">Inscíbete a los cursos</a>
                                @endif
                                <div style="margin-left: 150px">
                                    @if ($curso->icono)
                                        <a href="{{ $curso->icono }}" class="btn btn-danger" target="_blank">Cursos</a>
                                    @endif
                                </div>                         
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif

@if ($curso->layout === 'Imagen a la derecha')
    <div class="container-fluid mb-8">
        <div class="card h-180">
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
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    @if ($curso->imagen)
                        <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid" style="max-width: 80%; height: auto;">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endif

@if ($curso->layout === 'Tarjetas de cursos')
    @if ($counter % 3 == 0)
        <div class="row justify-content-center">
    @endif

    <div class="col-md-3 mb-4">
        <div class="card rounded h-100">
            @if ($curso->imagen)
                <div class="image-container" style="overflow: hidden; height: 225px;">
                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" class="card-img-top rounded-top curso-image" alt="{{ $curso->nombre }}">
                </div>
            @endif
            <div class="card-body">
                <h4 class="card-title text-center" style="text-transform: uppercase;"><strong><strong>{{ $curso->nombre }}</strong></strong></h4>
                <p class="card-text">{{ Str::limit($curso->descripcion, 100) }}</p><br>
                <p class="card-text"><strong>PRECIO:</strong> <span style="color: green"><strong><strong>{{ $curso->precio }}</strong></strong></span></p>
                <p class="card-text"><strong>CALIFICACIÓN:</strong> {{ $curso->calificacion }}</p>
                <p class="card-text"><strong>IDIOMA:</strong> {{ $curso->idioma ? $curso->idioma->nombre : 'No disponible' }}</p>
                <p class="card-text"><strong>CATEGORÍA:</strong> {{ $curso->categoria ? $curso->categoria->nombre : 'No disponible' }}</p>
                <div class="text-center mt-4">
                    <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info">Más información</a>
                    <!-- Icono para agregar al carrito -->
                    <a href="#">
                        <i class="fas fa-shopping-cart" style="font-size: 24px; color: #FF7F00; margin-left: 25px;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @php
        $counter++;
    @endphp

    @if ($counter % 3 == 0)
        </div>
    @endif
@endif

@endforeach

@if ($counter % 3 != 0)
    </div>
@endif

@endsection

<style>
    .curso-image {
        transition: transform 0.5s ease; /* Transición suave de 0.5 segundos */
    }

    .image-container:hover .curso-image {
        transform: scale(1.05); /* Efecto de zoom/movimiento al pasar el cursor sobre la imagen */
    }

    .text-box {
        transition: transform 0.5s ease, opacity 0.5s ease;
    }

    .image-container:hover .text-box {
        transform: translateY(-10px); /* Mueve el contenido hacia arriba al hacer hover sobre la imagen */
        opacity: 1; /* Cambia la opacidad si deseas agregar este efecto */
    }
</style>