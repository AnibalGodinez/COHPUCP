@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-md-12">
            <h1 class="mb-4">Vacantes Disponibles</h1>

            @if($vacantes->isEmpty())
                <p>No hay vacantes disponibles en este momento.</p>
            @else
            <div class="list-group">
                @foreach($vacantes as $index => $vacante)
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="list-group-item list-group-item-action mb-3 p-4" style="border: 1px solid #E0E0E0; border-left: 5px solid {{ $index % 2 == 0 ? '#FFD700' : '#32CD32' }}; border-radius: 8px;">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-1" style="text-transform: uppercase;"><strong>{{ $vacante->nombre_vacante }}</strong></h5>
                                <p class="text-muted">{{ $vacante->nombre_empresa }} - <small>Publicado {{ $vacante->fecha_publicacion }}</small></p>
                                <p>{{ Str::limit($vacante->descripcion, 150) }}</p>
                            </div>
                            <div class="col-md-4 text-md-right text-left">
                                <p><i class="fas fa-map-marker-alt"></i> {{ $vacante->ubicacion }}</p>
                                <p><i class="fas fa-briefcase"></i> {{ $vacante->modalidad }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
