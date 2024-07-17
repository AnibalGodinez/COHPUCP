@extends('layouts.app', ['class' => 'login-page', 'page' => _('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-3 col-md-6 ml-auto mr-auto" style="margin-top: -120px;">

        <form method="post" action="{{ route('password.update') }}">
            @csrf

            <div class="card card-register card-white">
                <div class="card-header">
                    <img src="{{ asset('white/img/card-primary.png')}}" class="card-img-top" alt="Card image">
                    <h2 class="card-title" style="position: absolute; top: 20px; left: 4px; text-transform: none;">Restablecer contraseña</h2>
                </div>

                <div class="card-body" style="margin-top: -70px;">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">Ingresa tu <strong>correo, nueva contraseña y la confirmacíon de la nueva contraseña.</p><br>
                    @include('alerts.success')

                    <input type="hidden" name="token" value="{{ $token }}">
                    
                    <!-- Campo para correo electrónico -->
                    <div class="form-group col-md-12">
                        <label for="email">
                            <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                            <strong>Correo electrónico *</strong>
                        </label>
                        <input 
                        type="email" 
                        name="email" 
                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder="Ingrese el correo electrónico">
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Campo para la contraseña -->
                    <div class="form-group col-md-12">
                        <label for="password">
                            <i class="fas fa-lock" style="margin-right: 8px;"></i>
                            <strong>Nueva contraseña *</strong>
                        </label>
                        <input 
                        type="password" 
                        name="password" 
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                        placeholder="Ingrese la nueva contraseña">
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Campo para la confirmación de la contraseña -->
                    <div class="form-group col-md-12">
                        <label for="password_confirmation">
                            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                            <strong>Confirmar la nueva contraseña *</strong>
                        </label>
                        <input 
                        type="password" 
                        name="password_confirmation" 
                        class="form-control" 
                        placeholder="Confirmar la nueva contraseña">
                    </div>
                </div><br>

                <div class="card-footer" style="margin-top: -40px;">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Restablecer contraseña</button>
                </div>

            </div>
        </form>
    </div>
@endsection
