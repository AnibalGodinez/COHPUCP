@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="title">Perfil</h3>
                </div>

                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                    
                        @include('alerts.success')

                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-3">
                                <label>Primer nombre</label>
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Primer nombre') }}" value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <!-- Campo para el segundo nombre -->
                            <div class="form-group{{ $errors->has('name2') ? ' has-danger' : '' }} col-md-3">
                                <label>Segundo nombre</label>
                                <input type="text" name="name2" class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" placeholder="{{ __('Segundo nombre') }}" value="{{ old('name2', auth()->user()->name2) }}">
                                @include('alerts.feedback', ['field' => 'name2'])
                            </div>

                            <!-- Campo para el primer apellido -->
                            <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }} col-md-3">
                                <label>Primer apellido</label>
                                <input type="text" name="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ __('Primer apellido') }}" value="{{ old('apellido', auth()->user()->apellido) }}">
                                @include('alerts.feedback', ['field' => 'apellido'])
                            </div>

                            <!-- Campo para el segundo apellido -->
                            <div class="form-group{{ $errors->has('apellido2') ? ' has-danger' : '' }} col-md-3">
                                <label>Segundo apellido</label>
                                <input type="text" name="apellido2" class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" placeholder="{{ __('Segundo apellido') }}" value="{{ old('apellido2', auth()->user()->apellido2) }}">
                                @include('alerts.feedback', ['field' => 'apellido2'])
                            </div>

                            <!-- Campo para el número de identidad -->
                            <div class="form-group{{ $errors->has('numero_identidad') ? ' has-danger' : '' }} col-md-3">
                                <label>Número de identidad</label>
                                <input type="text" name="numero_identidad" class="form-control{{ $errors->has('numero_identidad') ? ' is-invalid' : '' }}" placeholder="{{ __('Número de identidad') }}" value="{{ old('numero_identidad', auth()->user()->numero_identidad) }}">
                                @include('alerts.feedback', ['field' => 'numero_identidad'])
                            </div>

                            <!-- Campo para el número de colegiación -->
                            <div class="form-group{{ $errors->has('numero_colegiacion') ? ' has-danger' : '' }} col-md-3">
                                <label>Número de colegiación</label>
                                <input type="text" name="numero_colegiacion" class="form-control{{ $errors->has('numero_colegiacion') ? ' is-invalid' : '' }}" placeholder="{{ __('Número de colegiación') }}" value="{{ old('numero_colegiacion', auth()->user()->numero_colegiacion) }}">
                                @include('alerts.feedback', ['field' => 'numero_colegiacion'])
                            </div>

                            <!-- Campo para el RTN -->
                            <div class="form-group{{ $errors->has('rtn') ? ' has-danger' : '' }} col-md-3">
                                <label>RTN</label>
                                <input type="text" name="rtn" class="form-control{{ $errors->has('rtn') ? ' is-invalid' : '' }}" placeholder="{{ __('RTN') }}" value="{{ old('rtn', auth()->user()->rtn) }}">
                                @include('alerts.feedback', ['field' => 'rtn'])
                            </div>

                            <!-- Campo para el Sexo -->
                            <div class="form-group{{ $errors->has('sexo') ? ' has-danger' : '' }} col-md-3">
                                <label>Sexo</label>
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                    <option value="masculino" {{ old('sexo', auth()->user()->sexo) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo', auth()->user()->sexo) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'sexo'])
                            </div>

                            <!-- Campo para la Fecha de Nacimiento -->
                            <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }} col-md-3">
                                <label>Fecha de Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" value="{{ old('fecha_nacimiento', auth()->user()->fecha_nacimiento) }}">
                                @include('alerts.feedback', ['field' => 'fecha_nacimiento'])
                            </div>

                            <!-- Campo para el teléfono -->
                            <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} col-md-3">
                                <label>Teléfono</label>
                                <input type="text" name="telefono" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono') }}" value="{{ old('telefono', auth()->user()->telefono) }}">
                                @include('alerts.feedback', ['field' => 'telefono'])
                            </div>

                            <!-- Campo para el teléfono celular -->
                            <div class="form-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }} col-md-3">
                                <label>Teléfono celular</label>
                                <input type="text" name="telefono_celular" class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" placeholder="{{ __('telefono_celular') }}" value="{{ old('telefono', auth()->user()->telefono_celular) }}">
                                @include('alerts.feedback', ['field' => 'telefono_celular'])
                            </div>

                            <!-- Campo para el correo electrónico -->
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-3">
                                <label>Correo electrónico</label>
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico') }}" value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>
                    </div>                   
                </form>
            </div>

        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('white') }}/img/emilyz.jpg" alt="">
                                <div class="name-container">
                                    <h5 class="title">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h5>
                                </div>
                            </a>                            
                        </div>
                    </p>
                    <div class="card-description">
                        {{ _('Apasionado por la tecnología y el desarrollo web. Disfruto aprender nuevas habilidades y colaborar en proyectos innovadores. En mi tiempo libre, me gusta leer libros de ciencia ficción y practicar senderismo.') }}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="button-container">
                        <button class="btn btn-icon btn-round btn-facebook">
                            <i class="fab fa-facebook"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-twitter">
                            <i class="fab fa-twitter"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-google">
                            <i class="fab fa-google-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
