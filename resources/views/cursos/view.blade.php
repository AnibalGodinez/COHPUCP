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

    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-4 px-3">
        <div class="card rounded h-100">
            @if ($curso->imagen)
                <div class="image-container" style="overflow: hidden; height: 200px; width: 100%;">
                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" class="card-img-top rounded-top curso-image" alt="{{ $curso->nombre }}">
                </div>
            @endif
            <div class="card-body">
                <h4 class="card-title text-center text-uppercase"><strong><strong>{{ $curso->nombre }}</strong></strong></h4>
                <hr style="border: 2px solid #ddd;"> <!-- Línea horizontal -->
                <p class="card-text">{{ Str::limit($curso->descripcion, 130) }}</p>
                <p class="card-text"><strong>Precio:</strong> <span style="color: green"><strong>{{ $curso->precio }}</strong></span></p>
                <p class="card-text"><strong>Calificación:</strong> {{ $curso->calificacion }}</p>
                <p class="card-text"><strong>Idioma:</strong> {{ $curso->idioma ? $curso->idioma->nombre : 'No disponible' }}</p>
                <p class="card-text"><strong>Categoría:</strong> {{ $curso->categoria ? $curso->categoria->nombre : 'No disponible' }}</p>
                <div class="text-center mt-4">
                    <a href="{{ route('cursos.show', $curso->id) }}" class="btn btn-info btn-sm">Más información</a>
                    <a href="#"><i class="fas fa-shopping-cart" style="font-size: 20px; color: #FF7F00; margin-left: 10px;"></i></a>
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
        transition: transform 0.3s ease;
        width: 100%;           /* La imagen ocupará todo el ancho del contenedor */
        height: 100%;          /* La imagen se adaptará a la altura del contenedor */
        object-fit: cover;     /* Mantiene la proporción de la imagen sin distorsión */
        object-position: center; /* Centra la imagen en caso de recorte */
    }

    .image-container:hover .curso-image {
        transform: scale(1.05);
    }

    .card:hover {
        transform: translateY(-3px); /* Eleva la tarjeta al pasar el cursor */
    }

    /* Ajuste adicional de márgenes para pantallas pequeñas */
    @media (max-width: 768px) {
        .card-body {
            font-size: 0.9rem;
        }
        .card-title {
            font-size: 1.1rem;
        }
        .card-text {
            font-size: 0.85rem;
        }
        .col-sm-6 {
            padding-left: 10px;
            padding-right: 10px;
        }
    }

</style>