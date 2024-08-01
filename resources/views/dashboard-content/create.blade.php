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
                                    <option value="Imagen" {{ old('layout') == 'Imagen' ? 'selected' : '' }}>Imagen</option>
                                </select>
                            </div> 
                        
                            <div class="form-group col-md-4">
                                <label for="title">
                                    <i class=" fa-font fa-quote-left" style="margin-right: 8px;"></i>
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
                        
                            <div class="form-group col-md-4">
                                <label for="subtitle">
                                    <i class="fa-text-height" style="margin-right: 8px;"></i> <!-- Icono de texto adicional -->
                                    <strong>SUBTÍTULO:</strong>
                                </label>
                                <input 
                                    type="text" 
                                    name="subtitle" 
                                    id="subtitle" 
                                    class="form-control" 
                                    value="{{ old('subtitle') }}">
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
                                    placeholder="Ingrese la descripción">{{ old('description') }}</textarea>
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
                                    value="{{ old('links')}}">
                            </div>

                            <!-- Campo para el link de facebook -->
                            <div class="form-group col-md-4">
                                <label for="facebook_link">
                                    <i class="fab fa-facebook" style="color: #0865FE; margin-right: 8px;"></i>
                                    <strong>ENLACE DE FACEBOOK</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="facebook_link" 
                                    name="facebook_link" 
                                    value="{{ old('facebook_link')}}">
                            </div>

                            <!-- Campo para el link de twitter -->
                            <div class="form-group col-md-4">
                                <label for="twitter_link">
                                    <i class="fab fa-twitter" style="color: #00A2F3; margin-right: 8px;"></i>
                                    <strong>ENLACE DE TWITTER</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="twitter_link" 
                                    name="twitter_link"
                                    value="{{ old('twitter_link')}}">
                            </div>

                            <!-- Campo para el link de youtube -->
                            <div class="form-group col-md-4">
                                <label for="youtube_link">
                                    <i class="fab fa-youtube" style="color: #fa0404; margin-right: 8px;"></i>
                                    <strong>ENLACE DE YOUTUBE</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="youtube_link" 
                                    name="youtube_link" 
                                    value="{{ old('youtube_link')}}">
                            </div>

                            <!-- Campo para el link de whatsapp -->
                            <div class="form-group col-md-4">
                                <label for="whatsapp_link">
                                    <i class="fab fa-whatsapp" style="color: #4FCB5B; margin-right: 8px;"></i>
                                    <strong>ENLACE DE WHATSAPP</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="whatsapp_link" 
                                    name="whatsapp_link" 
                                    value="{{ old('whatsapp_link')}}">
                            </div>

                            <!-- Campo para el link de instagram -->
                            <div class="form-group col-md-4">
                                <label for="instagram_link">
                                    <i class="fab fa-instagram" style="color: #d46363; margin-right: 8px;"></i>
                                    <strong>ENLACE DE INSTAGRAM</strong>
                                </label>
                                <input 
                                    type="text" 
                                    class="form-control" 
                                    id="instagram_link" 
                                    name="instagram_link" 
                                    value="{{ old('instagram_link')}}">
                            </div>

                        </div>
                        <div class="form-group text">
                            <button type="submit" class="btn btn-success me-2">Guardar</button>
                            <a href="{{ route('dashboard-content.index') }}" class="btn btn-secondary">Cancelar</a>
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
