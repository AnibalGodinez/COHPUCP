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
                        <th>Número Inscripción Registro Público Comercio</th>
                        <th>Fecha Constitución</th>
                        <th>Registro Tributario Nacional</th>
                        <th>Número Inscripción Cámara Comercio</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Celular</th>
                        <th>Email</th>
                        <th>Primer Nombre Socio 1</th>
                        <th>Segundo Nombre Socio 1</th>
                        <th>Primer Apellido Socio 1</th>
                        <th>Segundo Apellido Socio 1</th>
                        <th>Número Colegiación Socio 1</th>
                        <th>Imagen Firma Socio 1</th>
                        <th>Primer Nombre Socio 2</th>
                        <th>Segundo Nombre Socio 2</th>
                        <th>Primer Apellido Socio 2</th>
                        <th>Segundo Apellido Socio 2</th>
                        <th>Número Colegiación Socio 2</th>
                        <th>Imagen Firma Socio 2</th>
                        <th>Primer Nombre Socio 3</th>
                        <th>Segundo Nombre Socio 3</th>
                        <th>Primer Apellido Socio 3</th>
                        <th>Segundo Apellido Socio 3</th>
                        <th>Número Colegiación Socio 3</th>
                        <th>Imagen Firma Socio 3</th>
                        <th>Imagen Firma Social</th>
                        <th>Imagen Firma Representante Legal</th>
                        <th>Estado</th>
                        <th>Descripción Estado Solicitud</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($inscripcionFirmas as $inscripcionFirma)
                        <tr>
                            <td>{{ $inscripcionFirma->nombre_sociedad }}</td>
                            <td>{{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}</td>
                            <td>{{ $inscripcionFirma->fecha_constitucion ? $inscripcionFirma->fecha_constitucion->format('d-m-Y') : 'Fecha no disponible' }}</td>
                            <td>{{ $inscripcionFirma->registro_tributario_nacional }}</td>
                            <td>{{ $inscripcionFirma->num_inscripcion_camara_comercio }}</td>
                            <td>{{ $inscripcionFirma->direccion }}</td>
                            <td>{{ $inscripcionFirma->telefono }}</td>
                            <td>{{ $inscripcionFirma->celular }}</td>
                            <td>{{ $inscripcionFirma->email }}</td>
                            <td>{{ $inscripcionFirma->primer_nombre_socio1 }}</td>
                            <td>{{ $inscripcionFirma->segundo_nombre_socio1 }}</td>
                            <td>{{ $inscripcionFirma->primer_apellido_socio1 }}</td>
                            <td>{{ $inscripcionFirma->segundo_apellido_socio1 }}</td>
                            <td>{{ $inscripcionFirma->num_colegiacion_socio1 }}</td>
                            <td>
                                @if ($inscripcionFirma->imagen_firma_socio1)
                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Socio 1" style="width: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $inscripcionFirma->primer_nombre_socio2 }}</td>
                            <td>{{ $inscripcionFirma->segundo_nombre_socio2 }}</td>
                            <td>{{ $inscripcionFirma->primer_apellido_socio2 }}</td>
                            <td>{{ $inscripcionFirma->segundo_apellido_socio2 }}</td>
                            <td>{{ $inscripcionFirma->num_colegiacion_socio2 }}</td>
                            <td>
                                @if ($inscripcionFirma->imagen_firma_socio2)
                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Socio 2" style="width: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ $inscripcionFirma->primer_nombre_socio3 }}</td>
                            <td>{{ $inscripcionFirma->segundo_nombre_socio3 }}</td>
                            <td>{{ $inscripcionFirma->primer_apellido_socio3 }}</td>
                            <td>{{ $inscripcionFirma->segundo_apellido_socio3 }}</td>
                            <td>{{ $inscripcionFirma->num_colegiacion_socio3 }}</td>
                            <td>
                                @if ($inscripcionFirma->imagen_firma_socio3)
                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_socio3) }}" alt="Firma Socio 3" style="width: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                @if ($inscripcionFirma->imagen_firma_social)
                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_social) }}" alt="Firma Social" style="width: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>
                                @if ($inscripcionFirma->imagen_firma_representante_legal)
                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_representante_legal) }}" alt="Firma Representante Legal" style="width: 100px;">
                                @else
                                    No disponible
                                @endif
                            </td>
                            <td>{{ ucfirst($inscripcionFirma->estado) }}</td>
                            <td>{{ $inscripcionFirma->descripcion_estado_solicitud }}</td>
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
