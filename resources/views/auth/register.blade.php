@extends('layouts.app', ['class' => 'register-page', 'page' => _('Registro'), 'contentClass' => 'register-page'])

@section('content')
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="info-area info-horizontal mt-5">
                <div class="icon icon-warning">
                    <i class="tim-icons icon-pencil"></i>
                </div>
                <div class="description">
                    <h3 class="info-title">{{ _('Plataforma Educativa') }}</h3>
                    <p class="description">
                        {{ _(' Esta plataforma facilita el acceso a recursos de aprendizaje, permite la participación en actividades formativas y promueve un estricto código de ética profesional, garantizando la confianza del público en la profesión.') }}
                    </p>
                </div>
            </div>


            <div class="info-area info-horizontal mt-5">
                <div class="icon icon-warning">
                    <i class="tim-icons icon-book"></i>
                </div>
                <div class="description">
                    <h3 class="info-title">{{ _('Plataforma de Gestión') }}</h3>
                    <p class="description">
                        {{ _(' Esta plataforma facilita el acceso a recursos de aprendizaje, permite la participación en actividades formativas y promueve un estricto código de ética profesional, garantizando la confianza del público en la profesión.') }}
                    </p>
                </div>
            </div>

        </div>    
        <div class="col-md-7 mr-auto">
            <div class="card card-register card-white">
                <div class="card-header">
                    <img class="card-img" src="{{ asset('white') }}/img/card-primary.png" alt="Card image">
                    <h4 class="card-title">{{ _('Registrarse') }}</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">

                        <!-- Campo para los nombres -->
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombres') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <!-- Campo para los apellidos -->
                        <div class="input-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ _('Apellidos') }}" value="{{ old('apellido') }}">
                            @include('alerts.feedback', ['field' => 'apellido'])
                        </div>

                        <!-- Campo para el teléfono de casa-->
                        <div class="input-group{{ $errors->has('telefono_casa') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-mobile"></i>
                                </div>
                            </div>
                            <input type="text" name="telefono_casa" class="form-control{{ $errors->has('telefono_casa') ? ' is-invalid' : '' }}" placeholder="{{ _('Teléfono casa') }}" value="{{ old('telefono_casa') }}">
                            @include('alerts.feedback', ['field' => 'telefono_casa'])
                        </div>

                        <!-- Campo para el teléfono celular-->
                        <div class="input-group{{ $errors->has('telefono_cel') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-mobile"></i>
                                </div>
                            </div>
                            <input type="text" name="telefono_cel" class="form-control{{ $errors->has('telefono_cel') ? ' is-invalid' : '' }}" placeholder="{{ _('Teléfono celular') }}" value="{{ old('telefono_cel') }}">
                            @include('alerts.feedback', ['field' => 'telefono_cel'])
                        </div>

                        <!-- Campo para el correo electrónico -->
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico') }}" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                        <!-- Campo para la contraseña -->
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Contraseña') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>

                        <!-- Confirmación de contraseña -->
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirmar contraseña') }}">
                        </div>

                        <!-- Términos y condiciones -->
                        <div class="form-check text-left {{ $errors->has('password') ? ' has-danger' : '' }}">
                            <label class="form-check-label">
                                <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions"  type="checkbox"  {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                                <span class="form-check-sign"></span>
                                {{ _('Estoy de acuerdo con los') }}
                                <a href="#">{{ _('Términos y condiciones') }}</a>.
                                @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                            </label>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-round btn-lg">{{ _('Registrarse') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
