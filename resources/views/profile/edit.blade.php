@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center col-sm-8" style="margin-top: 15px">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-body">
                    <h2 class="card-title text-center font-weight-bold">Editar perfil</h2>
                    
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one bg-info"></div>
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
                        <button class="btn btn-icon btn-round btn-instagram">
                            <i class="fab fa-instagram"></i>
                        </button>
                        <button class="btn btn-icon btn-round btn-linkedin">
                            <i class="fab fa-linkedin"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-center col-sm-8">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        <h2 class="card-title text-center">Información</h2><br>
                        @csrf
                        @method('put')
                    
                        @include('alerts.success')

                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Primer nombre *</strong></label>
                                <input 
                                type="text" 
                                name="name"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras" 
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                placeholder="Primer nombre" 
                                value="{{ old('name', auth()->user()->name) }}">
                                @include('alerts.feedback', ['field' => 'name'])
                            </div>

                            <!-- Campo para el segundo nombre -->
                            <div class="form-group{{ $errors->has('name2') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Segundo nombre</strong></label>
                                <input 
                                type="text" 
                                name="name2" 
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" 
                                placeholder="Segundo nombre" 
                                value="{{ old('name2', auth()->user()->name2) }}">
                                @include('alerts.feedback', ['field' => 'name2'])
                            </div>

                            <!-- Campo para el primer apellido -->
                            <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Primer apellido *</strong></label>
                                <input 
                                type="text" 
                                name="apellido"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras" 
                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                                placeholder="Primer apellido" 
                                value="{{ old('apellido', auth()->user()->apellido) }}">
                                @include('alerts.feedback', ['field' => 'apellido'])
                            </div>

                            <!-- Campo para el segundo apellido -->
                            <div class="form-group{{ $errors->has('apellido2') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Segundo apellido</strong></label>
                                <input 
                                type="text" 
                                name="apellido2"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" 
                                placeholder="{{ __('Segundo apellido') }}" 
                                value="{{ old('apellido2', auth()->user()->apellido2) }}">
                                @include('alerts.feedback', ['field' => 'apellido2'])
                            </div>

                            <!-- Campo para el número de identidad -->
                            <div class="form-group{{ $errors->has('numero_identidad') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>DNI *</strong></label>
                                <input 
                                type="text" 
                                name="numero_identidad" 
                                class="form-control{{ $errors->has('numero_identidad') ? ' is-invalid' : '' }}" 
                                placeholder="0000-0000-00000 (INGRESE LOS GUIONES)"
                                maxlength="15" 
                                pattern="\d{4}-\d{4}-\d{5}"
                                value="{{ old('numero_identidad', auth()->user()->numero_identidad) }}">
                                @include('alerts.feedback', ['field' => 'numero_identidad'])
                            </div>

                            <!-- Campo para el número de colegiación -->
                            <div class="form-group{{ $errors->has('numero_colegiacion') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Número de colegiación</strong></label>
                                <input 
                                type="text" 
                                name="numero_colegiacion" 
                                class="form-control{{ $errors->has('numero_colegiacion') ? ' is-invalid' : '' }}" 
                                placeholder="0000-00-0000 (INGRESE LOS GUIONES)"
                                value="{{ old('numero_colegiacion', auth()->user()->numero_colegiacion) }}"
                                maxlength="12" 
                                pattern="\d{4}-\d{2}-\d{4}">
                                @include('alerts.feedback', ['field' => 'numero_colegiacion'])
                            </div>

                            <!-- Campo para el RTN -->
                            <div class="form-group{{ $errors->has('rtn') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>RTN</strong></label>
                                <input 
                                type="text" 
                                name="rtn" 
                                class="form-control{{ $errors->has('rtn') ? ' is-invalid' : '' }}" 
                                placeholder="0000-0000-000000 (INGRESE LOS GUIONES)"
                                value="{{ old('rtn', auth()->user()->rtn) }}"
                                maxlength="16" 
                                pattern="\d{4}-\d{4}-\d{6}">
                                @include('alerts.feedback', ['field' => 'rtn'])
                            </div>

                            <!-- Campo para el Sexo -->
                            <div class="form-group{{ $errors->has('sexo') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Sexo *</strong></label>
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                    <option value="masculino" {{ old('sexo', auth()->user()->sexo) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo', auth()->user()->sexo) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'sexo'])
                            </div>

                            <!-- Campo para la Fecha de Nacimiento -->
                            <div class="form-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Fecha de nacimiento *</strong></label>
                                <input 
                                type="date" 
                                name="fecha_nacimiento" 
                                class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" 
                                value="{{ old('fecha_nacimiento', auth()->user()->fecha_nacimiento) }}">
                                @include('alerts.feedback', ['field' => 'fecha_nacimiento'])
                            </div>

                            <!-- Campo para el teléfono -->
                            <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Teléfono fijo</strong></label>
                                <input 
                                type="text" 
                                name="telefono" 
                                class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                                placeholder="0000-0000 (INGRESE EL GUION)"
                                value="{{ old('telefono', auth()->user()->telefono) }}"
                                pattern="\d{4}-\d{4}"
                                maxlength="9">
                                @include('alerts.feedback', ['field' => 'telefono'])
                            </div>

                            <!-- Campo para el teléfono celular -->
                            <div class="form-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Celular *</strong></label>
                                <input 
                                type="text" 
                                name="telefono_celular" 
                                class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" 
                                placeholder="0000-0000 (INGRESE EL GUION)"
                                value="{{ old('telefono_celular', auth()->user()->telefono_celular) }}"
                                pattern="\d{4}-\d{4}"
                                maxlength="9">
                                @include('alerts.feedback', ['field' => 'telefono_celular'])
                            </div>

                            <!-- Campo para el correo electrónico -->
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-3">
                                <label><strong>Correo electrónico *</strong></label>
                                <input 
                                type="email" 
                                name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                placeholder="Ingrese su correo electrónico" 
                                value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-info">Actualizar información</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
