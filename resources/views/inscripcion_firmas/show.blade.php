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
                                <h4 class="card-title" style="text-decoration: underline;">
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

                    <h4 class="text-center" style="text-decoration: underline;">DATOS DEL SOCIO 1</h4>
                    <!-- II. DATOS DE LOS SOCIOS -->
                    <div class="row">
                        
                        {{-- SOCIO 1 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-dark text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>INFORMACIÓN / CV / FIRMA DIGITAL</strong></h4>
                                </div>
                                <div class="row p-3">
                                    {{-- columna 0 (espacio) --}}
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

                                    {{-- Curriculum Vitae del socio 1 --}}
                                    <div class="col-md-12 text-center">
                                        <div class="card shadow-lg" style="width: 100%; max-width: 21cm; height: 20cm;">
                                            <div class="card-header bg-default text-white text-center">
                                                <h5 class="card-title" style="color: rgb(255, 255, 255)"><strong>CURRICULUM VITAE DEL SOCIO 1</strong></h5>
                                            </div>
                                            <div class="card-body p-0" style="overflow: hidden; height: 100%;">
                                                @if($inscripcionFirma->cv_socio1)
                                                    <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio1) }}" 
                                                            style="width: 100%; height: 100%; border: none;" 
                                                            frameborder="0">
                                                        Este navegador no soporta PDFs. Por favor, descargue el PDF para verlo: <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio1) }}">Descargar PDF</a>.
                                                    </iframe>
                                                @else
                                                    <span style="text-decoration: line-through;">No se ha subido el curriculum Vitae</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Firma digital del socio 1 --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio1)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio1) }}" 
                                                    alt="Firma Digital Socio 1" 
                                                    class="img-fluid rounded" 
                                                    style="max-width: 100%; height: auto; max-height: 100px; object-fit: contain;">
                                            </div>
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido firma digital</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Constancia de solvencia | Socio 1 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-dark text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>CONSTANCIA DE SOLVENCIA</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->constancia_solvencia_socio1)
                                            <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/'.$inscripcionFirma->constancia_solvencia_socio1) }}" 
                                                alt="Constancia de solvencia del Socio 1" 
                                                class="img-fluid rounded" 
                                                style="width: auto; height: 900px; object-fit: contain;">
                                        </div>
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la constancia de solvencia</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario frontal | Socio 1 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-dark text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio1)
                                        @php
                                            $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio1);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal del socio 1" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario reverso | Socio 1 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-dark text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio1)
                                        @php
                                        $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio1);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Título Universitario Reverso del socio 1" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-center" style="text-decoration: underline;">DATOS DEL SOCIO 2</h4>
                    <div class="row">                     
                        {{-- SOCIO 2 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-info text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>INFORMACIÓN / CV / FIRMA DIGITAL</strong></h4>
                                </div>
                                <div class="row p-3">
                                    {{-- columna 0 (espacio) --}}
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

                                    {{-- Curriculum Vitae del socio 2 --}}
                                    <div class="col-md-12 text-center">
                                        <div class="card shadow-lg" style="width: 100%; max-width: 21cm; height: 20cm;">
                                            <div class="card-header bg-default text-white text-center">
                                                <h5 class="card-title" style="color: rgb(255, 255, 255)"><strong>CURRICULUM VITAE DEL SOCIO 2</strong></h5>
                                            </div>
                                            <div class="card-body p-0" style="overflow: hidden; height: 100%;">
                                                @if($inscripcionFirma->cv_socio2)
                                                    <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio2) }}" 
                                                            style="width: 100%; height: 100%; border: none;" 
                                                            frameborder="0">
                                                        Este navegador no soporta PDFs. Por favor, descargue el PDF para verlo: <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio2) }}">Descargar PDF</a>.
                                                    </iframe>
                                                @else
                                                    <span style="text-decoration: line-through;">No se ha subido el Curriculum Vitae</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Firma digital del socio 2 --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio2)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio2) }}" 
                                                    alt="Firma Digital Socio 2" 
                                                    class="img-fluid rounded" 
                                                    style="max-width: 100%; height: auto; max-height: 100px; object-fit: contain;">
                                            </div>
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido la firma digital</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Constancia de solvencia | Socio 2 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-info text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>CONSTANCIA DE SOLVENCIA</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->constancia_solvencia_socio2)
                                            <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/'.$inscripcionFirma->constancia_solvencia_socio2) }}" 
                                                alt="Constancia de solvencia del Socio 2" 
                                                class="img-fluid rounded" 
                                                style="width: auto; height: 900px; object-fit: contain;">
                                        </div>
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la constancia de solvencia</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario frontal | Socio 2 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-info text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio2)
                                        @php
                                            $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio2);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal del socio 2" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario reverso | Socio 2 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-info text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio2)
                                        @php
                                        $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio2);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Título Universitario Reverso del socio 2" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-center" style="text-decoration: underline;">DATOS DEL SOCIO 3</h4>
                    <div class="row">
                        {{-- SOCIO 3 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-success text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>INFORMACIÓN / CV / FIRMA DIGITAL</strong></h4>
                                </div>
                                <div class="row p-3">
                                    {{-- columna 0 (espacio) --}}
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

                                    {{-- Curriculum Vitae del socio 3 --}}
                                    <div class="col-md-12 text-center">
                                        <div class="card shadow-lg" style="width: 100%; max-width: 21cm; height: 20cm;">
                                            <div class="card-header bg-default text-white text-center">
                                                <h5 class="card-title" style="color: rgb(255, 255, 255)"><strong>CURRICULUM VITAE DEL SOCIO 3</strong></h5>
                                            </div>
                                            <div class="card-body p-0" style="overflow: hidden; height: 100%;">
                                                @if($inscripcionFirma->cv_socio3)
                                                    <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio3) }}" 
                                                            style="width: 100%; height: 100%; border: none;" 
                                                            frameborder="0">
                                                        Este navegador no soporta PDFs. Por favor, descargue el PDF para verlo: <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio3) }}">Descargar PDF</a>.
                                                    </iframe>
                                                @else
                                                    <span style="text-decoration: line-through;">No se ha subido el Curriculum Vitae</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Firma digital del socio 3 --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio3)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio3) }}" 
                                                    alt="Firma Digital Socio 3" 
                                                    class="img-fluid rounded" 
                                                    style="max-width: 100%; height: auto; max-height: 100px; object-fit: contain;">
                                            </div>
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido firma digital</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Constancia de solvencia | Socio 3 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-success text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>CONSTANCIA DE SOLVENCIA</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->constancia_solvencia_socio3)
                                            <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/'.$inscripcionFirma->constancia_solvencia_socio3) }}" 
                                                alt="Constancia de solvencia del Socio 3" 
                                                class="img-fluid rounded" 
                                                style="width: auto; height: 900px; object-fit: contain;">
                                        </div>
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la constacia de solvencia</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario frontal | Socio 3 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-success text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio3)
                                        @php
                                            $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio3);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal del socio 3" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario reverso | Socio 2 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-success text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio3)
                                        @php
                                        $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio3);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Título Universitario Reverso del socio 3" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 class="text-center" style="text-decoration: underline;">DATOS DEL SOCIO 4</h4>
                    <div class="row">
                        
                        {{-- SOCIO 4 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>INFORMACIÓN / CV / FIRMA DIGITAL</strong></h4>
                                </div>
                                <div class="row p-3">
                                    {{-- columna 0 (espacio) --}}
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

                                    {{-- Curriculum Vitae del socio 4 --}}
                                    <div class="col-md-12 text-center">
                                        <div class="card shadow-lg" style="width: 100%; max-width: 21cm; height: 20cm;">
                                            <div class="card-header bg-default text-white text-center">
                                                <h5 class="card-title" style="color: rgb(255, 255, 255)"><strong>CURRICULUM VITAE DEL SOCIO 1</strong></h5>
                                            </div>
                                            <div class="card-body p-0" style="overflow: hidden; height: 100%;">
                                                @if($inscripcionFirma->cv_socio4)
                                                    <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio4) }}" 
                                                            style="width: 100%; height: 100%; border: none;" 
                                                            frameborder="0">
                                                        Este navegador no soporta PDFs. Por favor, descargue el PDF para verlo: <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio4) }}">Descargar PDF</a>.
                                                    </iframe>
                                                @else
                                                    <span style="text-decoration: line-through;">No se ha subido Curriculum Vitae</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Firma digital del socio 4 --}}
                                    <div class="col-md-12 text-center">
                                        <p style="text-decoration: underline;"><strong><strong>FIRMA DIGITAL</strong></strong></p>
                                        @if($inscripcionFirma->imagen_firma_socio4)
                                            <div class="d-flex justify-content-center">
                                                <img src="{{ asset('storage/'.$inscripcionFirma->imagen_firma_socio4) }}" 
                                                    alt="Firma Digital Socio 4" 
                                                    class="img-fluid rounded" 
                                                    style="max-width: 100%; height: auto; max-height: 100px; object-fit: contain;">
                                            </div>
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido firma digital</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- Constancia de solvencia | Socio 4 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>CONSTANCIA DE SOLVENCIA</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->constancia_solvencia_socio4)
                                            <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/'.$inscripcionFirma->constancia_solvencia_socio4) }}" 
                                                alt="Constancia de solvencia del Socio 4" 
                                                class="img-fluid rounded" 
                                                style="width: auto; height: 900px; object-fit: contain;">
                                        </div>
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la constancia de solvencia</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario frontal | Socio 4 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio4)
                                        @php
                                            $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio4);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal del socio 4" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la parte frontal del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Título universitario reverso | Socio 4 --}}
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>TÍTULO UNIVERSITARIO (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_titulo_socio4)
                                        @php
                                        $imagenes = json_decode($inscripcionFirma->imagen_titulo_socio4);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Título Universitario Reverso del socio 4" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                        @endif
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el reverso del título</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                    <!-- III. DOCUMENTOS -->
                    <div class="row">

                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" ><strong>ESCRITURA DE CONSTITUCIÓN ORIGINAL</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_escritura_constitucion)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_escritura_constitucion) }}" alt="Escritura de constitución de la firma" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido la escritura de constitución</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" ><strong>REGISTRO MERCANTIL</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_registro_mercantil)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_registro_mercantil) }}" alt="Registro mercantil de la firma" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el registro mercantil</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-warning text-white text-center">
                                    <h4 class="card-title" ><strong>RTN DE LA FIRMA</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcionFirma->imagen_rtn_firma_auditora)
                                        <img src="{{ asset('storage/'.$inscripcionFirma->imagen_rtn_firma_auditora) }}" alt="RTN de la firma" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    @else
                                        <span style="text-decoration: line-through;">No se ha subido el RTN de la firma</span>
                                    @endif
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
                                        <span style="text-decoration: line-through;">No se ha subido la firma social</span>
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
                                    <span style="text-decoration: line-through;">No se ha subido la firma del representante legal</span>
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
