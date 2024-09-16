@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>{{ $curso->titulo ? $curso->titulo : $curso->nombre }}</h3>
                    </div>

                    <div class="card-body">
                        <!-- Mostrar imagen del curso si existe -->
                        @if($curso->imagen)
                            <div class="mb-4 text-center">
                                <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="Imagen del curso" class="img-fluid" style="height: 500px;">
                            </div>
                        @endif

                        <!-- Detalles del curso -->
                        <p style="font-size: 20px;">{{ $curso->descripcion }}</p>
                        <p><strong>Precio:</strong><span style="color: green"><strong> {{ $curso->precio }}</strong> </span> </p>

                        <!-- Calificación si existe -->
                        @if($curso->calificacion)
                            <p><strong>Calificación:</strong> {{ $curso->calificacion }} / 10</p>
                        @endif

                        <!-- Enlace del curso -->
                        @if($curso->enlace)
                            <p><strong>Enlace:</strong> <a href="{{ $curso->enlace }}" target="_blank" style="color: blue;">Ir al curso</a></p>
                        @endif

                        <!-- Información adicional -->
                        <p><strong>Idioma:</strong> {{ $curso->idioma->nombre }}</p>
                        <p><strong>Categoría:</strong> {{ $curso->categoria->nombre }}</p>

                        <!-- Información del creador del curso -->
                        <p><strong>Creador:</strong> {{ $curso->user->name }} {{ $curso->user->apellido }}</p>

                    </div>

                    
                    <div class="card-footer">
                        <!-- Botón para regresar a los cursos -->
                        <a href="{{ route('cursos.view') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Volver a los cursos
                        </a>
                        <!-- Icono para agregar al carrito -->
                        <a href="#">
                            <i class="fas fa-shopping-cart" style="font-size: 24px; color: #FF7F00; margin-left: 25px;"></i>
                        </a>
                    </div>                    

                </div>
            </div>
        </div>
    </div>
@endsection
