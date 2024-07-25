@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>EDITAR CONTENIDO DE LA PÁGINA PRINCIPAL</strong></h3>
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
                            <label for="design"><strong>DISEÑO:</strong></label>
                            <select name="design" id="design" class="form-control">
                                <option value="">Select Design</option>
                                <option value="default">Default</option>
                                <option value="image_left">Image Left</option>
                                <!-- Agrega más opciones según tus necesidades -->
                            </select>
                        </div> 

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
                            <label for="image_path" class="btn btn-default btn-simple"><strong>CLICK PARA CAMBIAR LA IMAGEN</strong></label>
                            <input 
                                type="file" 
                                name="image_path" 
                                id="image_path"
                                class="form-control d-none"
                                onchange="previewImage()">
                        </div><br>
                        
                        <!-- Imagen de previsualización -->
                        <div class="form-group">
                            <img id="imagePreview" src="{{ $welcomeContent->image_path ? asset('storage/' . $welcomeContent->image_path) : '#' }}" alt="Vista previa de la imagen" style="max-width: 100%; height: auto;">
                        </div>

                        <!-- Checkbox para eliminar imagen -->
                        @if($welcomeContent->image_path)
                            <div class="form-group">
                                <input type="checkbox" name="remove_image" id="remove_image" value="1">
                                <label for="remove_image">Eliminar imagen actual</label>
                            </div><br>
                        @endif

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
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            preview.src = '{{ $welcomeContent->image_path ? asset('storage/' . $welcomeContent->image_path) : '#' }}';
            preview.style.display = 'block';
        }
    }
</script>
@endsection
