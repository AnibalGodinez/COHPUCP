{{-- resources/views/courses/index.blade.php --}}
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Cursos Disponibles</h1>
            <div class="row">
                @php
                    // Datos de ejemplo para los cursos
                    $courses = [
                        (object)[
                            'id' => 1,
                            'name' => 'Curso de Laravel',
                            'description' => 'Aprende a desarrollar aplicaciones web con Laravel.',
                            'price' => '99.99',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 2,
                            'name' => 'Curso de Vue.js',
                            'description' => 'Domina el framework de JavaScript Vue.js.',
                            'price' => '89.99',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 3,
                            'name' => 'Curso de React',
                            'description' => 'Construye interfaces de usuario con React.',
                            'price' => '79.99',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 4,
                            'name' => 'Curso de Node.js',
                            'description' => 'Desarrolla aplicaciones de servidor con Node.js.',
                            'price' => '69.99',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                    ];
                @endphp

                @foreach($courses as $course)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ $course->image }}" alt="{{ $course->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong style="font-size: 1.2rem;">{{ $course->name }}</strong></h5>
                                <p class="card-text">{{ $course->description }}</p>
                            </div>
                            <div class="card-footer">
                                <small><strong class="text-success">Precio: ${{ $course->price }}</strong></small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
