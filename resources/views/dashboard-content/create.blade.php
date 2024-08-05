@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>AÑADIR NUEVO CONTENIDO A LA PÁGINA PRINCIPAL</strong></h3>
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
                    <form action="{{ route('dashboard-content.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="layout">
                                    <i class="fas fa-palette" style="margin-right: 8px;"></i>
                                    <strong>DISEÑO:</strong>
                                </label>
                                <select 
                                    name="layout" 
                                    id="layout"
                                    class="form-control"
                                    onchange="toggleFields()"
                                    required>
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="Por defecto" {{ old('layout') == 'Por defecto' ? 'selected' : '' }}>Por Defecto</option>
                                    <option value="Archivos" {{ old('layout') == 'Archivos' ? 'selected' : '' }}>Archivos</option>
                                </select>
                            </div>

                            <!-- Salto de línea -->
                            <div class="w-100"></div>

                            <div class="form-group col-md-4" id="titleField">
                                <label for="title">
                                    <i class="fa-font fa-quote-left" style="margin-right: 8px;"></i>
                                    <strong>TÍTULO:</strong>
                                </label>
                                <input  
                                    type="text" 
                                    name="title" 
                                    id="title"
                                    class="form-control" 
                                    value="{{ old('title') }}"
                                    placeholder="Ingrese el título">
                            </div>
                        
                            <div class="form-group col-md-4" id="subtitleField">
                                <label for="subtitle">
                                    <i class="fa-text-height" style="margin-right: 8px;"></i>
                                    <strong>SUBTÍTULO:</strong>
                                </label>
                                <input 
                                    type="text" 
                                    name="subtitle" 
                                    id="subtitle" 
                                    class="form-control" 
                                    value="{{ old('subtitle') }}">
                            </div>

                            <!-- Salto de línea -->
                            <div class="w-100"></div>

                            <div class="form-group col-md-12" id="descriptionField">
                                <label for="description">
                                    <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                    <strong>DESCRIPCIÓN:</strong>
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description"
                                    class="form-control" 
                                    style="min-height: 150px" 
                                    placeholder="Ingrese la descripción">{{ old('description') }}</textarea>
                            </div>

                            <!-- Salto de línea -->
                            <div class="w-100"></div>

                            <!-- Campo para el link de agregar un archivo pdf -->
                            <div class="form-group col-md-4" id="pdfField">
                                <label for="pdf" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA AGREGAR UN ARCHIVO PDF</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="pdf" 
                                    id="pdf"
                                    class="form-control d-none"
                                    onchange="previewPDF()">

                                    <!-- Previsualización del PDF -->
                                    <div class="form-group">
                                        <iframe id="pdfPreview" src="#" style="display: none; height: 500px; width:600px;" frameborder="0"></iframe>
                                    </div>
                            </div>

                            <!-- Campo para el link de agregar una imagen -->
                            <div class="form-group col-md-4" id="imageField">
                                <label for="images" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA AGREGAR UNA IMAGEN</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="images" 
                                    id="images"
                                    class="form-control d-none"
                                    onchange="previewImage()">

                                    <!-- Imagen de previsualización de la imagen -->
                                    <div class="form-group">
                                        <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display: none; height: 500px; width: 600px;">
                                    </div>
                            </div>

                            <!-- Campo para el link de agregar un video -->
                            <div class="form-group col-md-4" id="videoField">
                                <label for="videos" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-video" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA AGREGAR UN VIDEO</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="videos" 
                                    id="videos"
                                    class="form-control d-none"
                                    onchange="previewVideo()">

                                    <!-- Previsualización del video -->
                                    <div class="form-group">
                                        <video id="videoPreview" style="display: none; height: 450px; width: 600px;" controls>
                                            <source id="videoSource" src="#" type="video/mp4">
                                            Tu navegador no soporta el elemento de video.
                                        </video>
                                    </div>
                            </div>

                            <!-- Campos de enlaces -->
                            <div class="form-group col-md-4" id="linksField">
                                <label for="links">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>
                                    <strong>LINKS:</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="links" 
                                    name="links" 
                                    value="{{ old('links') }}">
                            </div>
                            @foreach (['facebook_link', 'twitter_link', 'youtube_link', 'whatsapp_link', 'instagram_link'] as $link)
                                <div class="form-group col-md-4" id="{{ $link }}Field">
                                    <label for="{{ $link }}">
                                        @if($link == 'facebook_link')
                                            <i class="fab fa-facebook" style="margin-right: 8px; color:#0865FE"></i>
                                        @elseif($link == 'twitter_link')
                                            <i class="fab fa-x" style="margin-right: 8px; color:#000000"></i>
                                        @elseif($link == 'youtube_link')
                                            <i class="fab fa-youtube" style="margin-right: 8px; color:#FF0000"></i>
                                        @elseif($link == 'whatsapp_link')
                                            <i class="fab fa-whatsapp" style="margin-right: 8px; color:#4AC958"></i>
                                        @elseif($link == 'instagram_link')
                                            <i class="fab fa-instagram" style="margin-right: 8px; color:#FE0967"></i>
                                        @endif
                                        <strong>{{ strtoupper(str_replace('_', ' ', $link)) }}</strong>
                                    </label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="{{ $link }}" 
                                        name="{{ $link }}" 
                                        value="{{ old($link) }}">
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar
                                </button>
                                <a href="{{ route('dashboard-content.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                    Volver
                                </a>
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
        const file = document.getElementById('images').files[0];
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
        const file = document.getElementById('pdf').files[0];
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

    function previewVideo() {
        const file = document.getElementById('videos').files[0];
        const video = document.getElementById('videoPreview');
        const source = document.getElementById('videoSource');
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                source.src = e.target.result;
                video.style.display = 'block';
                video.load();
            }
            
            reader.readAsDataURL(file);
        } else {
            source.src = '#';
            video.style.display = 'none';
        }
    }

    function toggleFields() {
        const layout = document.getElementById('layout').value;
        
        const fieldsToShow = ['pdfField', 'imageField', 'videoField'];
        const fieldsToHide = ['linksField', 'facebook_linkField', 'twitter_linkField', 'youtube_linkField', 'whatsapp_linkField', 'instagram_linkField'];
        const allFields = ['titleField', 'subtitleField', 'descriptionField'].concat(fieldsToShow).concat(fieldsToHide);

        if (layout === 'Archivos') {
            // Mostrar campos de archivos y ocultar campos de enlaces y otros
            fieldsToShow.forEach(id => document.getElementById(id).style.display = 'block');
            fieldsToHide.forEach(id => document.getElementById(id).style.display = 'none');
            allFields.forEach(id => {
                if (!fieldsToShow.includes(id) && !fieldsToHide.includes(id)) {
                    document.getElementById(id).style.display = 'none';
                }
            });
        } else {
            // Mostrar todos los campos
            allFields.forEach(id => document.getElementById(id).style.display = 'block');
        }
    }

    // Ejecutar al cargar la página para manejar la persistencia de los campos después de un error
    document.addEventListener('DOMContentLoaded', function() {
        toggleFields();
    });
</script>


@endsection
