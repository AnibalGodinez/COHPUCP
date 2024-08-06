@extends('layouts.app')

@section('content')

    @foreach ($cursos as $curso)

    <div class="container-fluid" style="margin-top: 20px">
        @if ($curso->layout === 'Imagen de fondo')
            <div class="card border-0 position-relative mb-4">
                @if ($curso->imagen)
                    <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                @endif
                <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center" style="background-color: rgba(0, 0, 0, 0.788);">
                    <h1 class="card-title text-center text-white">{{ $curso->titulo }}</h1>
                    <p class="card-text text-center text-white" style="font-size: 1.2rem;">{{ Str::limit($curso->descripcion, 100) }}</p>
                    <div class="text-center">
                        <a href="{{ $curso->enlace }}" class="btn btn-info">Ver Curso</a>
                        <a href="{{ $curso->icono }}" class="btn btn-info">Icono</a>
                    </div>
                </div>
            </div>
    </div>

    <div class="container-fluid">
        @elseif ($curso->layout === 'Imagen a la derecha')
            <div class="card h-120 mb-4">
                <div class="row no-gutters">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title text-center"><strong>{{ $curso->titulo }}</strong></h1>
                            <p class="card-text" style="font-size: 1.2rem;">{{ $curso->descripcion }}</p>
                            <div class="text-center">
                                <a href="{{ $curso->enlace }}" class="btn btn-info">Ver Curso</a>
                                <a href="{{ $curso->icono }}" class="btn btn-info">Icono</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        @if ($curso->imagen)
                            <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="{{ $curso->titulo }}" class="img-fluid" style="max-width: 100%; height: auto;">
                        @endif
                    </div>
                </div>
            </div>
    </div>

    <div class="container">
            @elseif ($curso->layout === 'Tarjetas de cursos')
                <div class="row bord mb-8">
                    <div class="col-md-4">
                        <div class="card rounded">
                            @if ($curso->imagen)
                                <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" class="card-img-top rounded-top" alt="{{ $curso->nombre }}">
                            @endif
                            <div class="card-body">
                                <h4 class="card-title text-center"><strong>{{ $curso->nombre }}</strong></h4>
                                <p class="card-text">{{ Str::limit($curso->descripcion, 100) }}</p><br>
                                <p class="card-text"><strong>PRECIO:</strong> <span class="text-success"><strong><strong>{{ $curso->precio }} US$</strong></strong></span></p>
                                <p class="card-text"><strong>CALIFICACIÓN:</strong> {{ $curso->calificacion }}</p>
                                <p class="card-text"><strong>IDIOMA:</strong> {{ $curso->idioma ? $curso->idioma->nombre : 'No disponible' }}</p>
                                <p class="card-text"><strong>CATEGORÍA:</strong> {{ $curso->categoria ? $curso->categoria->nombre : 'No disponible' }}</p><br>
                                <div class="text-center">
                                    <a href="{{ $curso->enlace }}" class="btn btn-info">Ver Curso</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
