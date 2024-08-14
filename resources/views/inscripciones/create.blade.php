@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>INSCRIBIRSE AL COLEGIO</strong></h3>
                </div>

                <!-- Mostrar mensajes de error para los campos -->
                @if ($errors->any())
                    <div class="alert alert-danger mx-4 mt-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('inscripciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre Completo</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" aria-label="Nombre completo" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" aria-label="Documento Nacional de Identidad" value="{{ old('dni') }}" required>
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" aria-label="Correo electrónico" value="{{ old('correo') }}" required>
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="universidad">Universidad</label>
                            <input type="text" class="form-control @error('universidad') is-invalid @enderror" id="universidad" name="universidad" aria-label="Universidad" value="{{ old('universidad') }}" required>
                            @error('universidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen_titulo">Imágenes del Título Universitario (Frontal y Reverso)</label>
                            <input type="file" class="form-control @error('imagen_titulo') is-invalid @enderror" id="imagen_titulo" name="imagen_titulo[]" aria-label="Imágenes del título universitario" multiple onchange="previewFiles()">
                            @error('imagen_titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Previsualización de las imágenes del título -->
                            <div class="form-group mt-3" id="imagePreviewContainer">
                                <!-- Las imágenes se mostrarán aquí -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cv">Currículum Vitae (PDF)</label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" aria-label="Currículum vitae" accept="application/pdf" onchange="previewFile('cv', 'pdfPreview', false)" required>
                            @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Previsualización del PDF -->
                            <div class="form-group mt-3">
                                <iframe id="pdfPreview" src="#" type="application/pdf" style="display: none; max-width: 100%; height: auto;" frameborder="0"></iframe>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Inscripción</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewFiles() {
        const files = document.getElementById('imagen_titulo').files;
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        
        imagePreviewContainer.innerHTML = ''; // Limpiar cualquier previsualización existente
        
        if (files.length > 0) {
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '100%';
                    img.style.height = 'auto';
                    img.classList.add('mt-2');
                    imagePreviewContainer.appendChild(img);
                }
                reader.readAsDataURL(file);
            });
        }
    }

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

    document.getElementById('imagen_titulo').addEventListener('change', previewFiles);
    document.getElementById('cv').addEventListener('change', () => previewFile('cv', 'pdfPreview', false));
</script>

@endsection
