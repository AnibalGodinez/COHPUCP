@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="mb-4 text-center">
        <strong>CURSOS DISPONIBLES</strong>
    </h1>
    <div class="row bord">
        @foreach ($cursos as $curso)
            <div class="col-md-4 mb-4">
                <div class="card h-100 rounded">
                    @if ($curso->imagen)
                        <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" class="card-img-top rounded-top" alt="{{ $curso->nombre }}">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title text-center"><strong>{{ $curso->nombre }}</strong></h4>
                        <p class="card-text">{{ Str::limit($curso->descripcion, 100) }}</p><br>
                        <p class="card-text"><strong>PRECIO:</strong> <span class="text-success"><strong><strong>{{ $curso->precio }} US$</strong></strong></span></p>
                        <p class="card-text"><strong>CALIFICACIÓN:</strong> {{ $curso->calificacion }}</p>
                        <p class="card-text"><strong>IDIOMA:</strong> {{ $curso->idioma }}</p><br>
                        <div class="text-center">
                            <a href="{{ $curso->enlace }}" class="btn btn-info">Ver Curso</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
