@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <h3>LISTA DE SOLICITUDES DE INSCRIPCIÓN DE FIRMAS</h3>
                        </div>
            
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Nombre del Solictante</th>
                                        <th class="text-center" style="color: white;">Nombre Sociedad</th>
                                        <th class="text-center" style="color: white;">Nº Inscripción Registro Público Comercio</th>
                                        <th class="text-center" style="color: white;">Fecha Constitución de la firma</th>
                                        <th class="text-center" style="color: white;">Nº Registro Tributario Nacional</th>
                                        <th class="text-center" style="color: white;">Nº Inscripción Cámara Comercio</th>
                                        <th class="text-center" style="color: white;">Municipio donde realiza solicitud</th>
                                        <th class="text-center" style="color: white;">Dirección de la firma</th>
                                        <th class="text-center" style="color: white;">Teléfono</th>
                                        <th class="text-center" style="color: white;">Celular</th>
                                        <th class="text-center" style="color: white;">Email</th>

                                        <th class="text-center" style="color: white;">Nombre completo Socio 1</th>
                                        <th class="text-center" style="color: white;">Número Colegiación Socio 1</th>
                                        <th class="text-center" style="color: white;">Imagen Firma Socio 1</th>

                                        <th class="text-center" style="color: white;">Nombre completo Socio 2</th>                               
                                        <th class="text-center" style="color: white;">Número Colegiación Socio 2</th>
                                        <th class="text-center" style="color: white;">Imagen Firma Socio 2</th>

                                        <th class="text-center" style="color: white;">Nombre completo Socio 3</th>
                                        <th class="text-center" style="color: white;">Número Colegiación Socio 3</th>
                                        <th class="text-center" style="color: white;">Imagen Firma Socio 3</th>

                                        <th class="text-center" style="color: white;">Imagen Firma Social</th>
                                        <th class="text-center" style="color: white;">Imagen Firma Representante Legal</th>

                                        <th class="text-center" style="color: white;">Estado</th>
                                        <th class="text-center" style="color: white;">Descripción Estado Solicitud</th>
                                        <th class="text-center" style="color: white;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscripcionFirmas as $inscripcionFirma)
                                        <tr>
                                            <td>{{ $inscripcionFirma->id }}</td>
                                            <td>{{ $inscripcionFirma->user->name }} {{ $inscripcionFirma->user->name2 }} {{ $inscripcionFirma->user->apellido }} {{ $inscripcionFirma->user->apellido2 }}</td>
                                            <td>{{ $inscripcionFirma->nombre_sociedad }}</td>
                                            <td>{{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}</td>
                                            <td>{{ $inscripcionFirma->fecha_constitucion ? $inscripcionFirma->fecha_constitucion->format('d-m-Y') : 'Fecha no disponible' }}</td>
                                            <td>{{ $inscripcionFirma->registro_tributario_nacional }}</td>
                                            <td>{{ $inscripcionFirma->num_inscripcion_camara_comercio }}</td>
                                            <td>{{ $inscripcionFirma->municipio_realiza_solicitud }}</td>
                                            <td>{{ $inscripcionFirma->direccion }}</td>
                                            <td>{{ $inscripcionFirma->telefono }}</td>
                                            <td>{{ $inscripcionFirma->celular }}</td>
                                            <td>{{ $inscripcionFirma->email }}</td>

                                            <td>{{ $inscripcionFirma->primer_nombre_socio1 }} {{ $inscripcionFirma->segundo_nombre_socio1 }} {{ $inscripcionFirma->primer_apellido_socio1 }} {{ $inscripcionFirma->segundo_apellido_socio1 }}</td>
                                            <td>{{ $inscripcionFirma->num_colegiacion_socio1 }}</td>
                                            <td>
                                                @if ($inscripcionFirma->imagen_firma_socio1)
                                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Socio 1" style="width: 100px;">
                                                @else
                                                    No disponible
                                                @endif
                                            </td>

                                            <td>{{ $inscripcionFirma->primer_nombre_socio2 }} {{ $inscripcionFirma->segundo_nombre_socio2 }} {{ $inscripcionFirma->primer_apellido_socio2 }} {{ $inscripcionFirma->segundo_apellido_socio2 }}</td>
                                            <td>{{ $inscripcionFirma->num_colegiacion_socio2 }}</td>
                                            <td>
                                                @if ($inscripcionFirma->imagen_firma_socio2)
                                                    <img src="{{ asset('storage/' . $inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Socio 2" style="width: 100px;">
                                                @else
                                                    No disponible
                                                @endif
                                            </td>
                                            
                                            <td>{{ $inscripcionFirma->primer_nombre_socio3 }} {{ $inscripcionFirma->segundo_nombre_socio3 }} {{ $inscripcionFirma->primer_apellido_socio3 }} {{ $inscripcionFirma->segundo_apellido_socio3 }}</td>
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

                                            <td>{{ ($inscripcionFirma->estado) }}</td>
                                            <td>{{ $inscripcionFirma->descripcion_estado_solicitud }}</td>

                                            <td class="text-center">
                                                <!-- Botón para ver los detalles de la inscripción -->
                                                <a href="{{ route('inscripcion_firmas.show', $inscripcionFirma->id) }}" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
