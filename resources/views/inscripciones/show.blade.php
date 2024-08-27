@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header text-white text-center">
                    <h3 class="card-title">
                        <strong>SOLICITUD DE INSCRIPCIÓN AL COLEGIO DE 
                            <span class="text-info">
                                {{ $inscripcion->name }} {{ $inscripcion->apellido }}</span>
                        </strong>
                    </h3>
                </div>
                

                <div class="card-body">
                    <div class="row">
                        {{-- I. Datos Personales --}}
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg" >
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>I. DATOS PERSONALES</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <p><strong><strong>PRIMER NOMBRE</strong></strong><br>{{ $inscripcion->name }}</p>
                                        <p><strong><strong>PRIMER APELLIDO</strong></strong><br> {{ $inscripcion->apellido }}</p>
                                        <p><strong><strong>DNI</strong></strong><br> {{ $inscripcion->numero_identidad }}</p>
                                        <p><strong><strong>LUGAR DE NACIMIENTO</strong></strong><br> {{ $inscripcion->direccion_residencia }}</p>
                                        <p><strong><strong>TELÉFONO FIJO</strong></strong><br> {{ $inscripcion->telefono }}</p>
                                        <p><strong><strong>CORREO ELECTRÓNICO </strong></strong><br> {{ $inscripcion->email }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong><strong>SEGUNDO NOMBRE</strong></strong><br> {{ $inscripcion->name2 }}</p>
                                        <p><strong><strong>SEGUNDO APELLIDO</strong></strong><br> {{ $inscripcion->apellido2 }}</p>
                                        <p><strong><strong>FECHA DE NACIMIENTO</strong></strong><br> {{ $inscripcion->fecha_nacimiento }}</p>
                                        <p><strong><strong>DIRECCIÓN DE RESIDENCIA</strong></strong><br> {{ $inscripcion->lugar_nacimiento }}</p>
                                        <p><strong><strong>CELULAR</strong></strong><br> {{ $inscripcion->telefono_celular }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- II. Datos Profesionales -->
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>II. DATOS PROFESIONALES</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <p><strong><strong>FECHA DE GRADUACIÓN</strong></strong><br>{{ $inscripcion->fecha_graduacion }}</p>
                                        <p><strong><strong>EMPRESA DONDE LABORA</strong></strong><br> {{ $inscripcion->nombre_empresa_trabajo_actual }}</p>
                                        <p><strong><strong>DIRECCIÓN DE LA EMPRESA</strong></strong><br> {{ $inscripcion->direccion_empresa }}</p>
                                        <p><strong><strong>TELÉFONO DE LA EMPRESA</strong></strong><br> {{ $inscripcion->telefono_empresa }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong><strong>UNIVERSIDAD</strong></strong><br> {{ $inscripcion->universidad }}</p>
                                        <p><strong><strong>CARGO</strong></strong><br> {{ $inscripcion->cargo }}</p>
                                        <p><strong><strong>CORREO DE LA EMPRESA</strong></strong><br> {{ $inscripcion->correo_empresa }}</p>
                                        <p><strong><strong>EXTENSIÓN TELEFÓNICA</strong></strong><br> {{ $inscripcion->extension_telefono_empresa }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- III. Información Adicional -->
                        <div class="col-md-4 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>III. INFORMACIÓN ADICIONAL</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-5">
                                        <p><strong><strong>ESPECIALIDAD 1</strong></strong><br>{{ $inscripcion->especialidad_1 }}</p>
                                        <p><strong><strong>FECHA</strong></strong><br> {{ $inscripcion->fecha_especialidad_1 }}</p><br>

                                        <p><strong><strong>ESPECIALIDAD 2</strong></strong><br>{{ $inscripcion->especialidad_2 }}</p>
                                        <p><strong><strong>FECHA </strong></strong><br>{{ $inscripcion->fecha_especialidad_2 }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p><strong><strong>NOMBRE LUGAR ESPECIALIZACIÓN</strong></strong><br> {{ $inscripcion->lugar_especialidad_1 }}</p><br><br><br>
                                        <p><strong><strong>NOMBRE LUGAR ESPECIALIZACIÓN</strong></strong><br> {{ $inscripcion->lugar_especialidad_2 }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- IV. Cursos de especialización -->
                        <div class="col-md-6 mb-2">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IV. CURSO DE ESPECIALIZACIÓN</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-11">
                                        <p><strong><strong>NOMBRE DEL CURSO DE ESPECIALIZACIÓN</strong></strong><br>{{ $inscripcion->nombre_curso_especializacion }}</p>
                                        <p><strong><strong>LUGAR DEL CURSO</strong></strong><br> {{ $inscripcion->lugar_curso }}</p>
                                        <p><strong><strong>FECHA DEL CURSO</strong></strong><br>{{ $inscripcion->fecha_curso }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- V. Experiencia Profesional -->
                        <div class="col-md-6 mb-4">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>V. EXPERIENCIA PROFESIONAL</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <p><strong><strong>NOMBRE DE LA EMPRESA 1</strong></strong><br>{{ $inscripcion->nombre_empresa1 }}</p><br><br>
                                        <p><strong><strong>NOMBRE DE LA EMPRESA 2</strong></strong><br> {{ $inscripcion->nombre_empresa2 }}</p>

                                    </div>
                                    <div class="col-md-3">
                                        <p><strong><strong>CARGO</strong></strong><br> {{ $inscripcion->cargo_empresa1 }}</p><br><br>
                                        <p><strong><strong>CARGO</strong></strong><br> {{ $inscripcion->cargo_empresa2 }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <p><strong><strong>DURACIÓN DE LA EMPRESA </strong></strong><br> {{ $inscripcion->duración_empresa1 }}</p><br><br>
                                        <p><strong><strong>DURACIÓN DE LA EMPRESA 2</strong></strong><br> {{ $inscripcion->duración_empresa2 }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- VI. Misiones Desempeñadas -->
                        <div class="col-md-6 mb-2">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>VI. MISIONES DESEMPEÑADAS</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-11">
                                        <p><strong><strong>COMISIONES</strong></strong><br>{{ $inscripcion->comisiones }}</p>
                                        <p><strong><strong>REPRESENTACIONES</strong></strong><br> {{ $inscripcion->representaciones }}</p>
                                        <p><strong><strong>DELEGACIONES</strong></strong><br>{{ $inscripcion->delegaciones }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- VII. Otros -->
                        <div class="col-md-6 mb-2">
                            <div class="card shadow-lg">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>VII. OTROS</strong></h4>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-11">
                                        <p><strong><strong>PUBLICACIÓN DE DOCUMENTOS</strong></strong><br>{{ $inscripcion->publicacion_documentos }}</p>
                                        <p><strong><strong>PUBLICACIONES</strong></strong><br> {{ $inscripcion->publicaciones }}</p>
                                        <p><strong><strong>PUBLICACIÓN DE UN LIBRO</strong></strong><br>{{ $inscripcion->publicacion_libro }}</p>
                                    </div>
                                </div><br>
                            </div>
                        </div>

                        <!-- VIII. Documentos -->
                        <!-- IMAGEN DEL TÍTULO UNIVERSITARIO (FRONTAL) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL TÍTULO UNIVERSITARIO (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_titulo)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_titulo);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL TÍTULO UNIVERSITARIO (REVERSO) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL TÍTULO UNIVERSITARIO (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_titulo)
                                        @php
                                        $imagenes = json_decode($inscripcion->imagen_titulo);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Título Universitario Reverso" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI FRONTAL -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Imagen DNI Frontal" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI REVERSO -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Imagen DNI Reverso" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- FOTO 1 | TAMAÑO CARNET -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>FOTO 1 | TAMAÑO CARNET</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_tamano_carnet)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="Foto 1 tamaño carnet" 
                                                style="width: 50%; height: 50%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- FOTO 2 | TAMAÑO CARNET -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>FOTO 2 | TAMAÑO CARNET</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_tamano_carnet)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="Foto 2 tamaño carnet" 
                                                style="width: 50%; height: 50%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI BENEFICIARIO 1 (FRONTAL) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI BENEFICIARIO 1 (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario1)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="DNI Beneficiario 1 Frontal" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI BENEFICIARIO 1 (REVERSO) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI | BENEFICIARIO 1 (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario1)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="DNI Beneficiario 1 Reverso" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI BENEFICIARIO 2 (FRONTAL) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI | BENEFICIARIO 2 (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario2)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="DNI Beneficiario 2 Frontal" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <!-- IMAGEN DEL DNI BENEFICIARIO 2 (REVERSO) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI | BENEFICIARIO 2 (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario2)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="DNI Beneficiario 2 Reverso" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI BENEFICIARIO 3 (FRONTAL) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI | BENEFICIARIO 3 (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario3)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="DNI Beneficiario 3 Frontal" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL DNI BENEFICIARIO 3 (REVERSO) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL DNI | BENEFICIARIO 3 (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_dni_beneficiario3)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="DNI Beneficiario 3 Reverso" 
                                                style="width: 80%; height: 80%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL RTN (FRONTAL) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL RTN (FRONTAL)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_rtn)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_rtn);
                                        @endphp
                                        @if(count($imagenes) > 0)
                                            <img src="{{ asset('storage/' . $imagenes[0]) }}" alt="RTN Frontal" 
                                                style="width: 90%; height: 90%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- IMAGEN DEL RTN (REVERSO) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>IMAGEN DEL RTN (REVERSO)</strong></h4>
                                </div>
                                <div class="card-body d-flex justify-content-center align-items-center p-0">
                                    @if($inscripcion->imagen_rtn)
                                        @php
                                            $imagenes = json_decode($inscripcion->imagen_rtn);
                                        @endphp
                                        @if(count($imagenes) > 1)
                                            <img src="{{ asset('storage/' . $imagenes[1]) }}" alt="RTN Reverso" 
                                                style="width: 50%; height: 50%; object-fit: contain;">
                                        @else
                                            <p>No Disponible</p>
                                        @endif
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- CV (Curriculum Vitae) -->
                        <div class="col-md-6 mb-4 d-flex justify-content-center">
                            <div class="card shadow-lg" style="width: 100%; max-width: 21.59cm; height: 27.94cm;">
                                <div class="card-header bg-default text-white text-center">
                                    <h4 class="card-title" style="color: rgb(255, 255, 255)"><strong>CURRICULUM VITAE (CV)</strong></h4>
                                </div>
                                <div class="card-body p-0" style="overflow: hidden; height: 100%;">
                                    @if($inscripcion->cv)
                                        <iframe src="{{ asset('storage/' . $inscripcion->cv) }}" 
                                                style="width: 100%; height: 100%; border: none;" 
                                                frameborder="0">
                                            Este navegador no soporta PDFs. Por favor, descargue el PDF para verlo: <a href="{{ asset('storage/' . $inscripcion->cv) }}">Descargar PDF</a>.
                                        </iframe>
                                    @else
                                        <p>No Disponible</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-12 text-center">

                        <a href="{{ route('inscripciones.index') }}" class="btn btn-info">
                            <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                            Volver
                        </a>

                        <!-- Botón para previsualizar el PDF -->
                        <a href="{{ route('inscripcion.pdf.preview', ['id' => $inscripcion->id]) }}" class="btn btn-secondary">
                            <i class="fas fa-eye" style="margin-right: 8px;"></i>
                            Ver PDF
                        </a>
                
                        <!-- Botón para descargar el PDF -->
                        <a href="{{ route('inscripcion.pdf.download', ['id' => $inscripcion->id]) }}" class="btn btn-primary">
                            <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                            Descargar PDF
                        </a>

                    </div>
                </div><br>
              
            </div>
        </div>
    </div>
</div>
@endsection
