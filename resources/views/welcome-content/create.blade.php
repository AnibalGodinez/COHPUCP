@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>AÑADIR NUEVO CONTENIDO A LA PÁGINA PRINCIPAL</strong></h3>
                </div>

                <!-- Mostrar mensajes de error para el campo de imagen -->
                @if ($errors->has('image_path'))
                    <div class="alert alert-danger mx-4 mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->get('image_path') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('welcome-content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="layout"><strong>DISEÑO:</strong></label>
                            <select 
                                name="layout" 
                                id="layout"
                                class="form-control"
                                onchange="toggleFields()"
                                required>
                                <option value="" disabled selected>Selecciona una opción</option>
                                <option value="Por defecto" {{ old('layout') == 'Por defecto' ? 'selected' : '' }}>Por Defecto</option>
                                <option value="Imagen a la derecha" {{ old('layout') == 'Imagen a la derecha' ? 'selected' : '' }}>Imagen a la derecha</option>
                                <option value="Imagen a la izquierda" {{ old('layout') == 'Imagen a la izquierda' ? 'selected' : '' }}>Imagen a la izquierda</option>
                                <option value="Imagen" {{ old('layout') == 'Imagen' ? 'selected' : '' }}>Imagen</option>
                                <option value="Imagen de fondo oscuro" {{ old('layout') == 'Imagen de fondo oscuro' ? 'selected' : '' }}>Imagen de fondo oscuro</option>
                                <option value="Imagen de fondo claro" {{ old('layout') == 'Imagen de fondo claro' ? 'selected' : '' }}>Imagen de fondo claro</option>
                            </select>
                        </div>                                        

                        <div class="form-group" id="titleField">
                            <label for="title"><strong>TÍTULO:</strong></label>
                            <input  
                                type="text" 
                                name="title" 
                                id="title"
                                class="form-control" 
                                value="{{ old('title') }}"
                                placeholder="Ingrese el título">
                        </div><br>

                        <div class="form-group" id="descriptionField">
                            <label for="description"><strong>DESCRIPCIÓN:</strong></label>
                            <textarea 
                                name="description" 
                                id="description"
                                class="form-control" 
                                style="min-height: 300px" 
                                placeholder="Ingrese la descripción">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image_path" class="btn btn-default btn-simple"><strong>CLICK PARA AGREGAR UNA IMAGEN</strong></label>
                            <input 
                                type="file" 
                                name="image_path" 
                                id="image_path"
                                class="form-control d-none"
                                onchange="previewImage()">
                        </div><br>
                        
                        <!-- Imagen de previsualización -->
                        <div class="form-group">
                            <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; height: auto;">
                        </div>

                        <div class="form-group">
                            <div class="d-flex justify-content-start">
                                <button type="submit" class="btn btn-success me-2">Guardar</button>
                                <a href="{{ route('welcome-content.index') }}" class="btn btn-secondary">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage() {
        const file = document.getElementById('image_path').files[0];
        const preview = document.getElementById('imagePreview');
        
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

    function toggleFields() {
        const layout = document.getElementById('layout').value;
        const titleField = document.getElementById('titleField');
        const descriptionField = document.getElementById('descriptionField');

        if (layout === 'Imagen') {
            titleField.style.display = 'none';
            descriptionField.style.display = 'none';
        } else {
            titleField.style.display = 'block';
            descriptionField.style.display = 'block';
        }
    }

    // Ejecutar al cargar la página para manejar la persistencia de los campos después de un error
    document.addEventListener('DOMContentLoaded', function() {
        toggleFields();
    });
</script>
@endsection
