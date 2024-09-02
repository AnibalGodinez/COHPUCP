@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>INSCRIPCIÓN DE FIRMA DE AUDITAORÍA</strong></h3>
                </div><br>

                <!-- Mensaje de éxito -->
                @if(session('success'))
                <div class="text-center mb-3">
                    <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                        {{ session('success') }}
                        <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('inscripcion_firmas.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row" style="margin-bottom: 20px;">

                            <!-- I. Datos de la sociedad -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">I. DATOS DE LA SOCIEDAD</h4>
                            </div>

                            <!-- NOMBRE DE LA SOCIEDAD -->
                            <div class="col-md-4">
                                <label for="nombre_sociedad">
                                    <i class="fas fa-building" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DE LA SOCIEDAD</strong>
                                </label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="nombre_sociedad" 
                                name="nombre_sociedad"
                                placeholder="Ingrese el nombre de la sociedad" 
                                value="{{ old('nombre_sociedad') }}">
                                @if ($errors->has('nombre_sociedad'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('nombre_sociedad') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Nº DE INSCRIPCIÓN DE LA SOCIEDAD EN EL REGISTRO PÚBLICO DE COMERCIO -->
                            <div class="col-md-4">
                                <label for="num_inscripcion_registro_publico_comercio">
                                    <i class="fas fa-file-contract" style="margin-right: 8px;"></i>
                                    <strong>Nº DE INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong>
                                </label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="num_inscripcion_registro_publico_comercio" 
                                name="num_inscripcion_registro_publico_comercio"
                                placeholder="Ingrese el nº de la sociedad en el registro público de comercio" 
                                value="{{ old('num_inscripcion_registro_publico_comercio') }}">
                                @if ($errors->has('num_inscripcion_registro_publico_comercio'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('num_inscripcion_registro_publico_comercio') }}
                                    </div>
                                @endif
                            </div>

                            <!-- FECHA DE CONSTITUCIÓN -->
                            <div class="col-md-2">
                                <label for="fecha_constitucion">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong>
                                </label>
                                <input 
                                type="date" 
                                name="fecha_constitucion" 
                                id="fecha_constitucion" 
                                class="form-control @error('fecha_constitucion') is-invalid @enderror" 
                                value="{{ old('fecha_constitucion') }}" onchange="validateCourseDate()" 
                                required>
                                <span id="course-date-error" style="color: rgb(235, 13, 13); display: none;">La fecha de constitución no puede ser posterior a la fecha actual</span>
                                @error('fecha_constitucion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- REGISTRO TRIBUTARIO NACIONAL -->
                            <div class="col-md-2">
                                <label for="registro_tributario_nacional">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>Nº DE REGISTRO TRIBUTARIO NACIONAL</strong>
                                </label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="registro_tributario_nacional" 
                                name="registro_tributario_nacional"
                                placeholder="Ingrese el registro tributario nacional" 
                                value="{{ old('registro_tributario_nacional') }}">
                                @if ($errors->has('registro_tributario_nacional'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('registro_tributario_nacional') }}
                                    </div>
                                @endif
                            </div>

                            <!-- Nº DE INSCRIPCIÓN DE LA CÁMARA DE COMERCIO -->
                            <div class="col-md-4">
                                <label for="num_inscripcion_camara_comercio">
                                    <i class="fas fa-file-signature" style="margin-right: 8px;"></i>
                                    <strong>Nº DE INSCRIPCIÓN EN LA CÁMARA DE COMERCIO</strong>
                                </label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="num_inscripcion_camara_comercio" 
                                name="num_inscripcion_camara_comercio"
                                placeholder="Ingrese el nº de inscripción de la cámara de comercio" 
                                value="{{ old('num_inscripcion_camara_comercio') }}">
                                @if ($errors->has('num_inscripcion_camara_comercio'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('num_inscripcion_camara_comercio') }}
                                    </div>
                                @endif
                            </div>

                            <!-- DIRECCIÓN DE LA FIRMA -->
                            <div class="col-md-8">
                                <label for="direccion">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:rgb(255, 0, 0)"></i>
                                    <strong>DIRECCIÓN DE LA FIRMA</strong>
                                </label>
                                <input 
                                type="text" 
                                class="form-control" 
                                id="direccion" 
                                name="direccion"
                                placeholder="Ingrese la dirección de la firma de auditoría"  
                                value="{{ old('direccion') }}">
                                @if ($errors->has('direccion'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('direccion') }}
                                    </div>
                                @endif
                            </div>

                            <!-- TELÉFONO -->
                            <div class="col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone-alt" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO FIJO</strong>
                                </label>                                                             
                                    <input 
                                    id="telefono" 
                                    type="text" 
                                    class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                                    name="telefono"
                                    placeholder="Ingrese el número de teléfono de la firma de auditoría"
                                    maxlength="15" 
                                    value="{{ old('telefono') }}">

                                @error('telefono')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- CELULAR-->
                            <div class="col-md-3">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR</strong>
                                </label>                                
                                    <input 
                                    id="celular" 
                                    type="text" 
                                    class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" 
                                    name="celular" 
                                    placeholder="Ingrese el número de celular de la firma de auditoría"
                                    maxlength="15" 
                                    value="{{ old('celular') }}">

                                @error('celular')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- CORREO ELECTRÓNICO -->
                            <div class="col-md-4">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px; color:rgb(0, 123, 255)"></i>
                                    <strong>CORREO ELECTRÓNICO</strong>
                                </label>                                                                                            
                                <input 
                                id="email" 
                                type="email" 
                                class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                name="email" 
                                placeholder="Ingrese el correo electrónico de la firma de auditoría"
                                value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>                     

                        <div class="form-group row">

                            <!-- II. DATOS DE LOS SOCIOS -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">II. DATOS DE LOS SOCIOS</h4>
                            </div>

                            <!-- Datos del Socio 1 -->
                            <div class="col-12">
                                <h5 class="mt-3" style="text-decoration: underline;"><strong>DATOS DEL SOCIO 1</strong></h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="primer_nombre_socio1"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_nombre_socio1') is-invalid @enderror" id="primer_nombre_socio1" name="primer_nombre_socio1" placeholder="Ingrese el primer nombre del socio 1" value="{{ old('primer_nombre_socio1') }}" required>
                                        @error('primer_nombre_socio1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_nombre_socio1"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('segundo_nombre_socio1') is-invalid @enderror" id="segundo_nombre_socio1" name="segundo_nombre_socio1" placeholder="Ingrese el segundo nombre del socio 1" value="{{ old('segundo_nombre_socio1') }}">
                                        @error('segundo_nombre_socio1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="primer_apellido_socio1"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_apellido_socio1') is-invalid @enderror" id="primer_apellido_socio1" name="primer_apellido_socio1" placeholder="Ingrese el primer apellido del socio 1" value="{{ old('primer_apellido_socio1') }}" required>
                                        @error('primer_apellido_socio1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_apellido_socio1"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras"  class="form-control @error('segundo_apellido_socio1') is-invalid @enderror" id="segundo_apellido_socio1" name="segundo_apellido_socio1" placeholder="Ingrese el segundo apellido del socio 1" value="{{ old('segundo_apellido_socio1') }}">
                                        @error('segundo_apellido_socio1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="num_colegiacion_socio1"><i class="fas fa-address-card" style="margin-right: 8px;"></i><strong>NÚMERO DE COLEGIACIÓN</strong></label>
                                        <input type="text" class="form-control @error('num_colegiacion_socio1') is-invalid @enderror" id="num_colegiacion_socio1" name="num_colegiacion_socio1" placeholder="Ingrese el número de colegiación del socio 1" value="{{ old('num_colegiacion_socio1') }}" required>
                                        @error('num_colegiacion_socio1')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <script>
                                        document.getElementById('num_colegiacion_socio1').addEventListener('input', function (e) {
                                            var input = e.target.value.replace(/\D/g, '');
                                            var formatted = '';
                                            if (input.length <= 4) {
                                                formatted = input;
                                            } else if (input.length <= 6) {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4);
                                            } else {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4, 6) + '-' + input.slice(6, 10);
                                            }
                                            e.target.value = formatted;
                                        });
                                    </script>
                                </div>

                                <!-- Imagen de la Firma Digital del Socio 1 -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="imagen_firma_socio1" class="btn btn-info btn-simple">
                                            <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                            <strong>Imagen de la Firma</strong>
                                        </label>
                                        <input 
                                        type="file" 
                                        id="imagen_firma_socio1" 
                                        name="imagen_firma_socio1[]" 
                                        accept="image/*" 
                                        multiple class="form-control-file">
                                        
                                        <div id="previewImagenFirmaSocio1"></div>

                                        @error('imagen_firma_socio1.*')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <!-- Datos del Socio 2 -->
                            <div class="col-12">
                                <h5 class="mt-3" style="text-decoration: underline;"><strong>DATOS DEL SOCIO 2</strong></h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="primer_nombre_socio2"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_nombre_socio2') is-invalid @enderror" id="primer_nombre_socio2" name="primer_nombre_socio2" placeholder="Ingrese el primer nombre del socio 1" value="{{ old('primer_nombre_socio2') }}" required>
                                        @error('primer_nombre_socio2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_nombre_socio2"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('segundo_nombre_socio2') is-invalid @enderror" id="segundo_nombre_socio2" name="segundo_nombre_socio2" placeholder="Ingrese el segundo nombre del socio 1" value="{{ old('segundo_nombre_socio2') }}">
                                        @error('segundo_nombre_socio2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="primer_apellido_socio2"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_apellido_socio2') is-invalid @enderror" id="primer_apellido_socio2" name="primer_apellido_socio2" placeholder="Ingrese el primer apellido del socio 1" value="{{ old('primer_apellido_socio2') }}" required>
                                        @error('primer_apellido_socio2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_apellido_socio2"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('segundo_apellido_socio2') is-invalid @enderror" id="segundo_apellido_socio2" name="segundo_apellido_socio2" placeholder="Ingrese el segundo apellido del socio 1" value="{{ old('segundo_apellido_socio2') }}">
                                        @error('segundo_apellido_socio2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="num_colegiacion_socio2"><i class="fas fa-address-card" style="margin-right: 8px;"></i><strong>Número de Colegiación</strong></label>
                                        <input type="text" class="form-control @error('num_colegiacion_socio2') is-invalid @enderror" id="num_colegiacion_socio2" name="num_colegiacion_socio2" placeholder="Ingrese el número de colegiación del socio 1" value="{{ old('num_colegiacion_socio2') }}" required>
                                        @error('num_colegiacion_socio2')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <script>
                                        document.getElementById('num_colegiacion_socio2').addEventListener('input', function (e) {
                                            var input = e.target.value.replace(/\D/g, '');
                                            var formatted = '';
                                            if (input.length <= 4) {
                                                formatted = input;
                                            } else if (input.length <= 6) {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4);
                                            } else {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4, 6) + '-' + input.slice(6, 10);
                                            }
                                            e.target.value = formatted;
                                        });
                                    </script>
                                </div>
                                <!-- Imagen de la Firma Digital del Socio 2 -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="imagen_firma_socio2" class="btn btn-info btn-simple">
                                            <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                            <strong>Imagen de la Firma</strong>
                                        </label>

                                        <input 
                                        type="file" 
                                        id="imagen_firma_socio2" 
                                        name="imagen_firma_socio2[]" 
                                        accept="image/*" 
                                        multiple class="form-control-file">

                                        <div id="previewImagenFirmaSocio2"></div>

                                        @error('imagen_firma_socio2.*')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                            </div>
                            
                            <!-- Datos del Socio 3 -->
                            <div class="col-12">
                                <h5 class="mt-3" style="text-decoration: underline;"><strong>DATOS DEL SOCIO 3</strong></h5>
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="primer_nombre_socio3"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_nombre_socio3') is-invalid @enderror" id="primer_nombre_socio3" name="primer_nombre_socio3" placeholder="Ingrese el primer nombre del socio 1" value="{{ old('primer_nombre_socio3') }}" required>
                                        @error('primer_nombre_socio3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_nombre_socio3"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO NOMBRE</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('segundo_nombre_socio3') is-invalid @enderror" id="segundo_nombre_socio3" name="segundo_nombre_socio3" placeholder="Ingrese el segundo nombre del socio 1" value="{{ old('segundo_nombre_socio3') }}">
                                        @error('segundo_nombre_socio3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="primer_apellido_socio3"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>PRIMER APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('primer_apellido_socio3') is-invalid @enderror" id="primer_apellido_socio3" name="primer_apellido_socio3" placeholder="Ingrese el primer apellido del socio 1" value="{{ old('primer_apellido_socio3') }}" required>
                                        @error('primer_apellido_socio3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-2">
                                        <label for="segundo_apellido_socio3"><i class="fas fa-user" style="margin-right: 8px;"></i><strong>SEGUNDO APELLIDO</strong></label>
                                        <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" title="En este campo sólo se permiten letras" class="form-control @error('segundo_apellido_socio3') is-invalid @enderror" id="segundo_apellido_socio3" name="segundo_apellido_socio3" placeholder="Ingrese el segundo apellido del socio 1" value="{{ old('segundo_apellido_socio3') }}">
                                        @error('segundo_apellido_socio3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="num_colegiacion_socio3"><i class="fas fa-address-card" style="margin-right: 8px;"></i><strong>NÚMERO DE COLEGIACIÓN</strong></label>
                                        <input type="text" class="form-control @error('num_colegiacion_socio3') is-invalid @enderror" id="num_colegiacion_socio3" name="num_colegiacion_socio3" placeholder="Ingrese el número de colegiación del socio 1" value="{{ old('num_colegiacion_socio3') }}" required>
                                        @error('num_colegiacion_socio3')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <script>
                                        document.getElementById('num_colegiacion_socio3').addEventListener('input', function (e) {
                                            var input = e.target.value.replace(/\D/g, '');
                                            var formatted = '';
                                            if (input.length <= 4) {
                                                formatted = input;
                                            } else if (input.length <= 6) {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4);
                                            } else {
                                                formatted = input.slice(0, 4) + '-' + input.slice(4, 6) + '-' + input.slice(6, 10);
                                            }
                                            e.target.value = formatted;
                                        });
                                    </script>
                                </div>
                                <!-- Imagen de la Firma Digital del Socio 3 -->
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <label for="imagen_firma_socio3" class="btn btn-info btn-simple">
                                            <strong>Imagen de la Firma
                                                </strong>
                                            </label>

                                        <input 
                                        type="file" 
                                        id="imagen_firma_socio3" 
                                        name="imagen_firma_socio3[]" 
                                        accept="image/*" 
                                        multiple class="form-control-file">

                                        <div id="previewImagenFirmaSocio3"></div>

                                        @error('imagen_firma_socio3.*')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                

                                <!-- Imagen de la Firma social -->
                                <div class="row mt-6">
                                    <div class="col-md-12">
                                        <label for="imagen_firma_social" class="btn btn-info btn-simple">
                                            <strong>Imagen de la Firma social
                                                </strong>
                                            </label>

                                        <input 
                                        type="file" 
                                        id="imagen_firma_social" 
                                        name="imagen_firma_social[]" 
                                        accept="image/*" 
                                        multiple class="form-control-file">

                                        <div id="previewImagenFirmaSocial"></div>

                                        @error('imagen_firma_social.*')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Imagen de la Firma Digital del Socio 3 -->
                                <div class="row mt-6">
                                    <div class="col-md-12">
                                        <label for="imagen_firma_representante_legal" class="btn btn-info btn-simple">
                                            <strong>Imagen de la Firma representante legal
                                                </strong>
                                            </label>

                                        <input 
                                        type="file" 
                                        id="imagen_firma_representante_legal" 
                                        name="imagen_firma_representante_legal[]" 
                                        accept="image/*" 
                                        multiple class="form-control-file">

                                        <div id="previewImagenFirmaRepresentanteLegal"></div>

                                        @error('imagen_firma_representante_legal.*')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                    Inviar solicitud de inscripción
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // PREVISUALIZACIÓN DE LA FIRMA DIGITAL DEL SOCIO 1
    function readURL(input, previewElementId) {
        if (input.files) {
            const previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = "";
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.className = "img-thumbnail";
                    imgElement.style.maxWidth = "1500px";
                    imgElement.style.marginRight = "100px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_firma_socio1').addEventListener('change', function() {
        readURL(this, 'previewImagenFirmaSocio1');
    });

    // PREVISUALIZACIÓN DE LA FIRMA DIGITAL DEL SOCIO 2
    function readURL(input, previewElementId) {
        if (input.files) {
            const previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = "";
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.className = "img-thumbnail";
                    imgElement.style.maxWidth = "150px";
                    imgElement.style.marginRight = "10px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_firma_socio2').addEventListener('change', function() {
        readURL(this, 'previewImagenFirmaSocio2');
    });

    // PREVISUALIZACIÓN DE LA FIRMA DIGITAL DEL SOCIO 3
    function readURL(input, previewElementId) {
        if (input.files) {
            const previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = "";
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.className = "img-thumbnail";
                    imgElement.style.maxWidth = "150px";
                    imgElement.style.marginRight = "10px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_firma_socio3').addEventListener('change', function() {
        readURL(this, 'previewImagenFirmaSocio3');
    });

    // PREVISUALIZACIÓN DE LA FIRMA SOCIAL
    function readURL(input, previewElementId) {
        if (input.files) {
            const previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = "";
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.className = "img-thumbnail";
                    imgElement.style.maxWidth = "150px";
                    imgElement.style.marginRight = "10px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_firma_social').addEventListener('change', function() {
        readURL(this, 'previewImagenFirmaSocial');
    });

    // PREVISUALIZACIÓN DE LA FIRMA DEL REPRESENTANTE LEGAL
    function readURL(input, previewElementId) {
        if (input.files) {
            const previewContainer = document.getElementById(previewElementId);
            previewContainer.innerHTML = "";
            Array.from(input.files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.className = "img-thumbnail";
                    imgElement.style.maxWidth = "150px";
                    imgElement.style.marginRight = "10px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_firma_representante_legal').addEventListener('change', function() {
        readURL(this, 'previewImagenFirmaRepresentanteLegal');
    });

</script>
@endsection
