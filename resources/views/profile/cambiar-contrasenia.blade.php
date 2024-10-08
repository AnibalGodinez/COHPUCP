@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>CAMBIAR CONTRASEÑA</strong></h3>
                    </div><br>

                    <!-- Mensaje de éxito -->
                    @if(session('password_status'))
                    <div class="text-center">
                        <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                            {{ session('password_status') }}
                            <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3 d-flex justify-content-start" style="margin-top: 15px;">
                            <div class="card mb-3" style="border: 1px solid #0e7ddf; border-radius: 30px; margin-left: 15px;">
                                <div class="card-body text-center">
                                    @if(Auth::user()->profile_image)
                                        <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Imagen de perfil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('white/img/user.jpg') }}" alt="Imagen de perfil por defecto" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                    @endif
                                    <div class="d-flex justify-content-center mb-3">
                                        <h4 class="card-title mb-0 mr-2"><strong><strong>{{ Auth::user()->name }}</strong></strong></h4>
                                        <h4 class="card-title mb-0 mr-2"><strong><strong>{{ Auth::user()->name2 }}</strong></strong></h4>
                                        <h4 class="card-title"><strong><strong>{{ Auth::user()->apellido }}</strong></strong></h4>
                                    </div>
                                    <p class="card-text">{!! nl2br(e(Auth::user()->bio)) !!}</p><br>
                                    <div class="mt-3 d-flex justify-content-center">
                                        <a href="{{ Auth::user()->facebook_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #0865FE; ">
                                            <i class="fab fa-facebook" style="font-size: 1.7em"></i>
                                        </a>
                                        <a href="{{ Auth::user()->instagram_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #C927D0">
                                            <i class="fab fa-instagram" style="font-size: 1.8em"></i>
                                        </a>
                                        <a href="{{ Auth::user()->twitter_link }}" target="_blank" class="mx-2">
                                            <img src="{{ asset('icons/X_red_social.svg') }}" alt="X" style="width: 1.5em; height: 1.5em;">
                                        </a>
                                        <a href="{{ Auth::user()->linkedin_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #0077B7">
                                            <i class="fab fa-linkedin" style="font-size: 1.7em"></i>
                                        </a>
                                    </div><br>
                                </div>
                            </div>
                        </div>
                                                                                  
                        <!-- Formulario para Cambiar la Contraseña -->
                        <div class="col-md-9">
                            <div class="card mb-3" style="border-radius: 15px;">
                                <div class="card-body">
                                    <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                                        <div class="card-body">
                                            @csrf
                                            @method('put')                                               
                                        
                                            <div class="form-row justify-content-center">
                                                <div class="form-group text-center col-md-3">
                                                    <label for="old_password"><strong>CONTRASEÑA ACTUAL *</strong></label>
                                                    <div class="input-group">
                                                        <input 
                                                        type="password" 
                                                        name="old_password" 
                                                        id="old_password"
                                                        class="form-control @error('old_password') is-invalid @enderror" 
                                                        placeholder="Ingrese la contraseña actual" 
                                                        value="{{ old('old_password') }}" 
                                                        style="text-align: center;" 
                                                        required>
                                                        <span class="input-group-text">
                                                            <i class="far fa-eye" id="toggleOldPassword" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                    @error('old_password')
                                                        <span class="invalid-feedback d-block text-center" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>                                             
                                                
                                                <div class="w-100"></div>
                                                
                                                <div class="form-group text-center col-md-3">
                                                    <label for="password"><strong>NUEVA CONTRASEÑA *</strong></label>
                                                    <div class="input-group">
                                                        <input 
                                                        type="password" 
                                                        name="password" 
                                                        id="password"
                                                        class="form-control @error('password') is-invalid @enderror" 
                                                        placeholder="Ingrese la nueva contraseña"
                                                        minlength="8"
                                                        maxlength="20"
                                                        value="{{ old('password') }}" 
                                                        required>
                                                        <span class="input-group-text">
                                                            <i class="far fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group text-center col-md-3">
                                                    <label for="password_confirmation"><strong>CONFIRMAR LA NUEVA CONTRASEÑA *</strong></label>
                                                    <div class="input-group">
                                                        <input 
                                                        type="password" 
                                                        name="password_confirmation" 
                                                        id="password_confirmation"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror" 
                                                        placeholder="Confirme la nueva contraseña"
                                                        minlength="8"
                                                        maxlength="20" 
                                                        value="{{ old('password_confirmation') }}" 
                                                        required>
                                                        <span class="input-group-text">
                                                            <i class="far fa-eye" id="toggleConfirmPassword" style="cursor: pointer;"></i>
                                                        </span>
                                                    </div>
                                                    @error('password')
                                                        <span class="invalid-feedback d-block text-center" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <script>
                                            document.getElementById('toggleOldPassword').addEventListener('click', function() {
                                                const passwordField = document.getElementById('old_password');
                                                const icon = this;
                                                // Alterna el tipo de input
                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                    icon.classList.remove('fa-eye');
                                                    icon.classList.add('fa-eye-slash');
                                                } else {
                                                    passwordField.type = 'password';
                                                    icon.classList.remove('fa-eye-slash');
                                                    icon.classList.add('fa-eye');
                                                }
                                            });
                                        
                                            document.getElementById('togglePassword').addEventListener('click', function() {
                                                const passwordField = document.getElementById('password');
                                                const icon = this;
                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                    icon.classList.remove('fa-eye');
                                                    icon.classList.add('fa-eye-slash');
                                                } else {
                                                    passwordField.type = 'password';
                                                    icon.classList.remove('fa-eye-slash');
                                                    icon.classList.add('fa-eye');
                                                }
                                            });
                                        
                                            document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
                                                const passwordField = document.getElementById('password_confirmation');
                                                const icon = this;
                                                if (passwordField.type === 'password') {
                                                    passwordField.type = 'text';
                                                    icon.classList.remove('fa-eye');
                                                    icon.classList.add('fa-eye-slash');
                                                } else {
                                                    passwordField.type = 'password';
                                                    icon.classList.remove('fa-eye-slash');
                                                    icon.classList.add('fa-eye');
                                                }
                                            });
                                        </script>
                                        
                            
                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 text-center">
                                                <button type="submit" class="btn btn-success">
                                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                                    Guardar nueva contraseña
                                                </button>
                                                <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                                    Volver
                                                </a>
                                            </div>
                                        </div>
                                        <!-- Mostrar la imagen al inicio del formulario -->
                                        <div class="text-center mb-4">
                                            <img src="{{ asset('white/img/password.png') }}" alt="Img de cambio de contraseña" style="width: 150px; height: auto; margin-left:50px; margin-top:80px;">
                                        </div>
                                    </form>                                       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
