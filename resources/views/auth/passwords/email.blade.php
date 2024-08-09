@extends('layouts.app')

@section('content')
    <div class="col-lg-3 col-md-6 ml-auto mr-auto" style="margin-top: -40px;">

        <form method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="card card-register card-white" style="border-radius: 12px">
                <div class="card-header">
                    <img src="{{ asset('white/img/background-1.jpg')}}" class="card-img-top" alt="Card image">
                    <h3 class="card-title" style="position: absolute; top: 20px; left: 14px; text-transform: none; font-size: 40px;">RESTABLECER CONTRASEÑA</h3>
                </div>

                <div class="card-body" style="margin-top: -70px; font-size: 1.2em;">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">
                        Ingrese su <strong><strong>correo electrónico</strong></strong> y le enviaremos un <strong><strong>enlace</strong></strong> para que pueda cambiar su contraseña
                    </p><br>
                    
                    @include('alerts.success')

                    <!-- Campo para correo electrónico -->
                    <div class="form-group col-md-10">
                        <label for="email">
                            <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                            <strong>CORREO ELECTRÓNICO *</strong>
                        </label>
                        <input 
                        type="email" 
                        name="email" 
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder="Ingresa tu correo electrónico"
                        required>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>

                    <div class="form-group row mb-0">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="fas fa-unlock-alt" style="margin-right: 8px;"></i>
                                Enviar enlace para restablecer contraseña
                            </button>
                        </div>
                    </div><br>

                </div>

            </div>
        </form>
    </div>
@endsection
