@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>EDITAR CURSO</strong></h3>
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
                    <form action="{{ route('cursos.update', $curso->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="layout">
                                <i class="fas fa-palette" style="margin-right: 8px;"></i>
                                <strong>DISEÑO</strong>
                            </label>
                            <select name="layout" id="layout" class="form-control">
                                <option value="" disabled selected>Seleccionar diseño</option>
                                <option value="Imagen de fondo" {{ $curso->layout === 'Imagen de fondo' ? 'selected' : '' }}>Imagen de fondo</option>
                                <option value="Imagen a la derecha" {{ $curso->layout === 'Imagen a la derecha' ? 'selected' : '' }}>Imagen a la derecha</option>
                                <option value="Tarjetas de cursos" {{ $curso->layout === 'Tarjetas de cursos' ? 'selected' : '' }}>Tarjetas de cursos</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="title">
                                    <i class="fa-font fa-quote-left" style="margin-right: 8px;"></i>
                                    <strong>TÍTULO DE LOS CURSOS</strong>
                                </label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $curso->titulo) }}" placeholder="Ingrese el título para los cursos">
                            </div>

                            <div class="col-md-6">
                                <label for="subtitle">
                                    <i class="fas fa-chalkboard-teacher" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DEL CURSO</strong>
                                </label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $curso->nombre) }}" placeholder="Ingrese el nombre del curso">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description">
                                <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                <strong>DESCRIPCIÓN DEL CURSO</strong>
                            </label>
                            <textarea name="descripcion" id="descripcion" class="form-control"  placeholder="Ingrese la descripción del curso" rows="4">{{ old('descripcion', $curso->descripcion) }}</textarea>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="precio">
                                    <i class="fas fa-dollar-sign" style="margin-right: 8px;"></i>
                                    <strong>PRECIO DEL CURSO</strong>
                                </label>
                                <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio', $curso->precio) }}" placeholder="Ingrese el precio del curso">
                            </div>

                            <div class="col-md-3">
                                <label for="enlace">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>
                                    <strong>ENLACE DEL CURSO</strong>
                                </label>
                                <input type="url" name="enlace" id="enlace" class="form-control" value="{{ old('enlace', $curso->enlace) }}" placeholder="Ingrese el enlace del curso">
                            </div>

                            <div class="col-md-3">
                                <label for="icono">
                                    <i class="fas fa-icons" style="margin-right: 8px;"></i>
                                    <strong>ENLACE DE ÍCONO</strong>
                                </label>
                                <input type="url" name="icono" id="icono" class="form-control" value="{{ old('icono', $curso->icono) }}" placeholder="Ingrese el enlace del ícono">
                            </div>

                            <div class="col-md-2">
                                <label for="icono">
                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                    <strong>IDIOMA DEL CURSO</strong>
                                </label>
                                <select name="idioma_id" id="idioma_id" class="form-control">
                                    <option value="" disabled selected>Seleccionar idioma</option>
                                    @foreach ($idiomas as $idioma)
                                        <option value="{{ $idioma->id }}" {{ $idioma->id == $curso->idioma_id ? 'selected' : '' }}>
                                            {{ $idioma->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="icono">
                                    <i class="fas fa-tags" style="margin-right: 8px;"></i>
                                    <strong>CATEGORÍA DEL CURSO</strong>
                                </label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="" disabled selected>Seleccionar categoría</option>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ $categoria->id == $curso->categoria_id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="btn btn-warning btn-simple">
                                <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                <strong>CLICK PARA CAMBIAR LA IMAGEN</strong>
                            </label>
                            <input 
                                type="file" 
                                name="imagen" 
                                id="imagen"
                                class="form-control d-none"
                                onchange="previewImage()">
                            
                            <!-- Imagen de previsualización -->
                            <div class="form-group">
                                <img id="imagePreview" src="{{ $curso->imagen ? asset('storage/cursos_images/' . $curso->imagen) : 'https://via.placeholder.com/600x500?text=Vista+Previa' }}" alt="Vista previa de la imagen" style="display: {{ $curso->imagen ? 'block' : 'none' }}; height: 400px; width: 900px;">
                            </div>
                            @error('imagen')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($curso->imagen)
                            <div class="form-group">
                                <input type="checkbox" name="remove_image" id="remove_image">
                                <label for="remove_image">Eliminar imagen actual</label>
                            </div>
                        @endif

                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save"></i> Guardar cambios
                            </button>
                            <a href="{{ route('cursos.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Volver
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage() {
    var file = document.getElementById('imagen').files[0];
    var reader = new FileReader();
    reader.onloadend = function () {
        document.getElementById('imagePreview').src = reader.result;
        document.getElementById('imagePreview').style.display = 'block';
    }
    if (file) {
        reader.readAsDataURL(file);
    }
}
</script>
@endsection
