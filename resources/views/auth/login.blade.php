@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column flex-md-row position-relative" style="min-height: 100vh; margin-top:-65px">
    
    <!-- Sección con fondo azul y logo -->
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-white p-5 section-blue position-relative">
        <div class="text-center" style="z-index: 4; position: relative;">
            <img src="{{ asset('white/img/favicon.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 150px;">
            <p class="mt-3"><strong><strong>Si no tienes cuenta, por favor regístrese aquí antes de iniciar sesión</strong></strong></p>
        </div>

        <img src="{{ asset('white/img/login-image.png') }}" alt="Imagen Login" class="img-fluid position-absolute" style="bottom: 20px; right: 20px; max-width: 200px; z-index: 10;">

        <svg class="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 80" preserveAspectRatio="none">
            <path d="M100,0 C95,70 30,100 0,100 L110,100 Z" fill="white"/>
        </svg>
    </div>

    <!-- Sección con el formulario de Login -->
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-5 section-white position-relative">
        <!-- Imagen de fondo -->
        <div class="background-image position-absolute" style="z-index: 1;"></div>

        <div class="text-center p-4" style="width: 100%; max-width: 400px; z-index: 2;">
            <h1 class="text-dark"><strong>Inicio sesión</strong></h1>
            <form method="POST" action="{{ route('login') }}" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="login_type" class="text-dark">Correo o Número de colegiación</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </span>
                        </div>
                        <input type="text" name="login_type" class="form-control" placeholder="Ingresa el correo o Número de colegiación" value="{{ old('login_type') }}" required>
                    </div>
                    @error('login_type')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="text-dark">Contraseña</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Ingresa la contraseña" required>
                    @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info btn-lg btn-block">INGRESAR</button>
                </div>
                <div class="d-flex justify-content-between mb-4">
                    <a href="{{ route('register') }}" class="text-info font-weight-bold">Crea una cuenta</a>
                    <a href="{{ route('password.request') }}" class="text-info font-weight-bold">¿Olvidaste tu contraseña?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    /* Sección azul con logo */
    .section-blue {
        background: linear-gradient(to bottom, #0A4CA0, #1D83E5);
        min-height: 50vh; /* 50% de la altura de la ventana */
        position: relative;
        z-index: 0; /* Asegúrate de que el fondo azul esté detrás */
    }
    
    .curve {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }
    
    /* Imagen de fondo en la sección derecha */
    .background-image {
        background-image: url('{{ asset('white/img/Fondo-blanco-moderno.png') }}');
        background-size: cover;
        background-position: center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.9; /* Ajusta la opacidad de la imagen de fondo */
        z-index: 1; /* Asegúrate de que la imagen de fondo esté detrás del formulario */
    }
    
    .text-center {
        z-index: 4; /* Asegurar que el texto y el botón estén delante */
        position: relative;
    }
</style>  
@endsection
