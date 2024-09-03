@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top:90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>VER SOLICITUD DE INSCRIPCIÓN DE FIRMA AL COLEGIO</strong></h3>
                </div><br>

                <div class="card-body">
                    <!-- Datos de la Sociedad -->
                    <div class="form-group row">
                        <div class="col-12 text-center mb-0">
                            <h4 style="text-decoration: underline;"><strong>I. DATOS DE LA SOCIEDAD</strong></h4>
                        </div>

                        <div class="col-md-3">
                            <label><strong>NOMBRE DE LA SOCIEDAD</strong></label>
                            <p>{{ $inscripcionFirma->nombre_sociedad }}</p>
                        </div>

                        <div class="col-md-3">
                            <label><strong>Nº INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong></label>
                            <p>{{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong></label>
                            <p>{{ $inscripcionFirma->fecha_constitucion }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>Nº REGISTRO TRIBUTARIO NACIONAL</strong></label>
                            <p>{{ $inscripcionFirma->registro_tributario_nacional }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>Nº INSCRIPCIÓN CÁMARA DE COMERCIO</strong></label>
                            <p>{{ $inscripcionFirma->num_inscripcion_camara_comercio }}</p>
                        </div>

                        <div class="col-md-6">
                            <label><strong>DIRECCIÓN DE LA FIRMA</strong></label>
                            <p>{{ $inscripcionFirma->direccion }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>TELÉFONO</strong></label>
                            <p>{{ $inscripcionFirma->telefono }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>CELULAR</strong></label>
                            <p>{{ $inscripcionFirma->celular }}</p>
                        </div>

                        <div class="col-md-2">
                            <label><strong>CORREO ELECTRÓNICO</strong></label>
                            <p>{{ $inscripcionFirma->email }}</p>
                        </div>
                    </div>

                    <!-- Datos de los Socios -->
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <h4 style="text-decoration: underline;"><strong>II. DATOS DE LOS SOCIOS</strong></h4>
                        </div>

                        <!-- Socio 1 -->
                        <div class="col-12 mb-4">
                            <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 1:</strong></h6>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>PRIMER NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->primer_nombre_socio1 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_nombre_socio1 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>PRIMER APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->primer_apellido_socio1 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_apellido_socio1 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>NÚMERO DE COLEGIACIÓN</strong></label>
                                    <p>{{ $inscripcionFirma->num_colegiacion_socio1 }}</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <label><strong>FIRMA DIGITAL</strong></label><br>
                                @if($inscripcionFirma->imagen_firma_socio1)
                                    <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Digital Socio 1" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <p>No se ha subido firma digital.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Socio 2 -->
                        <div class="col-12 mb-4">
                            <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 2:</strong></h6>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>PRIMER NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->primer_nombre_socio2 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_nombre_socio2 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>PRIMER APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->primer_apellido_socio2 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_apellido_socio2 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>NÚMERO DE COLEGIACIÓN</strong></label>
                                    <p>{{ $inscripcionFirma->num_colegiacion_socio2 }}</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <label><strong>FIRMA DIGITAL</strong></label><br>
                                @if($inscripcionFirma->imagen_firma_socio2)
                                    <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Digital Socio 2" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <p>No se ha subido firma digital.</p>
                                @endif
                            </div>
                        </div>

                        <!-- Socio 3 -->
                        <div class="col-12 mb-4">
                            <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 3:</strong></h6>
                            <div class="row">
                                <div class="col-md-2">
                                    <label><strong>PRIMER NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->primer_nombre_socio3 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO NOMBRE</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_nombre_socio3 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>PRIMER APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->primer_apellido_socio3 }}</p>
                                </div>
                                <div class="col-md-2">
                                    <label><strong>SEGUNDO APELLIDO</strong></label>
                                    <p>{{ $inscripcionFirma->segundo_apellido_socio3 }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label><strong>NÚMERO DE COLEGIACIÓN</strong></label>
                                    <p>{{ $inscripcionFirma->num_colegiacion_socio3 }}</p>
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <label><strong>FIRMA DIGITAL</strong></label><br>
                                @if($inscripcionFirma->imagen_firma_socio3)
                                    <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio3) }}" alt="Firma Digital Socio 3" style="max-width: 200px; max-height: 200px;">
                                @else
                                    <p>No se ha subido firma digital.</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Botón de Volver -->
                    <div class="form-group row">
                        <div class="col-md-12 text-center">
                            <a href="{{ route('inscripcion_firmas.index') }}" class="btn btn-primary">Volver a la Lista de Solicitudes</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
