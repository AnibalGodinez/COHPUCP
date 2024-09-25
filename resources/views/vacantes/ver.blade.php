@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-md-12">
            <h2 class="mb-4 text-center">Vacantes Disponibles</h2>

            @if($vacantes->isEmpty())
                <p>No hay vacantes disponibles en este momento.</p>
            @else
            <div class="list-group">
                @foreach($vacantes as $index => $vacante)
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="list-group-item list-group-item-action mb-3 p-4" style="border: 1px solid #E0E0E0; border-left: 6px solid {{ $index % 2 == 0 ? '#0A26EE' : '#FAB306' }}; border-radius: 8px;">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="mb-1" style="text-transform: uppercase;"><strong>{{ $vacante->nombre_vacante }}</strong></h5>
                                <p class="text-muted">{{ $vacante->nombre_empresa }} - 
                                    <small>Publicado 
                                        @if ($vacante->created_at->isToday())
                                            hoy
                                        @elseif ($vacante->created_at->isYesterday())
                                            ayer
                                        @else
                                            {{ $vacante->created_at->format('d M Y') }}
                                        @endif
                                    </small>
                                </p>
                                <p>{{ Str::limit($vacante->descripcion, 250) }}</p>
                            </div>

                            <!-- Línea divisoria vertical -->
                            <div class="col-md-1 d-none d-md-block" style="border-left: 1px solid #ccc;"></div>

                            <div class="col-md-3 text-left">
                                <p class="mb-3"><i class="fas fa-map-marker-alt" style="color: red"></i> {{ $vacante->ubicacion }}</p>
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
