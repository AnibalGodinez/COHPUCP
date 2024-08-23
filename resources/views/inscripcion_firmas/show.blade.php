@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <h2 class="mb-4">Detalles de la Inscripción de Firma</h2>
            <table class="table table-bordered">
                <tr>
                    <th>Nombre de Sociedad</th>
                    <td>{{ $inscripcionFirma->nombre_sociedad }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $inscripcionFirma->email }}</td>
                </tr>
                <!-- Agrega más filas aquí para otros datos de la inscripción -->

                <tr>
                    <th>Estado</th>
                    <td>{{ $inscripcionFirma->estado }}</td>
                </tr>
                <tr>
                    <th>Fecha de Inscripción</th>
                    <td>{{ $inscripcionFirma->fecha_inscripcion->format('d/m/Y') }}</td>
                </tr>
                <!-- Agrega más filas aquí para otros datos -->
            </table>
            <a href="{{ route('inscripcion_firmas.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
