@extends('layouts.app', ['class' => 'login-page', 'page' => _('Reset password'), 'contentClass' => 'login-page'])

@section('content')
    <div class="col-lg-6 col-md-6 ml-auto mr-auto">
        <form class="form" method="post" action="{{ route('password.email') }}">
            @csrf

            <div class="card card-login card-white" style="margin-top: -100px;">
                
                <div class="card-header">
                    <img src="{{ asset('white') }}/img/card-primary.png" alt="">
                    <h1 class="card-title" style=" left: 4px; text-transform: none">Reestablecer contraseña</h1>
                </div>
                <div class="card-body" style="margin-top: 40px;">
                    <p class="text-dark mb-2" style="margin-bottom: 20px;">Te enviaremos un <strong>link </strong>a tu <strong>correo electrónico </strong> para que puedas cambiar tu contraseña.</p><br>
                    @include('alerts.success')

                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">{{ _('Enviar enlace para restablecer contraseña') }}</button>
                </div>
            </div>
        </form>
    </div>
@endsection
