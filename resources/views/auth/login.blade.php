@extends('layouts.app', ['class' => 'login-page', 'page' => _('Inicio de sesión'), 'contentClass' => 'login-page'])

@section('content')

    <div class="col-lg-5 col-md-6 ml-auto mr-auto" style="margin-top: -70px;">

        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-white">

                <div class="card-header">
                    <img src="{{ asset('white') }}/img/card-primary.png" alt="">
                    <h1 class="card-title" style="top: 20px; left: 4px; text-transform: none;">Iniciar sesión</h1>
                </div>

                <div class="card-body">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">Inicia sesión con <strong>contacto@correo.com </strong> y la contraseña <strong>secreta </strong></p> <!-- Ajuste del margen bottom -->
                    
                    <div class="input-group{{ $errors->has('login_type') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="text" name="login_type" class="form-control{{ $errors->has('login_type') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico o número de colegiación') }}" value="{{ old('login_type') }}">
                        @include('alerts.feedback', ['field' => 'login_type'])
                    </div>
                    
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" placeholder="{{ _('Contraseña') }}" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    
                    @if ($errors->has('estado'))
                        <div class="alert alert-danger" role="alert">
                            {{ $errors->first('estado') }}
                        </div>
                    @endif
                </div>
                
                <div class="card-footer">
                    <button type="submit" href="" class="btn btn-info btn-lg btn-block mb-3">Ingresar</button>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link">Crear una cuenta</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('password.request') }}" class="link footer-link">¿Has olvidado tu contraseña?</a>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
