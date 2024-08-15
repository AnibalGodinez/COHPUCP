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
                            <label for="name">Primer Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" aria-label="Nombre" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="numero_identidad">DNI</label>
                            <input type="text" class="form-control @error('numero_identidad') is-invalid @enderror" id="numero_identidad" name="numero_identidad" aria-label="Documento Nacional de Identidad" value="{{ old('numero_identidad') }}" required>
                            @error('numero_identidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-label="Correo electrónico" value="{{ old('email') }}" required>
                            @error('email')
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


                        <div class="form-group row">
                            <!-- VII. Documentos -->
                            <div class="col-12 text-center mb-0">
                                <h4 style="text-decoration: underline;">VIII. DOCUMENTOS</h4>
                            </div>

                            <!-- Campo para subir las imágenes del Título Universitario -->
                            <div class="col-md-3">
                                <label for="imagen_titulo" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>Subir título universitario *</strong>
                                </label>
                                frontal y reverso
                                <input type="file" class="form-control @error('imagen_titulo') is-invalid @enderror" id="imagen_titulo" name="imagen_titulo[]" aria-label="Imágenes del título universitario" multiple onchange="previewFiles()">
                                @error('imagen_titulo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3" id="imagePreviewContainer">
                                </div>
                            </div>


                            <!-- Campo para subir la imagen del Curriculum Vitae -->
                            <div class="col-md-3">
                                <label for="cv" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>Currículum Vitae *</strong>
                                </label>
                                PDF (Mínimo 3 páginas)
                                <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" aria-label="Currículum vitae" accept="application/pdf" onchange="previewFile('cv', 'pdfPreview', false)" required>
                                @error('cv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="form-group mt-3">
                                    <iframe id="pdfPreview" src="#" type="application/pdf" style="display: none; max-width: 100%; height: auto;" frameborder="0"></iframe>
                                </div>
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
