@extends('layouts.app')

@section('content')
    <h1>Detalles de la solicitud de vacante</h1>

    <div class="card">
        <div class="card-header">
            Solicitud de {{ $solicitud->nombre_vacante }} - {{ $solicitud->nombre_empresa }}
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $solicitud->descripcion }}</p>
            <p><strong>Responsabilidades:</strong> {{ $solicitud->responsabilidades }}</p>
            <p><strong>Requisitos:</strong> {{ $solicitud->requisitos }}</p>
            <p><strong>Experiencia:</strong> {{ $solicitud->experiencia }}</p>
            <p><strong>Tiempo:</strong> {{ $solicitud->tiempo }}</p>
            <p><strong>Ubicación:</strong> {{ $solicitud->ubicacion }}</p>
            <p><strong>Correo:</strong> {{ $solicitud->correo }}</p>
            <p><strong>Teléfono:</strong> {{ $solicitud->telefono }}</p>
            <p><strong>Celular:</strong> {{ $solicitud->celular }}</p>
            <p><strong>Enlace:</strong> <a href="{{ $solicitud->enlace }}" target="_blank">{{ $solicitud->enlace }}</a></p>
            <p><strong>Estado:</strong> {{ ucfirst($solicitud->estado) }}</p>
        </div>
    </div>

    <a href="{{ route('solicitudes-vacantes.index') }}" class="btn btn-secondary mt-3">Volver a la lista</a>
@endsection
