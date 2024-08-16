@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>INSCRIBIRSE AL COLEGIO</strong></h3>
                </div>

                <div class="card-body">
                    <form id="inscripcionForm" action="{{ route('inscripciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="user_identifier">
                                <strong>ID o DNI *</strong>
                            </label>
                            <div class="form-inline mt-3">
                                <input type="text" name="user_identifier" class="form-control mr-2 col-3" id="user_identifier" placeholder="INGRESE SU ID USUARIO O DNI PARA INSCRIBIRSE AL COLEGIO" required>
                                <button type="button" class="btn btn-info btn-round btn-simple" onclick="fetchUserData()">
                                    <i class="tim-icons icon-zoom-split"></i> Cargar datos para inscribirse
                                </button>
                            </div>
                        </div>

                        <div id="userData" style="display: none;">

                            <div class="form-group row">

                                <div class="card-header" style="margin-left: 25px;">
                                    <h4>Yo como licenciado(a) en Contaduría Pública por este medio solicito al Colegio Hondureño de
                                        Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro(a) de este Colegio y me
                                        comprometo al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93
                                        publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporcionaré la
                                        siguiente información.</h4>
                                </div>

                                <!-- I. Datos Personales -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">I. DATOS PERSONALES</h4>
                                </div>

                                <div class="col-md-2">
                                    <label for="name"><strong>PRIMER NOMBRE *</strong></label>
                                    <input type="text" class="form-control" id="name" name="name" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="name2"><strong>SEGUNDO NOMBRE</strong></label>
                                    <input type="text" class="form-control" id="name2" name="name2" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="apellido"><strong>PRIMER APELLIDO *</strong></label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="apellido2"><strong>SEGUNDO APELLIDO</strong></label>
                                    <input type="text" class="form-control" id="apellido2" name="apellido2" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="numero_identidad"><strong>DNI *</strong></label>
                                    <input type="text" class="form-control" id="numero_identidad" name="numero_identidad" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="fecha_nacimiento">
                                        <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                        <strong>FECHA DE NACIMIENTO *</strong>
                                    </label>
                                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" readonly>
                                </div>

                                <div class="col-md-3">
                                    <label for="lugar_nacimiento">
                                        <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:rgb(226, 18, 18)"></i>
                                        <strong>LUGAR DE NACIMIENTO</strong>
                                    </label>
                                    <input type="text" class="form-control" id="lugar_nacimiento" name="lugar_nacimiento" value="{{ old('lugar_nacimiento') }}">
                                </div>

                                <div class="col-md-9">
                                    <label for="direccion_residencia">
                                        <i class="fas fa-home" style="margin-right: 8px;"></i>
                                        <strong>DIRECCIÓN DE RESIDENCIA</strong>
                                    </label>
                                    <input type="text" class="form-control" id="direccion_residencia" name="direccion_residencia" value="{{ old('direccion_residencia') }}">
                                </div>

                                <div class="col-md-4">
                                    <label for="telefono">
                                        <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                        <strong>TELÉFONO FIJO</strong>
                                    </label>
                                    <input type="text" class="form-control" id="telefono" name="telefono" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label for="telefono_celular">
                                        <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                        <strong>CELULAR *</strong>
                                    </label>
                                    <input type="text" class="form-control" id="telefono_celular" name="telefono_celular" readonly>
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="email"><strong>CORREO ELECTRÓNICO *</strong></label>
                                    <input type="email" class="form-control" id="email" name="email" readonly>
                                </div>

                            </div>

                            <div class="form-group row">
                                <!-- II. Datos Profesionales -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">II. DATOS PROFESIONALES</h4>
                                </div>

                                <div class="col-md-2">
                                    <label for="fecha_graduacion">
                                        <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                        <strong>FECHA DE GRADUACIÓN *</strong>
                                    </label>
                                    <input type="date" name="fecha_graduacion" id="fecha_graduacion" class="form-control" value="{{ old('fecha_graduacion') }}"  required>
                                </div>

                                <div class="col-md-4">
                                    <label for="universidad"><strong>UNIVERSIDAD *</strong></label>
                                    <select class="form-control @error('universidad') is-invalid @enderror" id="universidad" name="universidad" required>
                                        <option disabled selected>Seleccione una universidad</option>
                                        @foreach($universidades as $universidad)
                                            <option value="{{ $universidad->nombre_universidad }}">{{ $universidad->nombre_universidad }}</option>
                                        @endforeach
                                    </select>
                                    @error('universidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-3">
                                    <label for="nombre_empresa_trabajo_actual">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>NOMBRE DE LA EMPRESA DONDE LABORA</strong>
                                    </label>
                                    <input type="text" name="nombre_empresa_trabajo_actual" id="nombre_empresa_trabajo_actual" class="form-control" value="{{ old('nombre_empresa_trabajo_actual') }}">
                                </div>
    
    
                                <div class="col-md-3">
                                    <label for="cargo">
                                        <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                        <strong>CARGO</strong>
                                    </label>
                                    <input type="text" name="cargo" id="cargo" class="form-control"  value="{{ old('cargo') }}">
                                </div>
    
                                <div class="col-md-6">
                                    <label for="direccion_empresa">
                                        <i class="fas fa-location-arrow" style="margin-right: 8px;"></i>
                                        <strong>DIRECCIÓN DE LA EMPRESA</strong>
                                    </label>
                                    <input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control" value="{{ old('direccion_empresa') }}">
                                </div>
    
    
                                <div class="col-md-2">
                                    <label for="correo_empresa">
                                        <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                        <strong>CORREO DE LA EMPRESA</strong>
                                    </label>
                                    <input type="email" name="correo_empresa" id="correo_empresa" class="form-control" value="{{ old('correo_empresa') }}">
                                </div>
    
    
                                <div class="col-md-2">
                                    <label for="telefono_empresa">
                                        <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                        <strong>TELÉFONO DE LA EMPRESA</strong>
                                    </label>
                                    <input type="text" name="telefono_empresa" id="telefono_empresa" class="form-control" value="{{ old('telefono_empresa') }}">
                                </div>
    
    
                                <div class="col-md-2">
                                    <label for="extension_telefono_empresa">
                                        <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                        <strong>EXTENSIÓN TELEFÓNICA</strong>
                                    </label>
                                    <input type="text" name="extension_telefono_empresa" id="extension_telefono_empresa" class="form-control" value="{{ old('extension_telefono_empresa') }}">
                                </div>

                            </div>


                            <div class="form-group row">
                                <!-- III. Información Adicional -->                      
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">III. INFORMACIÓN ADICIONAL</h4>
                                </div>

                                <div class="col-md-4">
                                    <label for="especialidad_1">
                                        <i class="fas fa-stethoscope" style="margin-right: 8px;"></i>
                                        <strong>ESPECIALIDAD 1</strong>
                                    </label>
                                    <input type="text" name="especialidad_1" id="especialidad_1" class="form-control" value="{{ old('especialidad_1') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="lugar_especialidad_1">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>LUGAR DONDE REALIZÓ ESPECIALIZACIÓN</strong>
                                    </label>
                                    <input type="text" name="lugar_especialidad_1" id="lugar_especialidad_1" class="form-control" value="{{ old('especialidad_1') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="fecha_especialidad_1">
                                        <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                                        <strong>FECHA</strong>
                                    </label>
                                    <input type="date" name="fecha_especialidad_1" id="fecha_especialidad_1" class="form-control" value="{{ old('fecha_especialidad_1') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="especialidad_2">
                                        <i class="fas fa-stethoscope" style="margin-right: 8px;"></i>
                                        <strong>ESPECIALIDAD 2</strong>
                                    </label>
                                    <input type="text" name="especialidad_2" id="especialidad_2" class="form-control" value="{{ old('especialidad_2') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="lugar_especialidad_2">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>LUGAR DONDE REALIZÓ ESPECIALIZACIÓN</strong>
                                    </label>
                                    <input type="text" name="lugar_especialidad_2" id="lugar_especialidad_2" class="form-control" value="{{ old('lugar_especialidad_2') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="fecha_especialidad_2">
                                        <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                                        <strong>FECHA</strong>
                                    </label>
                                    <input type="date" name="fecha_especialidad_2" id="fecha_especialidad_2" class="form-control" value="{{ old('fecha_especialidad_2') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <!-- IV. Cursos de especialización -->                    
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">IV. CURSO DE ESPECIALIZACIÓN</h4>
                                </div>
                               
                                <div class="col-md-4">
                                    <label for="nombre_curso_especializacion">
                                        <i class="fas fa-book" style="margin-right: 8px;"></i>
                                        <strong>NOMBRE DEL CURSO DE ESPECIALIZACIÓN</strong>
                                    </label>
                                    <input type="text" name="nombre_curso_especializacion" id="nombre_curso_especializacion" class="form-control" value="{{ old('nombre_curso_especializacion') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="lugar_curso">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>LUGAR DEL CURSO</strong>
                                    </label>
                                    <input type="text" name="lugar_curso" id="lugar_curso" class="form-control" value="{{ old('lugar_curso') }}">
                                </div>
    
                                <div class="col-md-4">
                                    <label for="fecha_curso">
                                        <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                                        <strong>FECHA DEL CURSO</strong>
                                    </label>
                                    <input type="date" name="fecha_curso" id="fecha_curso" class="form-control" value="{{ old('fecha_curso') }}">
                                </div>
    
                            </div>


                            <div class="form-group row">
                                <!-- V. Experiencia Profesional -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">V. EXPERIENCIA PROFESIONAL</h4>
                                </div>
    
                                <div class="col-md-4">
                                    <label for="nombre_empresa1">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>NOMBRE DE LA EMPRESA 1</strong>
                                    </label>
                                    <input type="text" name="nombre_empresa1" id="nombre_empresa1" class="form-control" value="{{ old('nombre_empresa1') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="cargo_empresa1">
                                        <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                        <strong>CARGO DE LA EMPRESA 1</strong>
                                    </label>
                                    <input type="text" name="cargo_empresa1" id="cargo_empresa1" class="form-control" value="{{ old('cargo_empresa1') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="duración_empresa1">
                                        <i class="fas fa-hourglass-half" style="margin-right: 8px;"></i>
                                        <strong>DURACIÓN DE LA EMPRESA 1</strong>
                                    </label>
                                    <input type="text" name="duración_empresa1" id="duración_empresa1" class="form-control" value="{{ old('duración_empresa1') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="nombre_empresa2">
                                        <i class="fas fa-building" style="margin-right: 8px;"></i>
                                        <strong>NOMBRE DE LA EMPRESA 2</strong>
                                    </label>
                                    <input type="text" name="nombre_empresa2" id="nombre_empresa2" class="form-control" value="{{ old('nombre_empresa2') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="cargo_empresa2">
                                        <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                        <strong>CARGO DE LA EMPRESA 2</strong>
                                    </label>
                                    <input type="text" name="cargo_empresa2" id="cargo_empresa2" class="form-control" value="{{ old('cargo_empresa2') }}">
                                </div>
    
    
                                <div class="col-md-4">
                                    <label for="duración_empresa2">
                                        <i class="fas fa-hourglass-half" style="margin-right: 8px;"></i>
                                        <strong>DURACIÓN DE LA EMPRESA 2</strong>
                                    </label>
                                    <input type="text" name="duración_empresa2" id="duración_empresa2" class="form-control" value="{{ old('duración_empresa2') }}">
                                </div>

                            </div>


                            <div class="form-group row">
                                <!-- VI. Misiones Desempeñadas -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">VI. MISIONES DESEMPEÑADAS</h4>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="comisiones">
                                        <i class="fas fa-clipboard-list" style="margin-right: 8px;"></i>
                                        <strong>COMISIONES</strong>
                                    </label>
                                    <textarea name="comisiones" id="comisiones" class="form-control" value="{{ old('comisiones') }}" style="min-height: 100px"></textarea>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="representaciones">
                                        <i class="fas fa-user-tie" style="margin-right: 8px;"></i>
                                        <strong>REPRESENTACIONES</strong>
                                    </label>
                                    <textarea name="representaciones" id="representaciones" class="form-control" value="{{ old('representaciones') }}" style="min-height: 100px"></textarea>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="delegaciones">
                                        <i class="fas fa-handshake" style="margin-right: 8px;"></i>
                                        <strong>DELEGACIONES</strong>
                                    </label>
                                    <textarea name="delegaciones" id="delegaciones" class="form-control" value="{{ old('delegaciones') }}" style="min-height: 100px"></textarea>
                                </div>

                            </div>


                            <div class="form-group row">
                                <!-- VII. Otros -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">VII. OTROS</h4>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="publicacion_documentos">
                                        <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                        <strong>PUBLICACIÓN DE DOCUMENTOS</strong>
                                    </label>
                                    <textarea name="publicacion_documentos" id="publicacion_documentos" class="form-control" value="{{ old('publicacion_documentos') }}" style="min-height: 100px"></textarea>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="publicaciones">
                                        <i class="fas fa-newspaper" style="margin-right: 8px;"></i>
                                        <strong>PUBLICACIONES</strong>
                                    </label>
                                    <textarea name="publicaciones" id="publicaciones" class="form-control" value="{{ old('publicaciones') }}" style="min-height: 100px"></textarea>
                                </div>
                           
                                <div class="col-md-4">
                                    <label for="publicacion_libro">
                                        <i class="fas fa-book" style="margin-right: 8px;"></i>
                                        <strong>PUBLICACIÓN DE UN LIBRO</strong>
                                    </label>
                                    <textarea name="publicacion_libro" id="publicacion_libro" class="form-control" value="{{ old('publicacion_libro') }}" style="min-height: 100px"></textarea>
                                </div>

                            </div>   
    
                            <div class="form-group row">

                                <!-- VII. Documentos -->
                                <div class="col-12 text-center mb-0">
                                    <h4 style="text-decoration: underline;">VIII. DOCUMENTOS</h4>
                                </div>
                            
                                <!-- Campo para subir las imágenes del Título Universitario -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_titulo" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir título universitario</strong>
                                    </label>
                                    (frontal y reverso)
                                    <input type="file" id="imagen_titulo" name="imagen_titulo[]" accept="image/*" multiple>
                                    <div id="previewImagenTitulo"></div>
                                </div>
                            
                                <!-- Campo para subir las imágenes del DNI -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_dni" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir DNI</strong>
                                    </label>
                                    (frontal y reverso)
                                    <input type="file" id="imagen_dni" name="imagen_dni[]" accept="image/*" multiple>
                                    <div id="previewImagenDni"></div>
                                </div>
                            
                                <!-- Campo para subir las imágenes del Tamaño carnet -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_tamano_carnet" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir foto tamaño carnet</strong>
                                    </label>
                                    <input type="file" id="imagen_tamano_carnet" name="imagen_tamano_carnet[]" accept="image/*" multiple>
                                    <div id="previewImagenTamanoCarnet"></div>
                                </div>
                            
                                <!-- Campo para subir la imagen del Curriculum Vitae -->
                                <div class="col-md-6 mb-2">
                                    <label for="cv" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                        <strong>Currículum Vitae</strong>
                                    </label>
                                    PDF (Mínimo 3 páginas)
                                    <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" aria-label="Currículum vitae" accept="application/pdf" onchange="previewFile('cv', 'pdfPreview', false)" required>
                                    @error('cv')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group mt-3">
                                        <iframe id="pdfPreview" src="#" type="application/pdf" style="display: none; width: 90%; height: 300px;" frameborder="0"></iframe>
                                    </div>
                                </div>
                            
                                <!-- Campo para subir las imágenes del DNI beneficiario 1 -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_dni_beneficiario1" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir DNI del beneficiario 1</strong>
                                    </label>
                                    (frontal y reverso)
                                    <input type="file" id="imagen_dni_beneficiario1" name="imagen_dni_beneficiario1[]" accept="image/*" multiple>
                                    <div id="previewImagenDniBeneficiario1"></div>
                                </div>
                            
                                <!-- Campo para subir las imágenes del DNI beneficiario 2 -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_dni_beneficiario2" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir DNI del beneficiario 2</strong>
                                    </label>
                                    (frontal y reverso)
                                    <input type="file" id="imagen_dni_beneficiario2" name="imagen_dni_beneficiario2[]" accept="image/*" multiple>
                                    <div id="previewImagenDniBeneficiario2"></div>
                                </div> 
                            
                                <!-- Campo para subir las imágenes del DNI beneficiario 3 -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_dni_beneficiario3" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir DNI del beneficiario 3</strong>
                                    </label>
                                    (frontal y reverso)
                                    <input type="file" id="imagen_dni_beneficiario3" name="imagen_dni_beneficiario3[]" accept="image/*" multiple>
                                    <div id="previewImagenDniBeneficiario3"></div>
                                </div>
                            
                                <!-- Campo para subir imagen del RTN -->
                                <div class="col-md-6 mb-3">
                                    <label for="imagen_rtn" class="btn btn-default btn-simple">
                                        <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                        <strong>Subir RTN</strong> 
                                    </label>
                                    <input type="file" id="imagen_rtn" name="imagen_rtn[]" accept="image/*" multiple>
                                    <div id="previewImagenRtn"></div>
                                </div>

                            </div>                            

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                        Inviar inscripción
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchUserData() {
        const identifier = document.getElementById('user_identifier').value;

        fetch(`/get-user-data/${identifier}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('name').value = data.user.name;
                    document.getElementById('name2').value = data.user.name2;
                    document.getElementById('apellido').value = data.user.apellido;
                    document.getElementById('apellido2').value = data.user.apellido2;
                    document.getElementById('numero_identidad').value = data.user.numero_identidad;
                    document.getElementById('fecha_nacimiento').value = data.user.fecha_nacimiento;
                    document.getElementById('telefono').value = data.user.telefono;
                    document.getElementById('telefono_celular').value = data.user.telefono_celular;
                    document.getElementById('email').value = data.user.email;
                    document.getElementById('userData').style.display = 'block';
                } else {
                    alert('Usuario no encontrado');
                }
            })
            .catch(error => console.error('Error:', error));
    }

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

    document.getElementById('imagen_titulo').addEventListener('change', function() {
        previewImages(this, 'previewImagenTitulo');
    });

    document.getElementById('imagen_dni').addEventListener('change', function() {
        previewImages(this, 'previewImagenDni');
    });

    document.getElementById('imagen_tamano_carnet').addEventListener('change', function() {
        previewImages(this, 'previewImagenTamanoCarnet');
    });

    document.getElementById('imagen_dni_beneficiario1').addEventListener('change', function() {
        previewImages(this, 'previewImagenDniBeneficiario1');
    });

    document.getElementById('imagen_dni_beneficiario2').addEventListener('change', function() {
        previewImages(this, 'previewImagenDniBeneficiario2');
    });

    document.getElementById('imagen_dni_beneficiario3').addEventListener('change', function() {
        previewImages(this, 'previewImagenDniBeneficiario3');
    });

    document.getElementById('imagen_rtn').addEventListener('change', function() {
        previewImages(this, 'previewImagenRtn');
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

    document.getElementById('cv').addEventListener('change', () => previewFile('cv', 'pdfPreview', false));

</script>

@endsection
