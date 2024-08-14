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
                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{ old('dni') }}" required>
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" class="form-control @error('correo') is-invalid @enderror" id="correo" name="correo" value="{{ old('correo') }}" required>
                            @error('correo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="universidad">Universidad</label>
                            <input type="text" class="form-control @error('universidad') is-invalid @enderror" id="universidad" name="universidad" value="{{ old('universidad') }}" required>
                            @error('universidad')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen_titulo">Imagen del Título Universitario (Frontal y Reverso)</label>
                            <input type="file" class="form-control @error('imagen_titulo') is-invalid @enderror" id="imagen_titulo" name="imagen_titulo" onchange="previewImage()">
                            @error('imagen_titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Previsualización de la imagen del título -->
                            <div class="form-group mt-3">
                                <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display: none; max-width: 100%; height: auto;">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cv">Currículum Vitae (PDF)</label>
                            <input type="file" class="form-control @error('cv') is-invalid @enderror" id="cv" name="cv" accept="application/pdf" onchange="previewPDF()" required>
                            @error('cv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- Previsualización del PDF -->
                            <div class="form-group mt-3">
                                <iframe id="pdfPreview" src="#" style="display: none; height: 500px; width: 100%;" frameborder="0"></iframe>
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
    function previewImage() {
        const file = document.getElementById('imagen_titulo').files[0];
        const imagePreview = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = '#';
            imagePreview.style.display = 'none';
        }
    }

    function previewPDF() {
        const file = document.getElementById('cv').files[0];
        const pdfPreview = document.getElementById('pdfPreview');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                pdfPreview.src = e.target.result;
                pdfPreview.style.display = 'block';
            }
            
            reader.readAsDataURL(file);
        } else {
            pdfPreview.src = '#';
            pdfPreview.style.display = 'none';
        }
    }
</script>

@endsection
