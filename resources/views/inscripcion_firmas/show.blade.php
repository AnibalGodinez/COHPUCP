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
                            <div class="card-header bg-warning text-white text-center">
                                <h4 class="card-title">
                                    <strong>DATOS DE LA SOCIEDAD</strong>
                                </h4>
                            </div>
                            <div class="row p-3">
                                <div class="col-md-1 d-flex flex-column">                                                   
                                </div>
                                {{-- columna 1 --}}
                                <div class="col-md-3 d-flex flex-column">
                                    <p class="mb-3">
                                        <strong><strong>NOMBRE DE LA SOCIEDAD</strong></strong><br>
                                        @if(!$inscripcionFirma->nombre_sociedad)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->nombre_sociedad }}
                                        @endif
                                    </p>
                                    <p class="mb-3">
                                        <strong><strong>Nº REGISTRO TRIBUTARIO NACIONAL</strong></strong><br>
                                        @if(!$inscripcionFirma->registro_tributario_nacional)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->registro_tributario_nacional }}
                                        @endif
                                    </p>
                                    <p class="mb-3">
                                        <strong><strong>TELÉFONO</strong></strong><br>
                                        @if(!$inscripcionFirma->telefono)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->telefono }}
                                        @endif
                                    </p>                                                       
                                </div>

                                {{-- columna 2 --}}
                                <div class="col-md-3 d-flex flex-column">
                                    <p class="mb-3">
                                        <strong><strong>Nº INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong></strong><br>
                                        @if(!$inscripcionFirma->num_inscripcion_registro_publico_comercio)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}
                                        @endif
                                    </p>
                                    <p class="mb-3">
                                        <strong><strong>Nº INSCRIPCIÓN CÁMARA DE COMERCIO</strong></strong><br>
                                        @if(!$inscripcionFirma->num_inscripcion_camara_comercio)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->num_inscripcion_camara_comercio }}
                                        @endif
                                    </p>
                                    <p class="mb-3">
                                        <strong><strong>CELULAR</strong></strong><br>
                                        @if(!$inscripcionFirma->celular)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->celular }}
                                        @endif
                                    </p>                                    
                                    
                                </div>
                                
                                {{-- columna 3 --}}
                                <div class="col-md-3 d-flex flex-column">
                                    <p class="mb-3">
                                        <strong><strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong></strong><br>
                                        @if($inscripcionFirma->fecha_constitucion)
                                            {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->format('Y') }}
                                        @else
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @endif
                                    </p>

                                    <p class="mb-3">
                                        <strong><strong>DIRECCIÓN DE LA FIRMA</strong></strong><br>
                                        @if(!$inscripcionFirma->direccion)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->direccion }}
                                        @endif
                                    </p>

                                    <p class="mb-3">
                                        <strong><strong>CORREO ELECTRÓNICO</strong></strong><br>
                                        @if(!$inscripcionFirma->email)
                                            <span style="text-decoration: line-through;">No disponible</span>
                                        @else
                                            {{ $inscripcionFirma->email }}
                                        @endif
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- II. DATOS DE LOS SOCIOS -->
                    <div class="row">
                        
                        {{-- Socio 1 --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 1</strong>
                                    </h4>
                                </div>                        
                                <div class="row p-3">
                                    <div class="col-md-1 d-flex flex-column">                                                   
                                    </div>
                                    {{-- columna 1 --}}
                                    <div class="col-md-5">
                                        <p class="mb-4">
                                            <strong><strong>NOMBRE COMPLETO</strong></strong><br>
                                            @if($inscripcionFirma->primer_nombre_socio1 || $inscripcionFirma->segundo_nombre_socio1 || $inscripcionFirma->primer_apellido_socio1 || $inscripcionFirma->segundo_apellido_socio1)
                                                {{ $inscripcionFirma->primer_nombre_socio1 }} {{ $inscripcionFirma->segundo_nombre_socio1 }} {{ $inscripcionFirma->primer_apellido_socio1 }} {{ $inscripcionFirma->segundo_apellido_socio1 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna 2 --}}
                                    <div class="col-md-6">
                                        <p>
                                            <strong><strong>NÚMERO DE COLEGIACIÓN</strong></strong><br>
                                            @if($inscripcionFirma->num_colegiacion_socio1)
                                                {{ $inscripcionFirma->num_colegiacion_socio1 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna de la firma digital --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio1)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Digital Socio 1" class="img-fluid rounded" style="max-width: 500px; max-height: 300px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>                    
                        </div>

                        {{-- Socio 2 --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 2</strong>
                                    </h4>
                                </div>                        
                                <div class="row p-3">
                                    <div class="col-md-1 d-flex flex-column">                                                   
                                    </div>
                                    {{-- columna 1 --}}
                                    <div class="col-md-5">
                                        <p class="mb-4">
                                            <strong><strong>NOMBRE COMPLETO</strong></strong><br>
                                            @if($inscripcionFirma->primer_nombre_socio2 || $inscripcionFirma->segundo_nombre_socio2 || $inscripcionFirma->primer_apellido_socio2 || $inscripcionFirma->segundo_apellido_socio2)
                                                {{ $inscripcionFirma->primer_nombre_socio2 }} {{ $inscripcionFirma->segundo_nombre_socio2 }} {{ $inscripcionFirma->primer_apellido_socio2 }} {{ $inscripcionFirma->segundo_apellido_socio2 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna 2 --}}
                                    <div class="col-md-6">
                                        <p>
                                            <strong><strong>NÚMERO DE COLEGIACIÓN</strong></strong><br>
                                            @if($inscripcionFirma->num_colegiacion_socio2)
                                                {{ $inscripcionFirma->num_colegiacion_socio2 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna de la firma digital --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio2)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Digital Socio 2" class="img-fluid rounded" style="max-width: 500px; max-height: 300px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>                    
                        </div>


                        {{-- Socio 3 --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 3</strong>
                                    </h4>
                                </div>                        
                                <div class="row p-3">
                                    <div class="col-md-1 d-flex flex-column">                                                   
                                    </div>
                                    {{-- columna 1 --}}
                                    <div class="col-md-5">
                                        <p class="mb-4">
                                            <strong><strong>NOMBRE COMPLETO</strong></strong><br>
                                            @if($inscripcionFirma->primer_nombre_socio3 || $inscripcionFirma->segundo_nombre_socio3 || $inscripcionFirma->primer_apellido_socio3 || $inscripcionFirma->segundo_apellido_socio3)
                                                {{ $inscripcionFirma->primer_nombre_socio3 }} {{ $inscripcionFirma->segundo_nombre_socio3 }} {{ $inscripcionFirma->primer_apellido_socio3 }} {{ $inscripcionFirma->segundo_apellido_socio3 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna 2 --}}
                                    <div class="col-md-6">
                                        <p>
                                            <strong><strong>NÚMERO DE COLEGIACIÓN</strong></strong><br>
                                            @if($inscripcionFirma->num_colegiacion_socio3)
                                                {{ $inscripcionFirma->num_colegiacion_socio3 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna de la firma digital --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong>FIRMA DIGITAL</strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio3)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio3) }}" alt="Firma Digital Socio 3" class="img-fluid rounded" style="max-width: 500px; max-height: 300px;">
                                        @else
                                            <p>No se ha subido firma digital.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>                    
                        </div>


                        {{-- Socio 4 --}}
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>DATOS DEL SOCIO 4</strong>
                                    </h4>
                                </div>                        
                                <div class="row p-3">
                                    <div class="col-md-1 d-flex flex-column">                                                   
                                    </div>
                                    {{-- columna 1 --}}
                                    <div class="col-md-5">
                                        <p class="mb-4">
                                            <strong><strong>NOMBRE COMPLETO</strong></strong><br>
                                            @if($inscripcionFirma->primer_nombre_socio4 || $inscripcionFirma->segundo_nombre_socio4 || $inscripcionFirma->primer_apellido_socio4 || $inscripcionFirma->segundo_apellido_socio4)
                                                {{ $inscripcionFirma->primer_nombre_socio4 }} {{ $inscripcionFirma->segundo_nombre_socio4 }} {{ $inscripcionFirma->primer_apellido_socio4 }} {{ $inscripcionFirma->segundo_apellido_socio4 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna 2 --}}
                                    <div class="col-md-6">
                                        <p>
                                            <strong><strong>NÚMERO DE COLEGIACIÓN</strong></strong><br>
                                            @if($inscripcionFirma->num_colegiacion_socio4)
                                                {{ $inscripcionFirma->num_colegiacion_socio4 }}
                                            @else
                                                <span style="text-decoration: line-through;">No disponible</span>
                                            @endif
                                        </p>
                                    </div>
                                    {{-- columna 1 --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio4)
                                            <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio4) }}" alt="Firma Digital Socio 4" class="img-fluid rounded" style="max-width: 500px; max-height: 300px;">
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
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>FIRMA DIGITAL DE LA FIRMA SOCIAL</strong>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if($inscripcionFirma->imagen_firma_social)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_social) }}" alt="Firma Digital de la firma social" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <p><span style="text-decoration: line-through;">No disponible</span></p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 text-center">
                            <div class="card shadow-lg">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title">
                                        <strong>FIRMA DIGITAL DEL REPRESENTANTE LEGAL</strong>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    @if($inscripcionFirma->imagen_firma_representante_legal)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_representante_legal) }}" alt="Firma Digital del representante legal" class="img-fluid rounded" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <p><span style="text-decoration: line-through;">No disponible</span></p>
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
