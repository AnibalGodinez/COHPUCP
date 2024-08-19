@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>Solicitud de inscribirse al colegio de {{ $inscripcion->name }} {{ $inscripcion->apellido }} </strong></h3>
                </div>

                <div class="card-body">

                    <div class="form-group row">
                        <div class="col-md-4">
                            {{-- I. Datos Personales --}}
                            <h4><strong>I. DATOS PERSONALES</strong></h4>

                            <p><strong>PRIMER NOMBRE</strong> {{ $inscripcion->name }}</p>
                            <p><strong>SEGUNDO NOMBRE</strong> {{ $inscripcion->name2 }}</p>
                            <p><strong>PRIMER APELLIDO</strong> {{ $inscripcion->apellido }}</p>
                            <p><strong>SEGUNDO APELLIDO</strong> {{ $inscripcion->apellido2 }}</p>
                            <p><strong>DNI</strong> {{ $inscripcion->numero_identidad }}</p>
                            <p><strong>FECHA DE NACIMIENTO</strong> {{ $inscripcion->fecha_nacimiento }}</p>
                            <p><strong>DIRECCIÓN DE RESIDENCIA</strong> {{ $inscripcion->direccion_residencia }}</p>
                            <p><strong>TELÉFONO FIJO</strong> {{ $inscripcion->telefono }}</p>
                            <p><strong>CELULAR</strong> {{ $inscripcion->telefono_celular }}</p>
                            <p><strong>CORREO ELECTRÓNICO</strong> {{ $inscripcion->email }}</p>
                        </div>

                        <div class="col-md-4">
                            {{-- II. Datos Profesionales --}}
                            <h4><strong>II. DATOS PROFESIONALES</strong></h4>

                            <p><strong>FECHA DE GRADUACIÓN</strong> {{ $inscripcion->fecha_graduacion }}</p>
                            <p><strong>UNIVERSIDAD</strong> {{ $inscripcion->universidad }}</p>
                            <p><strong>NOMBRE DE LA EMPRESA DONDE LABORA</strong> {{ $inscripcion->nombre_empresa_trabajo_actual }}</p>
                            <p><strong>CARGO</strong> {{ $inscripcion->cargo }}</p>
                            <p><strong>DIRECCIÓN DE LA EMPRESA</strong> {{ $inscripcion->direccion_empresa }}</p>
                            <p><strong>CORREO DE LA EMPRESA</strong> {{ $inscripcion->correo_empresa }}</p>
                            <p><strong>TELÉFONO DE LA EMPRESA</strong> {{ $inscripcion->telefono_empresa }}</p>
                            <p><strong>EXTENSIÓN TELEFÓNICA</strong> {{ $inscripcion->extension_telefono_empresa }}</p>

                            <p><strong>Documento 1:</strong> @if($inscripcion->documento1) <a href="{{ asset('storage/' . $inscripcion->documento1) }}" target="_blank">Ver Documento</a> @else No Disponible @endif</p>
                            <p><strong>Documento 2:</strong> @if($inscripcion->documento2) <a href="{{ asset('storage/' . $inscripcion->documento2) }}" target="_blank">Ver Documento</a> @else No Disponible @endif</p>
                        </div>

                        <div class="col-md-4">
                            {{-- III. Información Adicional --}}
                            <h4><strong>III. INFORMACIÓN ADICIONAL</strong></h4>

                            <p><strong>ESPECIALIDAD 1</strong> {{ $inscripcion->especialidad_1 }}</p>
                            <p><strong>LUGAR DONDE REALIZÓ ESPECIALIZACIÓN</strong> {{ $inscripcion->lugar_especialidad_1 }}</p>
                            <p><strong>FECHA</strong> {{ $inscripcion->fecha_especialidad_1 }}</p>

                            <p><strong>ESPECIALIDAD 2</strong> {{ $inscripcion->especialidad_2 }}</p>
                            <p><strong>LUGAR DONDE REALIZÓ ESPECIALIZACIÓN</strong> {{ $inscripcion->lugar_especialidad_2 }}</p>
                            <p><strong>FECHA</strong> {{ $inscripcion->fecha_especialidad_2 }}</p>
                        </div>

                    </div><br>

                    <div class="form-group row">
                        <div class="col-md-2">
                            {{-- ESPACIO --}}
                        </div>
                        
                        <div class="col-md-4">
                            {{-- IV. Cursos de especialización --}}
                            <h4><strong>IV. CURSOS DE ESPECIALIZACIÓN</strong></h4>

                            <p><strong>LUGAR DEL CURSO</strong> {{ $inscripcion->nombre_curso_especializacion }}</p>
                            <p><strong>LUGAR DONDE REALIZÓ ESPECIALIZACIÓN</strong> {{ $inscripcion->lugar_curso }}</p>
                            <p><strong>FECHA DEL CURSO</strong> {{ $inscripcion->fecha_curso }}</p>
                        </div>

                        <div class="col-md-4">
                            {{-- V. Experiencia Profesional --}}
                            <h4><strong>V. EXPERIENCIA PROFESIONAL</strong></h4>

                            <p><strong>NOMBRE DE LA EMPRESA 1</strong> {{ $inscripcion->nombre_empresa1 }}</p>
                            <p><strong>CARGO DE LA EMPRESA 1</strong> {{ $inscripcion->cargo_empresa1 }}</p>
                            <p><strong>DURACIÓN DE LA EMPRESA 1</strong> {{ $inscripcion->duración_empresa1 }}</p>

                            <p><strong>NOMBRE DE LA EMPRESA 2</strong> {{ $inscripcion->nombre_empresa2 }}</p>
                            <p><strong>CARGO DE LA EMPRESA 2</strong> {{ $inscripcion->cargo_empresa2 }}</p>
                            <p><strong>DURACIÓN DE LA EMPRESA 2</strong> {{ $inscripcion->duración_empresa2 }}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6">
                            {{-- VI. Misiones Desempeñadas --}}
                            <h4><strong>VI. MISIONES DESEMPEÑADAS</strong></h4>

                            <p><strong>COMISIONES</strong> {{ $inscripcion->comisiones }}</p>
                            <p><strong>REPRESENTACIONES</strong> {{ $inscripcion->representaciones }}</p>
                            <p><strong>DELEGACIONES</strong> {{ $inscripcion->delegaciones }}</p>
                        </div>

                        <div class="col-md-6">
                            {{-- VII. Otros --}}
                            <h4><strong>VII. OTROS</strong></h4>

                            <p><strong>PUBLICACIÓN DE DOCUMENTOS</strong> {{ $inscripcion->publicacion_documentos }}</p>
                            <p><strong>PUBLICACIONES</strong> {{ $inscripcion->publicaciones }}</p>
                            <p><strong>PUBLICACIÓN DE UN LIBRO</strong> {{ $inscripcion->publicacion_libro }}</p>
                        </div>
                    </div>

                    <!-- VIII. DOCUMENTOS -->
                    <div class="form-group row">
                        <div class="col-12 text-center mb-0">
                            <h4 style="text-decoration: underline;">VIII. DOCUMENTOS</h4>
                        </div>
                        
                        <!-- Imagen del Título Universitario -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>Título Universitario</strong></h5>
                            @if($inscripcion->imagen_titulo)
                                @foreach(json_decode($inscripcion->imagen_titulo) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Título Universitario" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imagen del DNI -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>DNI</strong></h5>
                            @if($inscripcion->imagen_dni)
                                @foreach(json_decode($inscripcion->imagen_dni) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="DNI" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imagen del Tamaño Carnet -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>Foto Tamaño Carnet</strong></h5>
                            @if($inscripcion->imagen_tamano_carnet)
                                @foreach(json_decode($inscripcion->imagen_tamano_carnet) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="Tamaño Carnet" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Currículum Vitae -->
                        <div class="col-md-6 mb-2">
                            <h5><strong>Currículum Vitae</strong></h5>
                            </label>
                            @if($inscripcion->cv)
                                <iframe src="{{ asset('storage/' . $inscripcion->cv) }}" type="application/pdf" style="width: 100%; height: 300px;" frameborder="0"></iframe>
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imágenes DNI Beneficiario 1 -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>DNI del beneficiario 1</strong></h5>
                            </label>
                            @if($inscripcion->imagen_dni_beneficiario1)
                                @foreach(json_decode($inscripcion->imagen_dni_beneficiario1) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="DNI Beneficiario 1" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imágenes DNI Beneficiario 2 -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>DNI del beneficiario 2</strong></h5>
                            </label>
                            @if($inscripcion->imagen_dni_beneficiario2)
                                @foreach(json_decode($inscripcion->imagen_dni_beneficiario2) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="DNI Beneficiario 2" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imágenes DNI Beneficiario 3 -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>DNI del beneficiario 3</strong></h5>
                            </label>
                            @if($inscripcion->imagen_dni_beneficiario3)
                                @foreach(json_decode($inscripcion->imagen_dni_beneficiario3) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="DNI Beneficiario 3" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                        <!-- Imagen del RTN -->
                        <div class="col-md-6 mb-3">
                            <h5><strong>RTN</strong></h5>
                            @if($inscripcion->imagen_rtn)
                                @foreach(json_decode($inscripcion->imagen_rtn) as $imagen)
                                    <img src="{{ asset('storage/' . $imagen) }}" alt="RTN" style="max-width: 100%; height: auto; margin-bottom: 10px;">
                                @endforeach
                            @else
                                No Disponible
                            @endif
                        </div>

                    </div>

                    

                    <div class="text-center mt-3">
                        <a href="{{ route('inscripciones.index') }}" class="btn btn-primary">Volver a la Lista</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
