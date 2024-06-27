@extends('layouts.app')

@section('content')
<div class="col-lg-6 col-md-6 ml-auto mr-auto" style="margin-top: -100px;">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="card card-register card-white">
            <div class="card-header">
                <img src="{{ asset('white/img/card-primary.png') }}" class="card-img-top" alt="Card image">
                <h1 class="card-title" style="position: absolute; top: 20px; left: 4px; text-transform: none;">Registrarse</h1>
            </div>
            <div class="card-body" style="margin-top: -70px;">
                <p class="text-dark mb-2" style="margin-bottom: 50px;">Registrate para que ingreses a la <strong>Plataforma Tecnológica del COHPUCP.</strong></p>

                <div class="form-row">
                    <!-- Campo para el primer nombre -->
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Primer nombre') }}" value="{{ old('name') }}">
                        @include('alerts.feedback', ['field' => 'name'])
                    </div>
                    <!-- Campo para el segundo nombre -->
                    <div class="input-group{{ $errors->has('name2') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="name2" class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" placeholder="{{ _('Segundo nombre') }}" value="{{ old('name2') }}">
                        @include('alerts.feedback', ['field' => 'name2'])
                    </div>
                    <!-- Campo para el primer apellido -->
                    <div class="input-group{{ $errors->has('apellido') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ _('Primer apellido') }}" value="{{ old('apellido') }}">
                        @include('alerts.feedback', ['field' => 'apellido'])
                    </div>
                    <!-- Campo para el segundo apellido -->
                    <div class="input-group{{ $errors->has('apellido2') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input type="text" name="apellido2" class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" placeholder="{{ _('Segundo apellido') }}" value="{{ old('apellido2') }}">
                        @include('alerts.feedback', ['field' => 'apellido2'])
                    </div>
                    <!-- Campo para el número de identidad -->
                    <div class="input-group{{ $errors->has('numero_identidad') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-badge"></i>
                            </div>
                        </div>
                        <input type="text" name="numero_identidad" class="form-control{{ $errors->has('numero_identidad') ? ' is-invalid' : '' }}" placeholder="{{ _('Número de identidad') }}" value="{{ old('numero_identidad') }}">
                        @include('alerts.feedback', ['field' => 'numero_identidad'])
                    </div>
                    <!-- Campo para el número de colegiación -->
                    <div class="input-group{{ $errors->has('numero_colegiacion') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-badge"></i>
                            </div>
                        </div>
                        <input type="text" name="numero_colegiacion" class="form-control{{ $errors->has('numero_colegiacion') ? ' is-invalid' : '' }}" placeholder="{{ _('Número de colegiación') }}" value="{{ old('numero_colegiacion') }}">
                        @include('alerts.feedback', ['field' => 'numero_colegiacion'])
                    </div>
                    <!-- Campo para RTN -->
                    <div class="input-group{{ $errors->has('rtn') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-notes"></i>
                            </div>
                        </div>
                        <input type="text" name="rtn" class="form-control{{ $errors->has('rtn') ? ' is-invalid' : '' }}" placeholder="{{ _('RTN') }}" value="{{ old('rtn') }}">
                        @include('alerts.feedback', ['field' => 'rtn'])
                    </div>
                    <!-- Campo para sexo -->
                    <div class="input-group{{ $errors->has('sexo') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                            <option value="">{{ _('Seleccione sexo') }}</option>
                            <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>{{ _('Masculino') }}</option>
                            <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>{{ _('Femenino') }}</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'sexo'])
                    </div>
                    <!-- Campo para fecha de nacimiento -->
                    <div class="input-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-calendar-60"></i>
                            </div>
                        </div>
                        <input type="date" name="fecha_nacimiento" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" placeholder="{{ _('Fecha de nacimiento') }}" value="{{ old('fecha_nacimiento') }}">
                        @include('alerts.feedback', ['field' => 'fecha_nacimiento'])
                    </div>
                    <!-- Campo para teléfono -->
                    <div class="input-group{{ $errors->has('telefono') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
                        <input type="text" name="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ _('Teléfono') }}" value="{{ old('telefono') }}">
                        @include('alerts.feedback', ['field' => 'telefono'])
                    </div>
                    <!-- Campo para teléfono celular -->
                    <div class="input-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
                        <input type="text" name="telefono_celular" class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" placeholder="{{ _('Teléfono celular') }}" value="{{ old('telefono_celular') }}">
                        @include('alerts.feedback', ['field' => 'telefono_celular'])
                    </div>
                    <!-- Campo para correo electrónico -->
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico') }}" value="{{ old('email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <!-- Campo para la contraseña -->
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Contraseña') }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                    <!-- Campo para la confirmación de la contraseña -->
                    <div class="input-group form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirmar contraseña') }}">
                    </div>
                    <!-- Campo para los términos y condiciones -->
                    <div class="form-check mt-3 {{ $errors->has('agree_terms_and_conditions') ? ' has-danger' : '' }} form-group col-md-6">
                        <label class="form-check-label">
                            <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions" type="checkbox" {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                            <span class="form-check-sign"></span> Estoy de acuerdo con los
                            <a href="#">Términos y condiciones</a>.
                            @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                        </label>
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Registrarse</button>
                    <div class="pull-left">
                        <h6 class="card-footer">
                            <a href="{{ route('login') }}" class="link footer-link">¿Ya tienes una cuenta? Inicia sesión aquí</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
