@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>EDITAR CONTENIDO DE BIENVENIDA</strong></h3>
                </div>

                @if($errors->any())
                    <div class="alert alert-danger mx-4 mt-3">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('welcome-content.update', $welcomeContent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="title"><strong>TÍTULO:</strong></label>
                            <input  
                                type="text" 
                                name="title" 
                                id="title"
                                class="form-control" 
                                value="{{ old('title', $welcomeContent->title) }}"
                                placeholder="Ingrese el título">
                        </div><br>

                        <div class="form-group">
                            <label for="description"><strong>DESCRIPCIÓN:</strong></label>
                            <textarea 
                                name="description" 
                                id="description"
                                class="form-control" 
                                style="min-height: 400px;" 
                                placeholder="Ingrese la descripción">{{ old('description', $welcomeContent->description) }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="d-flex align-items-center">
                                <label for="image_path" class="btn btn-default btn-simple me-1"><strong>CLICK PARA CAMBIAR LA IMAGEN</strong></label>
                                @if($welcomeContent->image_path)
                                    <button type="button" class="btn btn-danger btn-simple me-1" id="removeImageButton">Eliminar imagen</button>
                                    <input type="hidden" name="remove_image" id="removeImageInput" value="0">
                                @endif
                            </div>
                            @if($welcomeContent->image_path)
                                <div class="mt-2">
                                    <img id="currentImage" src="{{ asset('storage/' . $welcomeContent->image_path) }}" alt="{{ $welcomeContent->title }}" style="max-width: 100%; height: auto;">
                                </div>
                            @endif
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
                                <button type="submit" class="btn btn-success me-2">Actualizar</button>
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
        const currentImage = document.getElementById('currentImage');

        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';

                // Hide the current image if it exists
                if (currentImage) {
                    currentImage.style.display = 'none';
                }
            }
            
            reader.readAsDataURL(file);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
        }
    }

    document.getElementById('removeImageButton')?.addEventListener('click', function() {
        if (confirm('¿Estás seguro de que quieres eliminar esta imagen?')) {
            // Hide the current image and remove button
            document.getElementById('currentImage').style.display = 'none';
            document.getElementById('removeImageButton').style.display = 'none';
            document.getElementById('removeImageInput').value = '1'; // Set value to indicate image should be removed
        }
    });
</script>
@endsection
