@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Inscripción de Firma</h1>

    <!-- Mostrar mensajes de error y éxito -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('inscripcion_firmas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Datos de la Sociedad -->
        <div class="card mb-3">
            <div class="card-header">Datos de la Sociedad</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre_sociedad">Nombre de la Sociedad:</label>
                    <input type="text" class="form-control" id="nombre_sociedad" name="nombre_sociedad" value="{{ old('nombre_sociedad') }}" required>
                </div>

                <div class="form-group">
                    <label for="num_inscripcion_registro_publico_comercio">Número de Inscripción en Registro Público de Comercio:</label>
                    <input type="text" class="form-control" id="num_inscripcion_registro_publico_comercio" name="num_inscripcion_registro_publico_comercio" value="{{ old('num_inscripcion_registro_publico_comercio') }}">
                </div>

                <div class="form-group">
                    <label for="fecha_constitucion">Fecha de Constitución:</label>
                    <input type="date" class="form-control" id="fecha_constitucion" name="fecha_constitucion" value="{{ old('fecha_constitucion') }}" required>
                </div>

                <div class="form-group">
                    <label for="registro_tributario_nacional">Registro Tributario Nacional:</label>
                    <input type="text" class="form-control" id="registro_tributario_nacional" name="registro_tributario_nacional" value="{{ old('registro_tributario_nacional') }}">
                </div>

                <div class="form-group">
                    <label for="num_inscripcion_camara_comercio">Número de Inscripción en Cámara de Comercio:</label>
                    <input type="text" class="form-control" id="num_inscripcion_camara_comercio" name="num_inscripcion_camara_comercio" value="{{ old('num_inscripcion_camara_comercio') }}">
                </div>

                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                </div>

                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
                </div>

                <div class="form-group">
                    <label for="celular">Celular:</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="{{ old('celular') }}" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
            </div>
        </div>

        <!-- Datos del Primer Socio -->
        <div class="card mb-3">
            <div class="card-header">Datos del Primer Socio</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="primer_nombre_socio1">Primer Nombre:</label>
                    <input type="text" class="form-control" id="primer_nombre_socio1" name="primer_nombre_socio1" value="{{ old('primer_nombre_socio1') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_nombre_socio1">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="segundo_nombre_socio1" name="segundo_nombre_socio1" value="{{ old('segundo_nombre_socio1') }}">
                </div>

                <div class="form-group">
                    <label for="primer_apellido_socio1">Primer Apellido:</label>
                    <input type="text" class="form-control" id="primer_apellido_socio1" name="primer_apellido_socio1" value="{{ old('primer_apellido_socio1') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_apellido_socio1">Segundo Apellido:</label>
                    <input type="text" class="form-control" id="segundo_apellido_socio1" name="segundo_apellido_socio1" value="{{ old('segundo_apellido_socio1') }}">
                </div>

                <div class="form-group">
                    <label for="num_colegiacion_socio1">Número de Colegiación:</label>
                    <input type="text" class="form-control" id="num_colegiacion_socio1" name="num_colegiacion_socio1" value="{{ old('num_colegiacion_socio1') }}">
                </div>

                <div class="form-group">
                    <label for="imagen_firma_socio1">Imagen de Firma del Socio 1:</label>
                    <input type="file" class="form-control-file" id="imagen_firma_socio1" name="imagen_firma_socio1" onchange="previewImage(event, 'preview_socio1')">
                    <br>
                    <img id="preview_socio1" src="#" alt="Vista previa de la firma del Socio 1" style="display: none; max-width: 100px; max-height: 100px;">
                </div>
            </div>
        </div>

        <!-- Datos del Segundo Socio -->
        <div class="card mb-3">
            <div class="card-header">Datos del Segundo Socio</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="primer_nombre_socio2">Primer Nombre:</label>
                    <input type="text" class="form-control" id="primer_nombre_socio2" name="primer_nombre_socio2" value="{{ old('primer_nombre_socio2') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_nombre_socio2">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="segundo_nombre_socio2" name="segundo_nombre_socio2" value="{{ old('segundo_nombre_socio2') }}">
                </div>

                <div class="form-group">
                    <label for="primer_apellido_socio2">Primer Apellido:</label>
                    <input type="text" class="form-control" id="primer_apellido_socio2" name="primer_apellido_socio2" value="{{ old('primer_apellido_socio2') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_apellido_socio2">Segundo Apellido:</label>
                    <input type="text" class="form-control" id="segundo_apellido_socio2" name="segundo_apellido_socio2" value="{{ old('segundo_apellido_socio2') }}">
                </div>

                <div class="form-group">
                    <label for="num_colegiacion_socio2">Número de Colegiación:</label>
                    <input type="text" class="form-control" id="num_colegiacion_socio2" name="num_colegiacion_socio2" value="{{ old('num_colegiacion_socio2') }}">
                </div>

                <div class="form-group">
                    <label for="imagen_firma_socio2">Imagen de Firma del Socio 2:</label>
                    <input type="file" class="form-control-file" id="imagen_firma_socio2" name="imagen_firma_socio2" onchange="previewImage(event, 'preview_socio2')">
                    <br>
                    <img id="preview_socio2" src="#" alt="Vista previa de la firma del Socio 2" style="display: none; max-width: 100px; max-height: 100px;">
                </div>
            </div>
        </div>

        <!-- Datos del Tercer Socio -->
        <div class="card mb-3">
            <div class="card-header">Datos del Tercer Socio</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="primer_nombre_socio3">Primer Nombre:</label>
                    <input type="text" class="form-control" id="primer_nombre_socio3" name="primer_nombre_socio3" value="{{ old('primer_nombre_socio3') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_nombre_socio3">Segundo Nombre:</label>
                    <input type="text" class="form-control" id="segundo_nombre_socio3" name="segundo_nombre_socio3" value="{{ old('segundo_nombre_socio3') }}">
                </div>

                <div class="form-group">
                    <label for="primer_apellido_socio3">Primer Apellido:</label>
                    <input type="text" class="form-control" id="primer_apellido_socio3" name="primer_apellido_socio3" value="{{ old('primer_apellido_socio3') }}" required>
                </div>

                <div class="form-group">
                    <label for="segundo_apellido_socio3">Segundo Apellido:</label>
                    <input type="text" class="form-control" id="segundo_apellido_socio3" name="segundo_apellido_socio3" value="{{ old('segundo_apellido_socio3') }}">
                </div>

                <div class="form-group">
                    <label for="num_colegiacion_socio3">Número de Colegiación:</label>
                    <input type="text" class="form-control" id="num_colegiacion_socio3" name="num_colegiacion_socio3" value="{{ old('num_colegiacion_socio3') }}">
                </div>

                <div class="form-group">
                    <label for="imagen_firma_socio3">Imagen de Firma del Socio 3:</label>
                    <input type="file" class="form-control-file" id="imagen_firma_socio3" name="imagen_firma_socio3" onchange="previewImage(event, 'preview_socio3')">
                    <br>
                    <img id="preview_socio3" src="#" alt="Vista previa de la firma del Socio 3" style="display: none; max-width: 100px; max-height: 100px;">
                </div>
            </div>
        </div>

        <!-- Firmas -->
        <div class="card mb-3">
            <div class="card-header">Firmas</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="imagen_firma_social">Imagen de Firma Social:</label>
                    <input type="file" class="form-control-file" id="imagen_firma_social" name="imagen_firma_social" onchange="previewImage(event, 'preview_social')">
                    <br>
                    <img id="preview_social" src="#" alt="Vista previa de la firma social" style="display: none; max-width: 100px; max-height: 100px;">
                </div>

                <div class="form-group">
                    <label for="imagen_firma_representante_legal">Imagen de Firma del Representante Legal:</label>
                    <input type="file" class="form-control-file" id="imagen_firma_representante_legal" name="imagen_firma_representante_legal" onchange="previewImage(event, 'preview_representante')">
                    <br>
                    <img id="preview_representante" src="#" alt="Vista previa de la firma del representante legal" style="display: none; max-width: 100px; max-height: 100px;">
                </div>
            </div>
        </div>

        <!-- Estado y Descripción -->
        <div class="card mb-3">
            <div class="card-header">Estado y Descripción</div>
            <div class="card-body">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-control" id="estado" name="estado" required>
                        <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="aprobado" {{ old('estado') == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                        <option value="rechazado" {{ old('estado') == 'rechazado' ? 'selected' : '' }}>Rechazado</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="descripcion_estado_solicitud">Descripción del Estado de Solicitud:</label>
                    <textarea class="form-control" id="descripcion_estado_solicitud" name="descripcion_estado_solicitud">{{ old('descripcion_estado_solicitud') }}</textarea>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
<script>
    function previewImage(event, previewId) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById(previewId);
            output.src = reader.result;
            output.style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
