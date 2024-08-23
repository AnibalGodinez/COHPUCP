@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <h2 class="mb-4">Lista de Inscripciones de Firmas</h2>
            <a href="{{ route('inscripcion_firmas.create') }}" class="btn btn-primary mb-3">Agregar Nueva Inscripción</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre de Sociedad</th>
                        <th>Email</th>
                        <th>Fecha de Inscripción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscripcionFirmas as $inscripcionFirma)
                        <tr>
                            <td>{{ $inscripcionFirma->nombre_sociedad }}</td>
                            <td>{{ $inscripcionFirma->email }}</td>
                            <td>{{ $inscripcionFirma->fecha_inscripcion->format('d/m/Y') }}</td>
                            <td>{{ $inscripcionFirma->estado }}</td>
                            <td>
                                <a href="{{ route('inscripcion_firmas.show', $inscripcionFirma->id) }}" class="btn btn-info btn-sm">Ver</a>
                                <a href="{{ route('inscripcion_firmas.edit', $inscripcionFirma->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('inscripcion_firmas.destroy', $inscripcionFirma->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
