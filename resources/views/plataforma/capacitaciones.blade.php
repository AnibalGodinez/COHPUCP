{{-- resources/views/trainings/index.blade.php --}}
@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="my-4">Capacitaciones Disponibles</h1>
            <div class="row">
                @php
                    // Datos de ejemplo para las capacitaciones
                    $trainings = [
                        (object)[
                            'id' => 1,
                            'name' => 'Capacitación en Gestión de Proyectos',
                            'description' => 'Aprende las mejores prácticas en la gestión de proyectos.',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 2,
                            'name' => 'Capacitación en Marketing Digital',
                            'description' => 'Domina las herramientas y técnicas del marketing digital.',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 3,
                            'name' => 'Capacitación en Data Science',
                            'description' => 'Conviértete en un experto en ciencia de datos.',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                        (object)[
                            'id' => 4,
                            'name' => 'Capacitación en Desarrollo Ágil',
                            'description' => 'Aprende a desarrollar software con metodologías ágiles.',
                            'image' => 'https://via.placeholder.com/150',
                        ],
                    ];
                @endphp

                @foreach($trainings as $training)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img class="card-img-top" src="{{ $training->image }}" alt="{{ $training->name }}">
                            <div class="card-body">
                                <h5 class="card-title"><strong style="font-size: 1.2rem;">{{ $training->name }}</strong></h5>
                                <p class="card-text">{{ $training->description }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="#" class="btn btn-info btn-sm">Más Información</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
