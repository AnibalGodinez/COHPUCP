@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>INSCRIBIRSE AL COLEGIO</strong></h3>
                </div>

                <div class="card-body">
                    <form id="inscripcionForm" action="{{ route('inscripciones.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="user_identifier">
                                <strong>ID o DNI *</strong>
                            </label>
                            <div class="form-inline mt-3">
                                <input type="text" name="user_identifier" class="form-control mr-2 col-3" id="user_identifier" placeholder="INGRESE SU ID USUARIO O DNI PARA INSCRIBIRSE AL COLEGIO" required>
                                <button type="button" class="btn btn-info btn-round btn-simple" onclick="fetchUserData()">
                                    <i class="tim-icons icon-zoom-split"></i> Cargar datos para inscribirse
                                </button>
                            </div>
                        </div>

                        <div id="userData" style="display: none;">
                            <div class="form-group">
                                <label for="name">Primer Nombre</label>
                                <input type="text" class="form-control" id="name" name="name" readonly>
                            </div>

                            <div class="form-group">
                                <label for="numero_identidad">DNI</label>
                                <input type="text" class="form-control" id="numero_identidad" name="numero_identidad" readonly>
                            </div>

                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" readonly>
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function fetchUserData() {
        const identifier = document.getElementById('user_identifier').value;

        fetch(`/get-user-data/${identifier}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('name').value = data.user.name;
                    document.getElementById('numero_identidad').value = data.user.numero_identidad;
                    document.getElementById('email').value = data.user.email;
                    document.getElementById('userData').style.display = 'block';
                } else {
                    alert('Usuario no encontrado');
                }
            })
            .catch(error => console.error('Error:', error));
    }

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
