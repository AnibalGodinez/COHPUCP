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


            <div class="info-area info-horizontal">
                <div class="icon icon-info">
                    <i class="tim-icons icon-badge"></i>
                </div>
                <div class="description">
                    <h3 class="info-title">{{ _('Plataforma de perfiles de agenda') }}</h3>
                    <p class="description">
                        {{ _('La Plataforma de perfiles de agenda es una herramienta en línea para organizar perfiles de usuarios y sus agendas. Permite gestionar eventos, citas y reuniones de manera eficiente, optimizando la planificación y la coordinación.') }}
                    </p>
                </div>
            </div>


            <div class="info-area info-horizontal">
                <div class="icon icon-disabled">
                    <i class="tim-icons icon-money-coins"></i>
                </div>
                <div class="description">
                    <h3 class="info-title">{{ _('Plataforma de gestión') }}</h3>
                    <p class="description">
                        {{ _('La Plataforma de gestión es una herramienta en línea que administra proyectos, equipos de manera eficiente. Permite organizar tareas, asignar responsabilidades, dar seguimiento al progreso y facilitar la comunicación entre miembros del equipo.') }}
                    </p>
                </div>
            </div>


            <div class="info-area info-horizontal">
                <div class="icon icon-info">
                    <i class="tim-icons icon-chat-33"></i>
                </div>
                <div class="description">
                    <h3 class="info-title">{{ _('Plataforma de consultas') }}</h3>
                    <p class="description">
                        {{ _('La plataforma de gestión de consultas permite a los agremiados realizar consultas sobre su estado de cuentas y otros asuntos relevantes. Ofrece una interfaz donde los miembros pueden acceder fácilmente a información personalizada, agilizando el proceso y mejorando la experiencia del usuario.') }}
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
                        <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-single-02"></i>
                                </div>
                            </div>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ _('Nombre') }}" value="{{ old('name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>
                        <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-email-85"></i>
                                </div>
                            </div>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ _('Correo electrónico') }}" value="{{ old('email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ _('Contraseña') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="tim-icons icon-lock-circle"></i>
                                </div>
                            </div>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="{{ _('Confirmar contraseña') }}">
                        </div>
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
                        <button type="submit" class="btn btn-primary btn-round btn-lg">{{ _('Registrarse') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
