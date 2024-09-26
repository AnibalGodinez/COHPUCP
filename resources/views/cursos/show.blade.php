@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card m-7">
                <div class="card-body">
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <h3 class="font-weight-bold">DETALLE DEL CURSO DE {{ $curso->titulo ? $curso->titulo : $curso->nombre }}</h3>
                    </div>

                    <hr style="border: 1px solid #ddd;"> <!-- Línea horizontal -->

                    <div class="card-body p-1">
                        <div class="row">
                            <!-- Columna izquierda: Imagen e información del curso -->
                            <div class="col-md-3 mb-4">
                                <!-- Recuadro para la imagen del curso -->
                                <div class="text-center p-3 border rounded mb-0">
                                    @if($curso->imagen)
                                        <img src="{{ asset('storage/cursos_images/' . $curso->imagen) }}" alt="Imagen del curso" class="img-fluid rounded-lg" style="max-height: 250px; width:400px; object-fit: cover;">
                                    @endif
                                </div>

                                <!-- Bloque azul con el nombre del curso pegado a la imagen -->
                                <div class="p-2 text-center" style="background-color: #007bff; color: white; margin-top: -1px;">
                                    <h5>{{ $curso->titulo ? $curso->titulo : $curso->nombre }}</h5>
                                </div>

                                <!-- Información del curso -->
                                <div class="p-3 border rounded mt-3">
                                    <ul class="list-unstyled">
                                        <li><strong>Precio:</strong> <span class="text-success h5">120.65 Lps</span></li>
                                        <li><strong>Enlace:</strong> <a href="{{ $curso->enlace }}" target="_blank" class="text-primary">Ir al curso</a></li>
                                        <li><strong>Idioma:</strong> Francés</li>
                                        <li><strong>Categoría:</strong> Contabilidad Tributaria</li>
                                        <li><strong>Creador:</strong> Anibal Godinez</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Línea divisoria vertical -->
                            <div class="col-md-1 d-none d-md-block" style="border-left: 1px solid #ccc;"></div>

                            <!-- Columna derecha: Descripción del curso y botones -->
                            <div class="col-md-8">
                                <p class="lead mb-4">{{ $curso->descripcion }}</p>

                                <div class="mt-4 d-flex justify-content-between align-items-center">
                                    <!-- Botón para regresar a los cursos -->
                                    <a href="{{ route('cursos.view') }}" class="btn btn-outline-primary">
                                        <i class="fas fa-arrow-left mr-2"></i>
                                        Volver a los cursos
                                    </a>

                                    <!-- Icono para agregar al carrito -->
                                    <a href="#" class="text-warning" style="font-size: 28px;">
                                        <i class="fas fa-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
