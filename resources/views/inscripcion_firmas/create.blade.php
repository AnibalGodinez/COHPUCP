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
                                <input type="text" class="form-control" id="nombre_sociedad" name="nombre_sociedad" value="{{ old('nombre_sociedad') }}" required>
                            </div>
                        
                            <!-- CAMPO DEL NÚMERO DE INSCRIPCIÓN EN REGISTRO PÚBLICO DE COMERCIO -->
                            <div class="col-md-3">
                                <label for="num_inscripcion_registro_publico_comercio">
                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                    <strong>Nº INSCRIPCIÓN EN EL REGISTRO PÚBLICO DE COMERCIO</strong>
                                </label>
                                <input type="text" class="form-control" id="num_inscripcion_registro_publico_comercio" name="num_inscripcion_registro_publico_comercio" value="{{ old('num_inscripcion_registro_publico_comercio') }}">
                            </div>
                        
                            <!-- CAMPO DE FECHA DE CONSTITUCIÓN -->
                            <div class="col-md-2">
                                <label for="fecha_constitucion">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE CONSTITUCIÓN DE LA FIRMA</strong>
                                </label>
                                <input type="date" class="form-control" id="fecha_constitucion" name="fecha_constitucion" value="{{ old('fecha_constitucion') }}" required>
                            </div>
                        
                            <!-- CAMPO DE REGISTRO TRIBUTARIO NACIONAL -->
                            <div class="col-md-2">
                                <label for="registro_tributario_nacional">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>Nº REGISTRO TRIBUTARIO NACIONAL</strong>
                                </label>
                                <input type="text" class="form-control" id="registro_tributario_nacional" name="registro_tributario_nacional" value="{{ old('registro_tributario_nacional') }}">
                            </div>
                        
                            <!-- CAMPO DEL NÚMERO DE INSCRIPCIÓN EN CÁMARA DE COMERCIO -->
                            <div class="col-md-2">
                                <label for="num_inscripcion_camara_comercio">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                    <strong>Nº INSCRIPCIÓN CÁMARA DE COMERCIO</strong>
                                </label>
                                <input type="text" class="form-control" id="num_inscripcion_camara_comercio" name="num_inscripcion_camara_comercio" value="{{ old('num_inscripcion_camara_comercio') }}">
                            </div>

                            <!-- CAMPO DEL MUNICIPIO DONDE REALIZA LA SOLICITUD -->
                            <div class="col-md-2">
                                <label for="municipio_realiza_solicitud">
                                    <i class="fas fa-city" style="margin-right: 8px; color:rgb(20, 17, 204)"></i>
                                    <strong>MUNICIPIO DONDE REALIZA LA SOLICITUD</strong>
                                </label>
                                <input type="text" class="form-control" id="municipio_realiza_solicitud" name="municipio_realiza_solicitud" value="{{ old('municipio_realiza_solicitud') }}">
                            </div>
                        
                            <!-- CAMPO DE DIRECCIÓN -->
                            <div class="col-md-4">
                                <label for="direccion">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:rgb(235, 13, 13)"></i>
                                    <strong>DIRECCIÓN DE LA FIRMA</strong>
                                </label>
                                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}">
                            </div>
                        
                            <!-- CAMPO DE TELÉFONO -->
                            <div class="col-md-2">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO</strong>
                                </label>
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                            </div>
                        
                            <!-- CAMPO DE CELULAR -->
                            <div class="col-md-2">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR</strong>
                                </label>
                                <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" required>
                            </div>
                        
                            <!-- CAMPO DE CORREO ELECTRÓNICO -->
                            <div class="col-md-2">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO</strong>
                                </label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>
                        
                        <!-- I. DATOS DE LA SOCIEDAD -->
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
                                <input type="text" class="form-control" id="primer_nombre_socio1" name="primer_nombre_socio1" value="{{ old('primer_nombre_socio1') }}" required>
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_nombre_socio1" name="segundo_nombre_socio1" value="{{ old('segundo_nombre_socio1') }}">
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="primer_apellido_socio1" name="primer_apellido_socio1" value="{{ old('primer_apellido_socio1') }}" required>
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio1">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_apellido_socio1" name="segundo_apellido_socio1" value="{{ old('segundo_apellido_socio1') }}">
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio1">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control" id="num_colegiacion_socio1" name="num_colegiacion_socio1" value="{{ old('num_colegiacion_socio1') }}">
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

                            <!-- IMAGEN DE FIRMA DEL SOCIO 1 -->
                            <div class="col-md-12 text-center">
                                <label for="imagen_firma_socio1" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    Subir firma digital socio 1
                                </label>
                                <input type="file" class="form-control-file" id="imagen_firma_socio1" name="imagen_firma_socio1" onchange="previewImage(event, 'preview_socio1')">
                                <img id="preview_socio1" src="#" alt="Vista previa de la firma del Socio 1" style="display: none; max-width: 100px; max-height: 100px; margin: 0 auto;">
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
                                <input type="text" class="form-control" id="primer_nombre_socio2" name="primer_nombre_socio2" value="{{ old('primer_nombre_socio2') }}" required>
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_nombre_socio2" name="segundo_nombre_socio2" value="{{ old('segundo_nombre_socio2') }}">
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="primer_apellido_socio2" name="primer_apellido_socio2" value="{{ old('primer_apellido_socio2') }}" required>
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_apellido_socio2" name="segundo_apellido_socio2" value="{{ old('segundo_apellido_socio2') }}">
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio2">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control" id="num_colegiacion_socio2" name="num_colegiacion_socio2" value="{{ old('num_colegiacion_socio2') }}">
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

                            <!-- IMAGEN DE FIRMA DEL SOCIO 2 -->
                            <div class="col-md-12 text-center">
                                <label for="imagen_firma_socio2" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    Subir firma digital socio 2
                                </label>
                                <input type="file" class="form-control-file d-none" id="imagen_firma_socio2" name="imagen_firma_socio2" onchange="previewImage(event, 'preview_socio2')">
                                <img id="preview_socio2" src="#" alt="Vista previa de la firma del Socio 2" style="display: none; max-width: 100px; max-height: 100px; margin: 0 auto;">
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
                                <input type="text" class="form-control" id="primer_nombre_socio3" name="primer_nombre_socio3" value="{{ old('primer_nombre_socio3') }}" required>
                            </div>

                            <!-- SEGUNDO NOMBRE -->
                            <div class="col-md-2">
                                <label for="segundo_nombre_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_nombre_socio3" name="segundo_nombre_socio3" value="{{ old('segundo_nombre_socio3') }}">
                            </div>

                            <!-- PRIMER APELLIDO -->
                            <div class="col-md-2">
                                <label for="primer_apellido_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="primer_apellido_socio3" name="primer_apellido_socio3" value="{{ old('primer_apellido_socio3') }}" required>
                            </div>

                            <!-- SEGUNDO APELLIDO -->
                            <div class="col-md-2">
                                <label for="segundo_apellido_socio3">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" class="form-control" id="segundo_apellido_socio3" name="segundo_apellido_socio3" value="{{ old('segundo_apellido_socio3') }}">
                            </div>

                            <!-- NÚMERO DE COLEGIACIÓN -->
                            <div class="col-md-4">
                                <label for="num_colegiacion_socio3">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input type="text" class="form-control" id="num_colegiacion_socio3" name="num_colegiacion_socio3" value="{{ old('num_colegiacion_socio3') }}">
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

                            <!-- IMAGEN DE FIRMA DEL SOCIO 3 -->
                            <div class="col-md-12 text-center mb-4">
                                <label for="imagen_firma_socio3" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    Subir firma digital socio 3
                                </label>
                                <input type="file" class="form-control-file d-none" id="imagen_firma_socio3" name="imagen_firma_socio3" onchange="previewImage(event, 'preview_socio3')">
                                <img id="preview_socio3" src="#" alt="Vista previa de la firma del Socio 3" style="display: none; max-width: 100px; max-height: 100px; margin: 0 auto;">
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <!-- III. FIRMAS DIGITALES -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;"><strong>III. FIRMAS DIGITALES</strong></h4>
                            </div>

                            <div class="col-md-12 text-center mb-4">
                                <label for="imagen_firma_social" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    Subir firma Social
                                </label>
                                <input type="file" class="form-control-file" id="imagen_firma_social" name="imagen_firma_social" onchange="previewImage(event, 'preview_social')">
                                <img id="preview_social" src="#" alt="Vista previa de la firma social" style="display: none; max-width: 100px; max-height: 100px; margin: 0 auto;">
                            </div>

                            <div class="col-md-12 text-center">
                                <label for="imagen_firma_representante_legal" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    Subir firma digital del Representante Legal
                                </label>
                                <input type="file" class="form-control-file d-none" id="imagen_firma_representante_legal" name="imagen_firma_representante_legal" onchange="previewImage(event, 'preview_representante')">
                                <div class="mt-2">
                                    <img id="preview_representante" src="#" alt="Vista previa de la firma del representante legal" style="display: none; max-width: 100px; max-height: 100px; margin: 0 auto;">
                                </div>
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
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
            output.style.maxWidth = '700px';  // Ajusta el ancho máximo
            output.style.maxHeight = '700px'; // Ajusta la altura máxima
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>


@endsection
