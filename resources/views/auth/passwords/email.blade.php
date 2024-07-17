@extends('layouts.app')

@section('content')
    <div class="col-lg-3 col-md-6 ml-auto mr-auto" style="margin-top: -120px;">

        <form method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="card card-register card-white">
                <div class="card-header">
                    <img src="{{ asset('white/img/card-primary.png')}}" class="card-img-top" alt="Card image">
                    <h2 class="card-title" style="position: absolute; top: 20px; left: 4px; text-transform: none;">Restablecer contraseña</h2>
                </div>

                <div class="card-body" style="margin-top: -70px;">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">Te enviaremos un <strong>link </strong>a tu <strong>correo electrónico </strong> para que puedas cambiar tu contraseña.</p><br>
                    @include('alerts.success')

                    <div class="form-group col-md-10">
                        <label for="email">
                            <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                            <strong>Correo electrónico *</strong>
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
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Enviar enlace para restablecer contraseña</button>
                </div>

            </div>
        </form>
    </div>
@endsection
