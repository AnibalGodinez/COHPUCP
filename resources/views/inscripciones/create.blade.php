@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>INSCRIBIRSE AL COLEGIO</strong></h3>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('inscripciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header" >
                            <h4>Yo como licenciado(a) en Contaduría Pública por este medio solicito al Colegio Hondureño de
                                Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro(a) de este Colegio y me
                                comprometo al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93
                                publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporcionaré la
                                siguiente información.</h4>
                        </div><br>

                        <div class="form-group row">

                            <!-- I. Datos Personales -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">I. DATOS PERSONALES</h4>
                            </div>

                            <div class="col-md-3">
                                <label for="primer_nombre">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE </strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="text" name="primer_nombre" id="primer_nombre" class="form-control" value="{{ old('primer_nombre') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="segundo_nombre">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO NOMBRE</strong>
                                </label>
                                <input type="text" name="segundo_nombre" id="segundo_nombre" class="form-control" value="{{ old('segundo_nombre') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="primer_apellido">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="text" name="primer_apellido" id="primer_apellido" class="form-control" value="{{ old('primer_apellido') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="segundo_apellido">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>SEGUNDO APELLIDO</strong>
                                </label>
                                <input type="text" name="segundo_apellido" id="segundo_apellido" class="form-control" value="{{ old('segundo_apellido') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="dni">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>DNI</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="text" name="dni" id="dni" class="form-control" value="{{ old('dni') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="fecha_nacimiento">
                                    <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE NACIMIENTO</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="lugar_nacimiento">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:rgb(226, 18, 18)"></i>
                                    <strong>LUGAR DE NACIMIENTO</strong>
                                </label>
                                <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" class="form-control" value="{{ old('lugar_nacimiento') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="direccion_residencia">
                                    <i class="fas fa-home" style="margin-right: 8px;"></i>
                                    <strong>DIRECCIÓN DE RESIDENCIA</strong>
                                </label>
                                <input type="text" name="direccion_residencia" id="direccion_residencia" class="form-control" value="{{ old('direccion_residencia') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="telefono_fijo">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO FIJO</strong>
                                </label>
                                <input type="text" name="telefono_fijo" id="telefono_fijo" class="form-control" value="{{ old('telefono_fijo') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="correo_electronico">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="email" name="correo_electronico" id="correo_electronico" class="form-control" value="{{ old('correo_electronico') }}" required>
                            </div>

                            <div class="col-md-3">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular') }}" required>
                            </div>

                        </div>

                        <div class="form-group row">
                            <!-- II. Datos Profesionales -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">II. DATOS PROFESIONALES</h4>
                            </div>

                            <div class="col-md-3">
                                <label for="fecha_graduacion">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE GRADUACIÓN</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="date" name="fecha_graduacion" id="fecha_graduacion" class="form-control" value="{{ old('fecha_graduacion') }}"  required>
                            </div>

                            <div class="col-md-3">
                                <label for="universidad">
                                    <i class="fas fa-school" style="margin-right: 8px;"></i>
                                    <strong>UNIVERSIDAD</strong> / campo obligatorio <strong>*</strong>
                                </label>
                                <input type="text" name="universidad" id="universidad" class="form-control" value="{{ old('universidad') }}"  required>
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

                            <div class="col-md-3">
                                <label for="direccion_empresa">
                                    <i class="fas fa-location-arrow" style="margin-right: 8px;"></i>
                                    <strong>DIRECCIÓN DE LA EMPRESA</strong>
                                </label>
                                <input type="text" name="direccion_empresa" id="direccion_empresa" class="form-control" value="{{ old('direccion_empresa') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="correo_empresa">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO DE LA EMPRESA</strong>
                                </label>
                                <input type="email" name="correo_empresa" id="correo_empresa" class="form-control" value="{{ old('correo_empresa') }}">
                            </div>

                            <div class="col-md-3">
                                <label for="telefono_empresa">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO DE LA EMPRESA</strong>
                                </label>
                                <input type="text" name="telefono_empresa" id="telefono_empresa" class="form-control" value="{{ old('telefono_empresa') }}">
                            </div>

                            <div class="col-md-3">
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
                                    <strong>LUGAR</strong>
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
                                    <strong>LUGAR</strong>
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
                            <!-- Cursos de especialización -->                     
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
                                    <strong>LUGAR</strong>
                                </label>
                                <input type="text" name="lugar_curso" id="lugar_curso" class="form-control" value="{{ old('lugar_curso') }}">
                            </div>

                            <div class="col-md-4">
                                <label for="fecha_curso">
                                    <i class="fas fa-calendar" style="margin-right: 8px;"></i>
                                    <strong>FECHA</strong>
                                </label>
                                <input type="date" name="fecha_curso" id="fecha_curso" class="form-control" value="{{ old('fecha_curso') }}">
                            </div>

                        </div>


                        <div class="form-group row">

                            <!-- IV. Experiencia Profesional -->
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
                            <!-- Misiones Desempeñadas -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">VI. MISIONES DESEMPEÑADAS</h4>
                            </div>
                        
                            <div class="col-md-4">
                                <label for="comisiones">
                                    <i class="fas fa-clipboard-list" style="margin-right: 8px;"></i>
                                    <strong>COMISIONES</strong>
                                </label>
                                <textarea name="comisiones" id="comisiones" class="form-control" value="{{ old('comisiones') }}" rows="4"></textarea>
                            </div>
                        
                            <div class="col-md-4">
                                <label for="representaciones">
                                    <i class="fas fa-user-tie" style="margin-right: 8px;"></i>
                                    <strong>REPRESENTACIONES</strong>
                                </label>
                                <textarea name="representaciones" id="representaciones" class="form-control" value="{{ old('representaciones') }}" rows="4"></textarea>
                            </div>
                        
                            <div class="col-md-4">
                                <label for="delegaciones">
                                    <i class="fas fa-handshake" style="margin-right: 8px;"></i>
                                    <strong>DELEGACIONES</strong>
                                </label>
                                <textarea name="delegaciones" id="delegaciones" class="form-control" value="{{ old('delegaciones') }}" rows="4"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <!-- VII. Otros -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">VII. OTROS</h4>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="publicacion_documentos">
                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                    <strong>PUBLICACIÓN DE DOCUMENTOS</strong>
                                </label>
                                <textarea name="publicacion_documentos" id="publicacion_documentos" class="form-control" value="{{ old('publicacion_documentos') }}" rows="4"></textarea>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="publicaciones">
                                    <i class="fas fa-newspaper" style="margin-right: 8px;"></i>
                                    <strong>PUBLICACIONES</strong>
                                </label>
                                <textarea name="publicaciones" id="publicaciones" class="form-control" value="{{ old('publicaciones') }}" rows="4"></textarea>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="publicacion_libro">
                                    <i class="fas fa-book" style="margin-right: 8px;"></i>
                                    <strong>PUBLICACIÓN DE UN LIBRO</strong>
                                </label>
                                <textarea name="publicacion_libro" id="publicacion_libro" class="form-control" value="{{ old('publicacion_libro') }}" rows="4"></textarea>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="otros">
                                    <i class="fas fa-ellipsis-h" style="margin-right: 8px;"></i>
                                    <strong>OTRO</strong>
                                </label>
                                <textarea name="otros" id="otros" class="form-control" value="{{ old('otros') }}" rows="4"></textarea>
                            </div>
                        </div>                        

                        <div class="form-group row">
                            <!-- VII. Documentos -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">VIII. DOCUMENTOS</h4>
                            </div>
                        
                            <div class="col-md-3" id="imageTituloField">
                                <label for="imagen_titulo_original" class="btn btn-dark btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN TÍTULO ORIGINAL</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_titulo_original[]" 
                                id="imagen_titulo_original" 
                                class="form-control d-none" 
                                multiple
                                value="{{ old('imagen_titulo_original') }}">
                                <div id="imagen_titulo_original_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_dni" class="btn btn-warning btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN DNI</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_dni[]" 
                                id="imagen_dni" 
                                class="form-control-file" 
                                multiple
                                value="{{ old('imagen_dni') }}"
                                >
                                <div id="imagen_dni_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_tamano_carnet" class="btn btn-info btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN TAMAÑO CARNET</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_tamano_carnet[]" 
                                id="imagen_tamano_carnet" 
                                class="form-control-file" 
                                multiple
                                value="{{ old('imagen_tamano_carnet') }}"
                                >
                                <div id="imagen_tamano_carnet_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="pdf_curriculum_vitae" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR CURRICULUM VITAE</strong>
                                </label>
                                <input 
                                type="file" 
                                name="pdf_curriculum_vitae" 
                                id="pdf_curriculum_vitae" 
                                class="form-control-file"
                                value="{{ old('pdf_curriculum_vitae') }}"
                                >
                                <div id="pdf_curriculum_vitae_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_dni_beneficiario1" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN DNI DE BENEFICIARIO 1</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_dni_beneficiario1[]" 
                                id="imagen_dni_beneficiario1" 
                                class="form-control-file" 
                                value="{{ old('imagen_dni_beneficiario1') }}" 
                                multiple
                                >
                                <div id="imagen_dni_beneficiario1_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_dni_beneficiario2" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN DNI DE BENEFICIARIO 2</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_dni_beneficiario2[]" 
                                id="imagen_dni_beneficiario2" 
                                class="form-control-file"
                                value="{{ old('imagen_dni_beneficiario2') }}"  
                                multiple
                                >
                                <div id="imagen_dni_beneficiario2_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_dni_beneficiario3" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN DNI DE BENEFICIARIO 3</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_dni_beneficiario3[]" 
                                id="imagen_dni_beneficiario3" 
                                class="form-control-file"
                                value="{{ old('imagen_dni_beneficiario3') }}"
                                multiple
                                >
                                <div id="imagen_dni_beneficiario3_preview" class="mt-2"></div>
                            </div>
                        
                            <div class="col-md-3">
                                <label for="imagen_rtn" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>AGREGAR IMAGEN RTN</strong>
                                </label>
                                <input 
                                type="file" 
                                name="imagen_rtn[]" 
                                id="imagen_rtn" 
                                class="form-control-file"
                                value="{{ old('imagen_rtn') }}"  
                                multiple
                                >
                                <div id="imagen_rtn_preview" class="mt-2"></div>
                            </div>
                        </div><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                    Enviar Solicitud
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
    function previewFiles(inputId, previewContainerId) {
        const input = document.getElementById(inputId);
        const previewContainer = document.getElementById(previewContainerId);
        
        previewContainer.innerHTML = ''; // Limpiar cualquier contenido previo

        if (input.files) {
            Array.from(input.files).forEach(file => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    let element;

                    if (file.type.startsWith('image/')) {
                        element = document.createElement('img');
                        element.src = e.target.result;
                        element.style.height = '100px';
                        element.style.margin = '5px';
                    } else if (file.type === 'application/pdf') {
                        element = document.createElement('iframe');
                        element.src = e.target.result;
                        element.style.height = '100px';
                        element.style.width = '100px';
                        element.style.margin = '5px';
                    } else if (file.type.startsWith('video/')) {
                        element = document.createElement('video');
                        element.src = e.target.result;
                        element.style.height = '100px';
                        element.style.width = '100px';
                        element.controls = true;
                        element.style.margin = '5px';
                    }

                    if (element) {
                        previewContainer.appendChild(element);
                    }
                };

                reader.readAsDataURL(file);
            });
        }
    }

    document.getElementById('imagen_titulo_original').addEventListener('change', function() {
        previewFiles('imagen_titulo_original', 'imagen_titulo_original_preview');
    });

    document.getElementById('imagen_dni').addEventListener('change', function() {
        previewFiles('imagen_dni', 'imagen_dni_preview');
    });

    document.getElementById('imagen_tamano_carnet').addEventListener('change', function() {
        previewFiles('imagen_tamano_carnet', 'imagen_tamano_carnet_preview');
    });

    document.getElementById('pdf_curriculum_vitae').addEventListener('change', function() {
        previewFiles('pdf_curriculum_vitae', 'pdf_curriculum_vitae_preview');
    });

    document.getElementById('imagen_dni_beneficiario1').addEventListener('change', function() {
        previewFiles('imagen_dni_beneficiario1', 'imagen_dni_beneficiario1_preview');
    });

    document.getElementById('imagen_dni_beneficiario2').addEventListener('change', function() {
        previewFiles('imagen_dni_beneficiario2', 'imagen_dni_beneficiario2_preview');
    });

    document.getElementById('imagen_dni_beneficiario3').addEventListener('change', function() {
        previewFiles('imagen_dni_beneficiario3', 'imagen_dni_beneficiario3_preview');
    });

    document.getElementById('imagen_rtn').addEventListener('change', function() {
        previewFiles('imagen_rtn', 'imagen_rtn_preview');
    });
</script>


@endsection
