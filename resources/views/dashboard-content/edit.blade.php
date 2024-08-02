@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>EDITAR CONTENIDO DE LA PÁGINA PRINCIPAL</strong></h3>
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
                                    <option value="" disabled>Selecciona una opción</option>
                                    <option value="Por defecto" {{ $dashboardContent->layout == 'Por defecto' ? 'selected' : '' }}>Por Defecto</option>
                                    <option value="Archivos" {{ $dashboardContent->layout == 'Archivos' ? 'selected' : '' }}>Archivos</option>
                                </select>
                            </div> 
                        
                            <div class="form-group col-md-4">
                                <label for="title">
                                    <i class="fa-font fa-quote-left" style="margin-right: 8px;"></i>
                                    <strong>TÍTULO:</strong>
                                </label>
                                <input  
                                    type="text" 
                                    name="title" 
                                    id="title"
                                    class="form-control" 
                                    value="{{ old('title', $dashboardContent->title) }}"
                                    placeholder="Ingrese el título">
                            </div>
                        
                            <div class="form-group col-md-4">
                                <label for="subtitle">
                                    <i class="fa-text-height" style="margin-right: 8px;"></i>
                                    <strong>SUBTÍTULO:</strong>
                                </label>
                                <input 
                                    type="text" 
                                    name="subtitle" 
                                    id="subtitle" 
                                    class="form-control" 
                                    value="{{ old('subtitle', $dashboardContent->subtitle) }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label for="description">
                                    <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                    <strong>DESCRIPCIÓN:</strong>
                                </label>
                                <textarea 
                                    name="description" 
                                    id="description"
                                    class="form-control" 
                                    style="min-height: 150px" 
                                    placeholder="Ingrese la descripción">{{ old('description', $dashboardContent->description) }}</textarea>
                            </div>

                            <!-- Campo para el link de agregar un archivo pdf -->
                            <div class="form-group col-md-4 text-center">
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
                                    @if ($dashboardContent->pdf)
                                        <a href="{{ asset('storage/' . $dashboardContent->pdf) }}" target="_blank">Ver PDF actual</a>
                                    @endif
                                    <!-- Previsualización del PDF -->
                                    <div class="form-group">
                                        <iframe id="pdfPreview" src="#" style="display: none; height: 500px; width:600px;" frameborder="0"></iframe>
                                    </div>
                            </div>

                            <!-- Campo para el link de agregar una imagen -->
                            <div class="form-group col-md-4 text-center">
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
                                    @if ($dashboardContent->image_path)
                                        <img id="imagePreview" src="{{ asset('storage/' . $dashboardContent->image_path) }}" alt="Vista previa de la imagen" style="height: 500px; width: 600px;">
                                    @endif
                                    <!-- Imagen de previsualización de la imagen -->
                                    <div class="form-group">
                                        <img id="imagePreview" src="#" alt="Vista previa de la imagen" style="display: none; height: 500px; width: 600px;">
                                    </div>
                            </div>

                            <!-- Campo para el link de agregar un video -->
                            <div class="form-group col-md-4 text-center">
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
                                    @if ($dashboardContent->video_path)
                                        <video id="videoPreview" style="height: 450px; width: 600px;" controls>
                                            <source id="videoSource" src="{{ asset('storage/' . $dashboardContent->video_path) }}" type="video/mp4">
                                            Tu navegador no soporta el elemento de video.
                                        </video>
                                    @endif
                                    <!-- Previsualización del video -->
                                    <div class="form-group">
                                        <video id="videoPreview" style="display: none; height: 450px; width: 600px;" controls>
                                            <source id="videoSource" src="#" type="video/mp4">
                                            Tu navegador no soporta el elemento de video.
                                        </video>
                                    </div>
                            </div>

                            <!-- Campo para el link de facebook -->
                            <div class="form-group col-md-4">
                                <label for="links">
                                    <i class="fas fa-link" style="margin-right: 8px;"></i>
                                    <strong>ENLACE</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="links" 
                                    name="links" 
                                    value="{{ old('links', $dashboardContent->links) }}">
                            </div>

                            <!-- Campo para el link de twitter -->
                            <div class="form-group col-md-4">
                                <label for="twitter_link">
                                    <i class="fab fa-twitter" style="color: #1DA1F2; margin-right: 8px;"></i>
                                    <strong>ENLACE DE TWITTER</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="twitter_link" 
                                    name="twitter_link" 
                                    value="{{ old('twitter_link', $dashboardContent->twitter_link) }}">
                            </div>

                            <!-- Campo para el link de whatsapp -->
                            <div class="form-group col-md-4">
                                <label for="whatsapp_link">
                                    <i class="fab fa-whatsapp" style="color: #0089D4; margin-right: 8px;"></i>
                                    <strong>ENLACE DE WHATSAPP</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="whatsapp_link" 
                                    name="whatsapp_link" 
                                    value="{{ old('whatsapp_link', $dashboardContent->whatsapp_link) }}">
                            </div>

                            <!-- Campo para el link de telegram -->
                            <div class="form-group col-md-4">
                                <label for="telegram_link">
                                    <i class="fab fa-telegram" style="color: #0088cc; margin-right: 8px;"></i>
                                    <strong>ENLACE DE TELEGRAM</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="telegram_link" 
                                    name="telegram_link" 
                                    value="{{ old('telegram_link', $dashboardContent->telegram_link) }}">
                            </div>

                            <!-- Campo para el link de pinterest -->
                            <div class="form-group col-md-4">
                                <label for="pinterest_link">
                                    <i class="fab fa-pinterest" style="color: #e60023; margin-right: 8px;"></i>
                                    <strong>ENLACE DE PINTEREST</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="pinterest_link" 
                                    name="pinterest_link" 
                                    value="{{ old('pinterest_link', $dashboardContent->pinterest_link) }}">
                            </div>

                            <!-- Campo para el link de instagram -->
                            <div class="form-group col-md-4">
                                <label for="instagram_link">
                                    <i class="fab fa-instagram" style="color: #C13584; margin-right: 8px;"></i>
                                    <strong>ENLACE DE INSTAGRAM</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="instagram_link" 
                                    name="instagram_link" 
                                    value="{{ old('instagram_link', $dashboardContent->instagram_link) }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    {{ __('Actualizar') }}
                                </button>
                                <a href="{{ route('dashboard-content.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                    {{ __('Volver') }}
                                </a>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function toggleFields() {
        const layout = document.getElementById('layout').value;
        if (layout === 'Imagen') {
            document.getElementById('images').classList.remove('d-none');
        } else {
            document.getElementById('images').classList.add('d-none');
        }
    }

    function previewPDF() {
        const file = document.getElementById('pdf').files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const pdfPreview = document.getElementById('pdfPreview');
            pdfPreview.src = e.target.result;
            pdfPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    function previewImage() {
        const file = document.getElementById('images').files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    function previewVideo() {
        const file = document.getElementById('videos').files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const videoPreview = document.getElementById('videoPreview');
            const videoSource = document.getElementById('videoSource');
            videoSource.src = e.target.result;
            videoPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
</script>
@endsection
