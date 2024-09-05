@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h3 class="card-title">
                        <strong>SOLICITUD DE INSCRIPCIÓN DE FIRMA</strong>
                    </h3>
                </div>

                <div class="card-body">

                    <!-- I. DATOS DE LA SOCIEDAD -->
                    <div class="col-md-12 mb-4">
                        <div class="card shadow-lg">
                            <div class="card-header bg-primary text-white text-center">
                                <h4 class="card-title">
                                    <strong>DATOS DE LA SOCIEDAD</strong>
                                </h4>
                            </div><br>
                            <div class="row">                             
                                <div class="col-md-6">
                                    <p><strong>NOMBRE DE LA SOCIEDAD</strong><br>{{ $inscripcionFirma->nombre_sociedad }}</p>
                                    <p><strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong><br>{{ $inscripcionFirma->fecha_constitucion }}</p>
                                    <p><strong>Nº INSCRIPCIÓN CÁMARA DE COMERCIO</strong><br>{{ $inscripcionFirma->num_inscripcion_camara_comercio }}</p>
                                    <p><strong>DIRECCIÓN DE LA FIRMA</strong><br>{{ $inscripcionFirma->direccion }}</p>
                                    <p><strong>CELULAR</strong><br>{{ $inscripcionFirma->celular }}</p>
                                </div>
                                <div class="col-md-6">
                                    <p><strong>Nº INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong><br>{{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}</p>
                                    <p><strong>Nº REGISTRO TRIBUTARIO NACIONAL</strong><br>{{ $inscripcionFirma->registro_tributario_nacional }}</p>
                                    <p><strong>MUNICIPIO DONDE REALIZA LA SOLICITUD</strong><br>{{ $inscripcionFirma->municipio_realiza_solicitud }}</p>
                                    <p><strong>CORREO ELECTRÓNICO</strong><br>{{ $inscripcionFirma->email }}</p>
                                </div>
                            </div><br>
                        </div>
                    </div>

                    <!-- DATOS DE LOS SOCIOS -->
                    <div class="row">
                        <!-- DATOS DEL SOCIO 1 -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 1</strong>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>NOMBRE COMPLETO</strong><br>{{ $inscripcionFirma->primer_nombre_socio1 }} {{ $inscripcionFirma->segundo_nombre_socio1 }} {{ $inscripcionFirma->primer_apellido_socio1 }} {{ $inscripcionFirma->segundo_apellido_socio1 }}</p>
                                        <p><strong>NÚMERO DE COLEGIACIÓN</strong><br>{{ $inscripcionFirma->num_colegiacion_socio1 }}</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p><strong>FIRMA DIGITAL</strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio1)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Digital Socio 1" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>                    
                        </div>

                        <!-- DATOS DEL SOCIO 2 -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 2</strong>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>NOMBRE COMPLETO</strong><br>{{ $inscripcionFirma->primer_nombre_socio2 }} {{ $inscripcionFirma->segundo_nombre_socio2 }} {{ $inscripcionFirma->primer_apellido_socio2 }} {{ $inscripcionFirma->segundo_apellido_socio2 }}</p>
                                        <p><strong>NÚMERO DE COLEGIACIÓN</strong><br>{{ $inscripcionFirma->num_colegiacion_socio2 }}</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p><strong>FIRMA DIGITAL</strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio2)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Digital Socio 2" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATOS DEL SOCIO 3 -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 3</strong>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>NOMBRE COMPLETO</strong><br>{{ $inscripcionFirma->primer_nombre_socio3 }} {{ $inscripcionFirma->segundo_nombre_socio3 }} {{ $inscripcionFirma->primer_apellido_socio3 }} {{ $inscripcionFirma->segundo_apellido_socio3 }}</p>
                                        <p><strong>NÚMERO DE COLEGIACIÓN</strong><br>{{ $inscripcionFirma->num_colegiacion_socio3 }}</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p><strong>FIRMA DIGITAL</strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio3)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio3) }}" alt="Firma Digital Socio 3" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DATOS DEL SOCIO 4 -->
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 4</strong>
                                    </h4>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <p><strong>NOMBRE COMPLETO</strong><br>{{ $inscripcionFirma->primer_nombre_socio4 }} {{ $inscripcionFirma->segundo_nombre_socio4 }} {{ $inscripcionFirma->primer_apellido_socio4 }} {{ $inscripcionFirma->segundo_apellido_socio4 }}</p>
                                        <p><strong>NÚMERO DE COLEGIACIÓN</strong><br>{{ $inscripcionFirma->num_colegiacion_socio4 }}</p>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <p><strong>FIRMA DIGITAL</strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio4)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio4) }}" alt="Firma Digital Socio 3" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FIRMA DIGITAL DE LA FIRMA SOCIAL -->
                    <div class="row">
                        <div class="col-md-6 mb-4 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>FIRMA DIGITAL DE LA FIRMA SOCIAL</strong>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if($inscripcionFirma->imagen_firma_social)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_social) }}" alt="Firma Digital de la firma social" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <p>No se ha subido firma digital.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- FIRMA DIGITAL DEL REPRESENTANTE LEGAL -->
                    <div class="row">
                        <div class="col-md-6 mb-4 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-primary text-white text-center">
                                    <h4 class="card-title">
                                        <strong>FIRMA DIGITAL DEL REPRESENTANTE LEGAL</strong>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if($inscripcionFirma->imagen_firma_representante_legal)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_representante_legal) }}" alt="Firma Digital del representante legal" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <p>No se ha subido firma digital.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">

                            <a href="{{ route('inscripcion_firmas.index') }}" class="btn btn-info">
                                <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                Volver
                            </a>

                            <!-- Botón para previsualizar el PDF -->
                            <a href="{{ route('inscripcion_firmas.pdf.preview', ['id' => $inscripcionFirma->id]) }}" class="btn btn-secondary">
                                <i class="fas fa-eye" style="margin-right: 8px;"></i>
                                Ver PDF
                            </a>
                    
                            <!-- Botón para descargar el PDF -->
                            <a href="{{ route('inscripcion_firmas.pdf.download', ['id' => $inscripcionFirma->id]) }}" class="btn btn-success">
                                <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                Descargar PDF
                            </a>

                        </div>
                    </div>
                    <br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
