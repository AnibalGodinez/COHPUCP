@extends('layouts.app', ['class' => 'login-page', 'page' => _('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('password.update') }}">
            @csrf

            <div class="card card-login card-white" style="margin-top: -100px;">
                <div class="card-header">
                    <img src="{{ asset('white') }}/img/card-primary.png" alt="">
                    <h1 class="card-title" style=" left: 4px; text-transform: none">Restablecer contraseña</h1>
                </div>
                <div class="card-body" style="margin-top: 40px;">
                    @include('alerts.success')

                    <input type="hidden" name="token" value="{{ $token }}">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">Ingresa tu <strong>correo, nueva contraseña y la confirmacíon de la nueva contraseña.</p><br>
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Nueva contraseña') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirmar nueva contraseña') }}">
                        </div>
                </div>
                <div class="card-footer" style="margin-top: -40px;">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Restablecer contraseña</button>
                </div>
            </div>
        </form>
    </div>
@endsection
