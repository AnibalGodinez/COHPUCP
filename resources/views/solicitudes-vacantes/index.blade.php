@extends('layouts.app')

@section('content')
    <h1>Solicitudes de Vacantes</h1>

    <a href="{{ route('solicitudes-vacantes.create') }}" class="btn btn-primary">Crear nueva solicitud de vacante</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nombre de la Empresa</th>
                <th>Vacante</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->nombre_empresa }}</td>
                    <td>{{ $solicitud->nombre_vacante }}</td>
                    <td>
                        @if($solicitud->estado === 'pendiente')
                            <form action="{{ route('solicitudes-vacantes.update', $solicitud->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="aprobado">
                                <button type="submit" class="btn btn-success">Aprobar</button>
                            </form>
                            <form action="{{ route('solicitudes-vacantes.update', $solicitud->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="estado" value="rechazado">
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </form>
                        @else
                            <span>{{ ucfirst($solicitud->estado) }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('solicitudes-vacantes.show', $solicitud->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('solicitudes-vacantes.edit', $solicitud->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('solicitudes-vacantes.destroy', $solicitud->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta solicitud?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
