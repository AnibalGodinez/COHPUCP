@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>SOLICITUD DE INSCRIPCIÓN DE FIRMA AL COLEGIO</strong></h3>
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
                      
                        <div class="form-group row">
                            <!-- I. DATOS DE LA SOCIEDAD -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;"><strong>I. DATOS DE LA SOCIEDAD</strong></h4>
                            </div>
                        
                            <!-- CAMPO DEL NOMBRE DE LA SOCIEDAD -->
                            <div class="col-md-3">
                                <label for="nombre_sociedad">
                                    <i class="fas fa-building" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DE LA SOCIEDAD</strong>
                                </label>
                                <input type="text" class="form-control @error('nombre_sociedad') is-invalid @enderror" id="nombre_sociedad" name="nombre_sociedad" value="{{ old('nombre_sociedad') }}" placeholder="Ingrese el nombre de la sociedad" required>
                                @error('nombre_sociedad')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DEL NÚMERO DE INSCRIPCIÓN EN REGISTRO PÚBLICO DE COMERCIO -->
                            <div class="col-md-3">
                                <label for="num_inscripcion_registro_publico_comercio">
                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                    <strong>Nº INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong>
                                </label>
                                <input type="text" class="form-control @error('num_inscripcion_registro_publico_comercio') is-invalid @enderror" id="num_inscripcion_registro_publico_comercio" name="num_inscripcion_registro_publico_comercio" value="{{ old('num_inscripcion_registro_publico_comercio') }}" placeholder="Ingrese el número de inscripción">
                                @error('num_inscripcion_registro_publico_comercio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE FECHA DE CONSTITUCIÓN -->
                            <div class="col-md-2">
                                <label for="fecha_constitucion">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong>
                                </label>
                                <input type="date" class="form-control @error('fecha_constitucion') is-invalid @enderror" id="fecha_constitucion" name="fecha_constitucion" value="{{ old('fecha_constitucion') }}" placeholder="Seleccione la fecha" required>
                                @error('fecha_constitucion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE REGISTRO TRIBUTARIO NACIONAL -->
                            <div class="col-md-2">
                                <label for="registro_tributario_nacional">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>Nº REGISTRO TRIBUTARIO NACIONAL</strong>
                                </label>
                                <input type="text" class="form-control @error('registro_tributario_nacional') is-invalid @enderror" id="registro_tributario_nacional" name="registro_tributario_nacional" value="{{ old('registro_tributario_nacional') }}" placeholder="Ingrese el registro tributario">
                                @error('registro_tributario_nacional')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DEL NÚMERO DE INSCRIPCIÓN EN CÁMARA DE COMERCIO -->
                            <div class="col-md-2">
                                <label for="num_inscripcion_camara_comercio">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                    <strong>Nº INSCRIPCIÓN CÁMARA DE COMERCIO</strong>
                                </label>
                                <input type="text" class="form-control @error('num_inscripcion_camara_comercio') is-invalid @enderror" id="num_inscripcion_camara_comercio" name="num_inscripcion_camara_comercio" value="{{ old('num_inscripcion_camara_comercio') }}" placeholder="Ingrese el número de inscripción">
                                @error('num_inscripcion_camara_comercio')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DEL MUNICIPIO DONDE REALIZA LA SOLICITUD -->
                            <div class="col-md-2">
                                <label for="municipio_realiza_solicitud">
                                    <i class="fas fa-city" style="margin-right: 8px; color:rgb(20, 17, 204)"></i>
                                    <strong>MUNICIPIO DONDE REALIZA LA SOLICITUD</strong>
                                </label>
                                <input type="text" class="form-control @error('municipio_realiza_solicitud') is-invalid @enderror" id="municipio_realiza_solicitud" name="municipio_realiza_solicitud" value="{{ old('municipio_realiza_solicitud') }}" placeholder="Ingrese el municipio">
                                @error('municipio_realiza_solicitud')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE DIRECCIÓN -->
                            <div class="col-md-4">
                                <label for="direccion">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:rgb(235, 13, 13)"></i>
                                    <strong>DIRECCIÓN DE LA FIRMA</strong>
                                </label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" name="direccion" value="{{ old('direccion') }}" placeholder="Ingrese la dirección">
                                @error('direccion')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE TELÉFONO -->
                            <div class="col-md-2">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO</strong>
                                </label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{ old('telefono') }}" placeholder="Ingrese el número de teléfono">
                                @error('telefono')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE CELULAR -->
                            <div class="col-md-2">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR</strong>
                                </label>
                                <input type="text" class="form-control @error('celular') is-invalid @enderror" id="celular" name="celular" value="{{ old('celular') }}" placeholder="Ingrese el número de celular" required>
                                @error('celular')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <!-- CAMPO DE CORREO ELECTRÓNICO -->
                            <div class="col-md-2">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO</strong>
                                </label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese el correo electrónico" required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                             
                        <!-- II. DATOS DE LOS SOCIOS -->
                        <div class="col-12 text-center mb-0">
                            <h4 style="text-decoration: underline;"><strong>II. DATOS DE LOS SOCIOS</strong></h4>
                        </div>

                        <!-- DATOS DEL SOCIO 1 -->
                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 1:</strong></h6>
                            </div>

                            <!-- PRIMER NOMBRE -->
                            <div class="col-md-2">
                                <label for="primer_nombre_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_nombre_socio1') is-invalid @enderror" id="primer_nombre_socio1" name="primer_nombre_socio1" value="{{ old('primer_nombre_socio1') }}" placeholder="Ingrese el primer nombre" required>
                                @error('primer_nombre_socio1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_nombre_socio1') is-invalid @enderror" id="segundo_nombre_socio1" name="segundo_nombre_socio1" value="{{ old('segundo_nombre_socio1') }}" placeholder="Ingrese el segundo nombre">
                                @error('segundo_nombre_socio1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_apellido_socio1') is-invalid @enderror" id="primer_apellido_socio1" name="primer_apellido_socio1" value="{{ old('primer_apellido_socio1') }}" placeholder="Ingrese el primer apellido" required>
                                @error('primer_apellido_socio1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_apellido_socio1') is-invalid @enderror" id="segundo_apellido_socio1" name="segundo_apellido_socio1" value="{{ old('segundo_apellido_socio1') }}" placeholder="Ingrese el segundo apellido">
                                @error('segundo_apellido_socio1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio1">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control @error('num_colegiacion_socio1') is-invalid @enderror" id="num_colegiacion_socio1" name="num_colegiacion_socio1" value="{{ old('num_colegiacion_socio1') }}" placeholder="Ingrese el número de colegiación">
                                @error('num_colegiacion_socio1')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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

                            <!-- Campo para el Curriculum Vitae del socio 1 -->
                            <div class="col-md-6 mb-2">
                                <label for="cv_socio1" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Currículum vitae</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('cv_socio1') is-invalid @enderror" id="cv_socio1" name="cv_socio1" aria-label="Currículum vitae socio 1" accept="application/pdf" onchange="previewFile('cv_socio1', 'pdfPreviewSocio1', false)">
                                @error('cv_socio1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="pdfPreviewSocio1" src="#" type="application/pdf" style="display: none; width: 90%; height: 900px;" frameborder="0"></iframe>
                                </div>
                            </div>

                            <!-- Campo para subir las imágenes del Título Universitario del socio 1-->
                            <div class="col-md-6 mb-3">
                                <label for="titulo_socio1" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir título universitario</strong>
                                </label>
                                (frontal y reverso)
                                <input type="file" id="titulo_socio1" name="titulo_socio1[]" accept="image/*" multiple>
                                <div id="previewTituloSocio1"></div>
                                @error('titulo_socio1.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la firma digital del socio 1 -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_socio1" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma digital</strong> 
                                </label>
                                <input type="file" id="imagen_firma_socio1" name="imagen_firma_socio1[]" accept="image/*">
                                <div id="preview_firma_socio1"></div>
                                @error('imagen_firma_socio1.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la constancia del socio 1 -->
                            <div class="col-md-6 mb-3">
                                <label for="constancia_solvencia_socio1" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir constancia de solvencia</strong> 
                                </label>
                                <input type="file" id="constancia_solvencia_socio1" name="constancia_solvencia_socio1[]" accept="image/*">
                                <div id="previewSolvenciaSocio1"></div>
                                @error('constancia_solvencia_socio1.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <!-- DATOS DEL SOCIO 2 -->
                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 2:</strong></h6>
                            </div>

                            <!-- PRIMER NOMBRE -->
                            <div class="col-md-2">
                                <label for="primer_nombre_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_nombre_socio2') is-invalid @enderror" id="primer_nombre_socio2" name="primer_nombre_socio2" value="{{ old('primer_nombre_socio2') }}" placeholder="Ingrese el primer nombre">
                                @error('primer_nombre_socio2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_nombre_socio2') is-invalid @enderror" id="segundo_nombre_socio2" name="segundo_nombre_socio2" value="{{ old('segundo_nombre_socio2') }}" placeholder="Ingrese el segundo nombre">
                                @error('segundo_nombre_socio2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_apellido_socio2') is-invalid @enderror" id="primer_apellido_socio2" name="primer_apellido_socio2" value="{{ old('primer_apellido_socio2') }}" placeholder="Ingrese el primer apellido">
                                @error('primer_apellido_socio2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_apellido_socio2') is-invalid @enderror" id="segundo_apellido_socio2" name="segundo_apellido_socio2" value="{{ old('segundo_apellido_socio2') }}" placeholder="Ingrese el segundo apellido">
                                @error('segundo_apellido_socio2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio2">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control @error('num_colegiacion_socio2') is-invalid @enderror" id="num_colegiacion_socio2" name="num_colegiacion_socio2" value="{{ old('num_colegiacion_socio2') }}" placeholder="Ingrese el número de colegiación">
                                @error('num_colegiacion_socio2')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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

                            <!-- Campo para el Curriculum Vitae del socio 2 -->
                            <div class="col-md-6 mb-2">
                                <label for="cv_socio2" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Currículum vitae</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('cv_socio2') is-invalid @enderror" id="cv_socio2" name="cv_socio2" aria-label="Currículum vitae socio 2" accept="application/pdf" onchange="previewFile('cv_socio2', 'pdfPreviewSocio2', false)">
                                @error('cv_socio2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="pdfPreviewSocio2" src="#" type="application/pdf" style="display: none; width: 90%; height: 900px;" frameborder="0"></iframe>
                                </div>
                            </div>

                            <!-- Campo para subir las imágenes del Título Universitario del socio 2-->
                            <div class="col-md-6 mb-3">
                                <label for="titulo_socio2" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir título universitario</strong>
                                </label>
                                (frontal y reverso)
                                <input type="file" id="titulo_socio2" name="titulo_socio2[]" accept="image/*" multiple>
                                <div id="previewTituloSocio2"></div>
                                @error('titulo_socio2.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la firma digital del socio 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_socio2" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma digital</strong> 
                                </label>
                                <input type="file" id="imagen_firma_socio2" name="imagen_firma_socio2[]" accept="image/*">
                                <div id="preview_firma_socio2"></div>
                                @error('imagen_firma_socio2.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la constancia del socio 2 -->
                            <div class="col-md-6 mb-3">
                                <label for="constancia_solvencia_socio2" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir constancia de solvencia</strong> 
                                </label>
                                <input type="file" id="constancia_solvencia_socio2" name="constancia_solvencia_socio2[]" accept="image/*">
                                <div id="previewSolvenciaSocio2"></div>
                                @error('constancia_solvencia_socio2.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <!-- SOCIO 3 -->
                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 3:</strong></h6>
                            </div>

                            <!-- PRIMER NOMBRE -->
                            <div class="col-md-2">
                                <label for="primer_nombre_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_nombre_socio3') is-invalid @enderror" id="primer_nombre_socio3" name="primer_nombre_socio3" value="{{ old('primer_nombre_socio3') }}" placeholder="Ingrese el primer nombre">
                                @error('primer_nombre_socio3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_nombre_socio3') is-invalid @enderror" id="segundo_nombre_socio3" name="segundo_nombre_socio3" value="{{ old('segundo_nombre_socio3') }}" placeholder="Ingrese el segundo nombre">
                                @error('segundo_nombre_socio3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_apellido_socio3') is-invalid @enderror" id="primer_apellido_socio3" name="primer_apellido_socio3" value="{{ old('primer_apellido_socio3') }}" placeholder="Ingrese el primer apellido">
                                @error('primer_apellido_socio3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_apellido_socio3') is-invalid @enderror" id="segundo_apellido_socio3" name="segundo_apellido_socio3" value="{{ old('segundo_apellido_socio3') }}" placeholder="Ingrese el segundo apellido">
                                @error('segundo_apellido_socio3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio3">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control @error('num_colegiacion_socio3') is-invalid @enderror" id="num_colegiacion_socio3" name="num_colegiacion_socio3" value="{{ old('num_colegiacion_socio3') }}" placeholder="Ingrese el número de colegiación">
                                @error('num_colegiacion_socio3')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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

                            <!-- Campo para el Curriculum Vitae del socio 3 -->
                            <div class="col-md-6 mb-2">
                                <label for="cv_socio3" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Currículum vitae</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('cv_socio3') is-invalid @enderror" id="cv_socio3" name="cv_socio3" aria-label="Currículum vitae socio 3" accept="application/pdf" onchange="previewFile('cv_socio3', 'pdfPreviewSocio3', false)">
                                @error('cv_socio3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="pdfPreviewSocio3" src="#" type="application/pdf" style="display: none; width: 90%; height: 900px;" frameborder="0"></iframe>
                                </div>
                            </div>

                            <!-- Campo para subir las imágenes del Título Universitario del socio 3-->
                            <div class="col-md-6 mb-3">
                                <label for="titulo_socio3" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir título universitario</strong>
                                </label>
                                (frontal y reverso)
                                <input type="file" id="titulo_socio3" name="titulo_socio3[]" accept="image/*" multiple>
                                <div id="previewTituloSocio3"></div>
                                @error('titulo_socio3.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la firma digital del socio 3 -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_socio3" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma digital</strong> 
                                </label>
                                <input type="file" id="imagen_firma_socio3" name="imagen_firma_socio3[]" accept="image/*">
                                <div id="preview_firma_socio3"></div>
                                @error('imagen_firma_socio3.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la constancia del socio 3 -->
                            <div class="col-md-6 mb-3">
                                <label for="constancia_solvencia_socio3" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir constancia de solvencia</strong> 
                                </label>
                                <input type="file" id="constancia_solvencia_socio3" name="constancia_solvencia_socio3[]" accept="image/*">
                                <div id="previewSolvenciaSocio3"></div>
                                @error('constancia_solvencia_socio3.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                       
                        </div>


                        <!-- SOCIO 4 -->
                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <h6 style="text-decoration: underline;"><strong>DATOS DEL SOCIO(A) 4:</strong></h6>
                            </div>

                            <!-- PRIMER NOMBRE -->
                            <div class="col-md-2">
                                <label for="primer_nombre_socio4">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_nombre_socio4') is-invalid @enderror" id="primer_nombre_socio4" name="primer_nombre_socio4" value="{{ old('primer_nombre_socio4') }}" placeholder="Ingrese el primer nombre">
                                @error('primer_nombre_socio4')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio4">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_nombre_socio4') is-invalid @enderror" id="segundo_nombre_socio4" name="segundo_nombre_socio4" value="{{ old('segundo_nombre_socio4') }}" placeholder="Ingrese el segundo nombre">
                                @error('segundo_nombre_socio4')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio4">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('primer_apellido_socio4') is-invalid @enderror" id="primer_apellido_socio4" name="primer_apellido_socio4" value="{{ old('primer_apellido_socio4') }}" placeholder="Ingrese el primer apellido">
                                @error('primer_apellido_socio4')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio4">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control @error('segundo_apellido_socio4') is-invalid @enderror" id="segundo_apellido_socio4" name="segundo_apellido_socio4" value="{{ old('segundo_apellido_socio4') }}" placeholder="Ingrese el segundo apellido">
                                @error('segundo_apellido_socio4')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio4">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control @error('num_colegiacion_socio4') is-invalid @enderror" id="num_colegiacion_socio4" name="num_colegiacion_socio4" value="{{ old('num_colegiacion_socio4') }}" placeholder="Ingrese el número de colegiación">
                                @error('num_colegiacion_socio4')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <script>
                                document.getElementById('num_colegiacion_socio4').addEventListener('input', function (e) {
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

                            <!-- Campo para el Curriculum Vitae del socio 4 -->
                            <div class="col-md-6 mb-2">
                                <label for="cv_socio4" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Currículum vitae</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('cv_socio4') is-invalid @enderror" id="cv_socio4" name="cv_socio4" aria-label="Currículum vitae socio 4" accept="application/pdf" onchange="previewFile('cv_socio4', 'pdfPreviewSocio4', false)">
                                @error('cv_socio4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="pdfPreviewSocio4" src="#" type="application/pdf" style="display: none; width: 90%; height: 900px;" frameborder="0"></iframe>
                                </div>
                            </div>

                            <!-- Campo para subir las imágenes del Título Universitario del socio 4 -->
                            <div class="col-md-6 mb-3">
                                <label for="titulo_socio4" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir título universitario</strong>
                                </label>
                                (frontal y reverso)
                                <input type="file" id="titulo_socio4" name="titulo_socio4[]" accept="image/*" multiple>
                                <div id="previewTituloSocio4"></div>
                                @error('titulo_socio4.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la firma digital del socio 4 -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_socio4" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma digital</strong> 
                                </label>
                                <input type="file" id="imagen_firma_socio4" name="imagen_firma_socio4[]" accept="image/*">
                                <div id="preview_firma_socio4"></div>
                                @error('imagen_firma_socio4.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir imagen de la constancia del socio 4 -->
                            <div class="col-md-6 mb-3">
                                <label for="constancia_solvencia_socio4" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir constancia de solvencia</strong> 
                                </label>
                                <input type="file" id="constancia_solvencia_socio4" name="constancia_solvencia_socio4[]" accept="image/*">
                                <div id="previewSolvenciaSocio4"></div>
                                @error('constancia_solvencia_socio4.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <div class="form-group row">
                            <!-- IV. DOCUMENTOS -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;"><strong>III. DOCUMENTOS</strong></h4>
                            </div>

                            <!-- Campo para subir la imagen de la escritura de constitución -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_escritura_constitucion" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir escritura de constitución original</strong> 
                                </label>
                                <input type="file" id="imagen_escritura_constitucion" name="imagen_escritura_constitucion[]" accept="image/*">
                                <div id="previewImagenEscrituraConstitucion"></div>
                                @error('imagen_escritura_constitucion.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir la imagen del registro mercantil -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_registro_mercantil" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir registro mercantil original</strong> 
                                </label>
                                <input type="file" id="imagen_registro_mercantil" name="imagen_registro_mercantil[]" accept="image/*">
                                <div id="previewImagenRegistroMercantil"></div>
                                @error('imagen_registro_mercantil.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir la imagen del RTN de la firma -->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_rtn_firma_auditora" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir rtn de la firma original</strong> 
                                </label>
                                <input type="file" id="imagen_rtn_firma_auditora" name="imagen_rtn_firma_auditora[]" accept="image/*">
                                <div id="previewImagenRTN"></div>
                                @error('imagen_rtn_firma_auditora.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir la nómina de pago proyectada (Planilla) -->
                            <div class="col-md-6 mb-2">
                                <label for="nomina_pago_firma" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Subir nómina de pago</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('nomina_pago_firma') is-invalid @enderror" id="nomina_pago_firma" name="nomina_pago_firma" aria-label="Currículum vitae" accept="application/pdf" onchange="previewFile('nomina_pago_firma', 'previewPdfNominaPago', false)">
                                @error('nomina_pago_firma')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="previewPdfNominaPago" src="#" type="application/pdf" style="display: none; width: 90%; height: 900px;" frameborder="0"></iframe>
                                </div>
                            </div>

                        </div><br>

                        <div class="form-group row">
                            <!-- IV. FIRMAS DIGITALES -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;"><strong>III. FIRMAS DIGITALES</strong></h4>
                            </div>

                            <!-- Campo para subir la imagen de la firma social-->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_social" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma social</strong> 
                                </label>
                                <input type="file" id="imagen_firma_social" name="imagen_firma_social[]" accept="image/*">
                                <div id="previewFirmaSocial"></div>
                                @error('imagen_firma_social.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para subir la imagen de la firma del representante legal-->
                            <div class="col-md-6 mb-3">
                                <label for="imagen_firma_representante_legal" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir firma digital del Representante Legal</strong> 
                                </label>
                                <input type="file" id="imagen_firma_representante_legal" name="imagen_firma_representante_legal[]" accept="image/*">
                                <div id="previewFirmaSocial"></div>
                                @error('imagen_firma_representante_legal.*')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                    Inviar solicitud de inscripción
                                </button>
                            </div>
                        </div><br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImages(input, previewContainerId) {
        var previewContainer = document.getElementById(previewContainerId);
        previewContainer.innerHTML = ''; // Limpiar el contenedor antes de agregar nuevas imágenes

        if (input.files) {
            var filesAmount = input.files.length;
            for (let i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var imgElement = document.createElement('img');
                    imgElement.src = event.target.result;
                    imgElement.style.maxWidth = '500px';
                    imgElement.style.margin = '5px';
                    previewContainer.appendChild(imgElement);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    }
    // SOCIO 1
    document.getElementById('titulo_socio1').addEventListener('change', function() {
        previewImages(this, 'previewTituloSocio1');
    });
    document.getElementById('imagen_firma_socio1').addEventListener('change', function() {
        previewImages(this, 'preview_firma_socio1');
    });
    document.getElementById('constancia_solvencia_socio1').addEventListener('change', function() {
        previewImages(this, 'previewSolvenciaSocio1');
    });

    // SOCIO 2
    document.getElementById('titulo_socio2').addEventListener('change', function() {
        previewImages(this, 'previewTituloSocio2');
    });
    document.getElementById('imagen_firma_socio2').addEventListener('change', function() {
        previewImages(this, 'preview_firma_socio2');
    });
    document.getElementById('constancia_solvencia_socio2').addEventListener('change', function() {
        previewImages(this, 'previewSolvenciaSocio2');
    });

    // SOCIO 3
    document.getElementById('titulo_socio3').addEventListener('change', function() {
        previewImages(this, 'previewTituloSocio3');
    });
    document.getElementById('imagen_firma_socio3').addEventListener('change', function() {
        previewImages(this, 'preview_firma_socio3');
    });
    document.getElementById('constancia_solvencia_socio3').addEventListener('change', function() {
        previewImages(this, 'previewSolvenciaSocio3');
    });

    // SOCIO 4
    document.getElementById('titulo_socio4').addEventListener('change', function() {
        previewImages(this, 'previewTituloSocio4');
    });
    document.getElementById('imagen_firma_socio4').addEventListener('change', function() {
        previewImages(this, 'preview_firma_socio4');
    });
    document.getElementById('constancia_solvencia_socio4').addEventListener('change', function() {
        previewImages(this, 'previewSolvenciaSocio4');
    });

    // Función para previsualizar el curriculum vitae
    function previewFile(inputId, previewId, isImage = true) {
        const file = document.getElementById(inputId).files[0];
        const preview = document.getElementById(previewId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    document.getElementById('cv_socio1').addEventListener('change', () => previewFile('cv_socio2', 'pdfPreviewSocio1', false));
    document.getElementById('cv_socio2').addEventListener('change', () => previewFile('cv_socio2', 'pdfPreviewSocio2', false));
    document.getElementById('cv_socio3').addEventListener('change', () => previewFile('cv_socio3', 'pdfPreviewSocio3', false));
    document.getElementById('cv_socio4').addEventListener('change', () => previewFile('cv_socio4', 'pdfPreviewSocio4', false));
    document.getElementById('nomina_pago_firma').addEventListener('change', () => previewFile('nomina_pago_firma', 'previewPdfNominaPago', false));

</script>

@endsection