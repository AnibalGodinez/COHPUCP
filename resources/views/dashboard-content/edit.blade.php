@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>EDITAR CONTENIDO DEL DASHBOARD</strong></h3>
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
                    <form action="{{ route('dashboard-content.update', $dashboardContent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">

                            <!-- Campo para seleccionar un nuevo diseño-->
                            <div class="form-group col-md-4">
                                <label for="layout">
                                    <i class="fas fa-palette" style="margin-right: 8px;"></i>
                                    <strong>DISEÑO</strong>
                                </label>
                                <select 
                                    name="layout" 
                                    id="layout"
                                    class="form-control"
                                    onchange="toggleFields()"
                                    required>
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option value="Por defecto" {{ $dashboardContent->layout == 'Por defecto' ? 'selected' : '' }}>Por Defecto</option>
                                    <option value="Archivos" {{ $dashboardContent->layout == 'Archivos' ? 'selected' : '' }}>Archivos</option>
                                </select>
                            </div> 
                        
                            <!-- Campo para agregar un nuevo título -->
                            <div class="form-group col-md-4">
                                <label for="title">
                                    <i class="fa-font fa-quote-left" style="margin-right: 8px;"></i>
                                    <strong>TÍTULO</strong>
                                </label>
                                <input  
                                    type="text" 
                                    name="title" 
                                    id="title"
                                    class="form-control" 
                                    value="{{ old('title', $dashboardContent->title) }}"
                                    placeholder="Ingrese el título">
                            </div>
                        
                            <!-- Campo para agregar un nuevo subtítulo -->
                            <div class="form-group col-md-4">
                                <label for="subtitle">
                                    <i class="fa-text-height" style="margin-right: 8px;"></i>
                                    <strong>SUBTÍTULO</strong>
                                </label>
                                <input 
                                    type="text" 
                                    name="subtitle" 
                                    id="subtitle" 
                                    class="form-control" 
                                    value="{{ old('subtitle', $dashboardContent->subtitle) }}"
                                    placeholder="Ingrese el subtítulo">
                            </div>

                            <!-- Campo para agregar una nueva descripción -->
                            <div class="form-group col-md-12">
                                <label for="description">
                                    <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                    <strong>DESCRIPCIÓN</strong>
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description"
                                    class="form-control" 
                                    style="min-height: 150px" 
                                    placeholder="Ingrese la descripción">{{ old('description', $dashboardContent->description) }}</textarea>
                            </div>

                             <!-- Campo para agregar un nuevo archivo pdf -->
                             <div class="form-group col-md-4 text-center">
                                <label for="pdf" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-pdf" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA CAMBIAR EL ARCHIVO PDF</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="pdf" 
                                    id="pdf"
                                    class="form-control d-none"
                                    onchange="previewPDF()">
                                @if ($dashboardContent->pdf)
                                    <embed id="pdfPreview" src="{{ asset('storage/' . $dashboardContent->pdf) }}" type="application/pdf" width="100%" height="400px">
                                    <div class="form-group">
                                        <input 
                                            type="checkbox" 
                                            name="remove_pdf" 
                                            id="remove_pdf" 
                                            value="1">
                                        <label for="remove_pdf">Eliminar archivo PDF</label>
                                    </div>
                                @endif
                            </div>

                            <!-- Campo para agregar una nueva imagen -->
                            <div class="form-group col-md-4 text-center">
                                <label for="images" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-image" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA CAMBIAR LA IMAGEN</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="images" 
                                    id="images"
                                    class="form-control d-none"
                                    onchange="previewImage()">
                                @if ($dashboardContent->images)
                                    <img id="imagePreview" src="{{ asset('storage/' . $dashboardContent->images) }}" alt="Previsualización de la imagen" width="100%" height="auto">
                                    <div class="form-group">
                                        <input 
                                            type="checkbox" 
                                            name="remove_images" 
                                            id="remove_images" 
                                            value="1">
                                        <label for="remove_images">Eliminar imagen actual</label>
                                    </div>
                                @endif
                            </div>

                            <!-- Campo para agregar una nuevo vídeo -->
                            <div class="form-group col-md-4 text-center">
                                <label for="videos" class="btn btn-default btn-simple">
                                    <i class="fas fa-file-video" style="margin-right: 8px;"></i>
                                    <strong>CLICK PARA CAMBIAR EL VIDEO</strong>
                                </label>
                                <input 
                                    type="file" 
                                    name="videos" 
                                    id="videos"
                                    class="form-control d-none"
                                    onchange="previewVideo()">
                                @if ($dashboardContent->videos)
                                    <video id="videoPreview" width="100%" height="auto" controls>
                                        <source id="videoSource" src="{{ asset('storage/' . $dashboardContent->videos) }}" type="video/mp4">
                                    </video>
                                    <div class="form-group">
                                        <input 
                                            type="checkbox" 
                                            name="remove_videos" 
                                            id="remove_videos" 
                                            value="1">
                                        <label for="remove_videos">Eliminar video actual</label>
                                    </div>
                                @endif
                            </div>

                            <!-- Campo para agregar un nuevo link -->
                            <div class="form-group col-md-4">
                                <label for="links">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>
                                    <strong>LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="links" 
                                    name="links" 
                                    value="{{ old('links', $dashboardContent->links) }}"
                                    placeholder="Ingrese el enlace">
                            </div>

                            <!-- Campo para agregar un nuevo link de facebook -->
                            <div class="form-group col-md-4">
                                <label for="facebook_link">
                                    <i class="fab fa-facebook" style="margin-right: 8px; color:#0865FE"></i>
                                    <strong>FACEBOOK LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="facebook_link" 
                                    name="facebook_link" 
                                    value="{{ old('facebook_link', $dashboardContent->facebook_link) }}"
                                    placeholder="Ingrese el facebook link">
                            </div>

                            <!-- Campo para agregar un nuevo link de twitter -->
                            <div class="form-group col-md-4">
                                <label for="twitter_link">
                                    <i class="fab fa-x" style="color:#000000; margin-right: 8px;"></i>
                                    <strong>TWITTER LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="twitter_link" 
                                    name="twitter_link" 
                                    value="{{ old('twitter_link', $dashboardContent->twitter_link) }}"
                                    placeholder="Ingrese el twitter link">
                            </div>

                            <!-- Campo para agregar un nuevo link de youtube -->
                            <div class="form-group col-md-4">
                                <label for="youtube_link">
                                    <i class="fab fa-youtube" style="color:#FF0000; margin-right: 8px;"></i>
                                    <strong>YOUTUBE LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="youtube_link" 
                                    name="youtube_link" 
                                    value="{{ old('youtube_link', $dashboardContent->youtube_link) }}"
                                    placeholder="Ingrese el youtube link">
                            </div>

                            <!-- Campo para agregar un nuevo link de whatsapp -->
                            <div class="form-group col-md-4">
                                <label for="whatsapp_link">
                                    <i class="fab fa-whatsapp" style="color:#4AC958; margin-right: 8px;"></i>
                                    <strong>WHATSAPP LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="whatsapp_link" 
                                    name="whatsapp_link" 
                                    value="{{ old('whatsapp_link', $dashboardContent->whatsapp_link) }}"
                                    placeholder="Ingrese el whatsapp link">
                            </div>

                            <!-- Campo para agregar un nuevo link de instagram -->
                            <div class="form-group col-md-4">
                                <label for="instagram_link">
                                    <i class="fab fa-instagram" style="color: #C13584; margin-right: 8px;"></i>
                                    <strong>INSTAGRAM LINK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="instagram_link" 
                                    name="instagram_link" 
                                    value="{{ old('instagram_link', $dashboardContent->instagram_link) }}"
                                    placeholder="Ingrese el instagram link">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Actualizar
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
    function toggleFields() {
        var layout = document.getElementById('layout').value;
        var pdfField = document.getElementById('pdf');
        var imageField = document.getElementById('images');
        var videoField = document.getElementById('videos');

        if (layout === 'Archivos') {
            pdfField.style.display = 'block';
            imageField.style.display = 'block';
            videoField.style.display = 'block';
        } else {
            pdfField.style.display = 'none';
            imageField.style.display = 'none';
            videoField.style.display = 'none';
        }
    }

    function previewPDF() {
        const pdfInput = document.getElementById('pdf');
        const pdfPreview = document.getElementById('pdfPreview');

        const file = pdfInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                pdfPreview.src = e.target.result;
                pdfPreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function previewImage() {
        const imageInput = document.getElementById('images');
        const imagePreview = document.getElementById('imagePreview');

        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    function previewVideo() {
        const videoInput = document.getElementById('videos');
        const videoPreview = document.getElementById('videoPreview');
        const videoSource = document.getElementById('videoSource');

        const file = videoInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                videoSource.src = e.target.result;
                videoPreview.style.display = 'block';
                videoPreview.load();
            };
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleFields(); // Llame a esta función para establecer la visibilidad inicial según el valor de diseño actual
    });
</script>
@endsection
