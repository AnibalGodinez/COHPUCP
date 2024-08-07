@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>EDITAR CURSO</strong></h3>
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
                                <strong>DISEÑO:</strong>
                            </label>
                            <select name="layout" id="layout" class="form-control" style="width: 400px;" required onchange="toggleFields()">
                                <option value="" disabled>Seleccionar diseño</option>
                                <option value="Imagen de fondo" {{ old('layout', $curso->layout) == 'Imagen de fondo' ? 'selected' : '' }}>Imagen de fondo</option>
                                <option value="Imagen a la derecha" {{ old('layout', $curso->layout) == 'Imagen a la derecha' ? 'selected' : '' }}>Imagen a la derecha</option>
                                <option value="Tarjetas de cursos" {{ old('layout', $curso->layout) == 'Tarjetas de cursos' ? 'selected' : '' }}>Tarjetas de cursos</option>
                            </select>
                            @error('layout')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="titulo">
                                    <i class="fa-font fa-quote-left" style="margin-right: 8px;"></i>
                                    <strong>TÍTULO:</strong>
                                </label>
                                <input type="text" name="titulo" id="titulo" class="form-control" value="{{ old('titulo', $curso->titulo) }}" placeholder="Ingrese un título para los cursos">
                                @error('titulo')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="nombre">
                                    <i class="fas fa-chalkboard-teacher" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DEL CURSO:</strong>
                                </label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $curso->nombre) }}" placeholder="Ingrese el nombre">
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descripcion">
                                <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                <strong>DESCRIPCIÓN DEL CURSO:</strong>
                            </label>
                            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Ingrese una descripción del curso">{{ old('descripcion', $curso->descripcion) }}</textarea>
                            @error('descripcion')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-2">
                                <label for="precio">
                                    <i class="fas fa-dollar-sign" style="margin-right: 8px;"></i>
                                    <strong>PRECIO DEL CURSO:</strong>
                                </label>
                                <input type="text" name="precio" id="precio" class="form-control" value="{{ old('precio', $curso->precio) }}" placeholder="Ingrese el precio del curso">
                                @error('precio')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="enlace">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>
                                    <strong>ENLACES DEL CURSO:</strong>
                                </label>
                                <input type="text" name="enlace" id="enlace" class="form-control" value="{{ old('enlace', $curso->enlace) }}" placeholder="Ingrese el enlace del curso">
                                @error('enlace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="icono">
                                    <i class="fas fa-icons" style="margin-right: 8px;"></i>
                                    <strong>ENLACE DE ICONO:</strong>
                                </label>
                                <input type="text" name="icono" id="icono" class="form-control" value="{{ old('icono', $curso->icono) }}" placeholder="Ingrese el enlace que redirija el icono">
                                @error('icono')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <label for="idioma_id">
                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                    <strong>IDIOMA</strong>
                                </label>
                                <select name="idioma_id" id="idioma_id" class="form-control">
                                    <option value="" disabled>Seleccionar idioma</option>
                                    @foreach($idiomas as $idioma)
                                        <option value="{{ $idioma->id }}" {{ old('idioma_id', $curso->idioma_id) == $idioma->id ? 'selected' : '' }}>
                                            {{ $idioma->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('idioma_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-2">
                                <label for="categoria_id">
                                    <i class="fas fa-tags" style="margin-right: 8px;"></i>
                                    <strong>CATEGORÍA</strong>
                                </label>
                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="" disabled>Seleccionar categoría</option>
                                    @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" {{ old('categoria_id', $curso->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                            {{ $categoria->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('categoria_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="imagen" class="btn btn-warning btn-simple">
                                <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                <strong>CLICK PARA AGREGAR UNA IMAGEN</strong>
                            </label>
                            <input 
                                type="file" 
                                name="imagen" 
                                id="imagen"
                                class="form-control d-none"
                                onchange="previewImage()">
                            
                            <!-- Imagen de previsualización -->
                            <div class="form-group">
                                <img id="imagePreview" src="{{ $curso->imagen ? asset('storage/' . $curso->imagen) : 'https://via.placeholder.com/600x500?text=Vista+Previa' }}" alt="Vista previa de la imagen" style="display: {{ $curso->imagen ? 'block' : 'none' }}; height: 500px; width: 600px;">
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
                            <button type="submit" class="btn btn-primary">
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
function toggleFields() {
    var layout = document.getElementById('layout').value;
    // Toggle visibility of fields based on layout selection if needed
}

function previewImage() {
    var file = document.getElementById('imagen').files[0];
    var reader = new FileReader();

    reader.onloadend = function () {
        var imagePreview = document.getElementById('imagePreview');
        imagePreview.src = reader.result;
        imagePreview.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        document.getElementById('imagePreview').style.display = 'none';
    }
}
</script>
@endsection
