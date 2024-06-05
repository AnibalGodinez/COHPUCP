@extends('layouts.app', ['page' => __('User Profile'), 'pageSlug' => 'profile'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="title">{{ _('Datos del usuario') }}</h3>
                </div>
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                    
                        @include('alerts.success')
                        
                        <!-- Campo para los nombres -->
                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                            <label>Nombres</label>
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Nombres') }}" value="{{ old('name', auth()->user()->name) }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>

                        <!-- Campo para los apellidos -->
                        <div class="form-group{{ $errors->has('apellido') ? ' has-danger' : '' }}">
                            <label>Apellidos</label>
                            <input type="text" name="apellido" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="{{ __('Apellidos') }}" value="{{ old('apellido', auth()->user()->apellido) }}">
                            @include('alerts.feedback', ['field' => 'apellido'])
                        </div>
                        
                        <!-- Campo para el teléfono de casa-->
                        <div class="form-group{{ $errors->has('telefono_casa') ? ' has-danger' : '' }}">
                            <label>Teléfono casa</label>
                            <input type="text" name="telefono_casa" class="form-control{{ $errors->has('telefono_casa') ? ' is-invalid' : '' }}" placeholder="{{ __('Telefono casa') }}" value="{{ old('telefono_casa', auth()->user()->telefono_casa) }}">
                            @include('alerts.feedback', ['field' => 'telefono_casa'])
                        </div>

                        <!-- Campo para el teléfono celular-->
                        <div class="form-group{{ $errors->has('telefono_cel') ? ' has-danger' : '' }}">
                            <label>Teléfono celular</label>
                            <input type="text" name="telefono_cel" class="form-control{{ $errors->has('telefono_cel') ? ' is-invalid' : '' }}" placeholder="{{ __('Teléfono celular') }}" value="{{ old('telefono_cel', auth()->user()->telefono) }}">
                            @include('alerts.feedback', ['field' => 'telefono_cel'])
                        </div>

                        <!-- Campo para el correo electrónico -->
                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <label>Correo electrónico</label>
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Correo electrónico') }}" value="{{ old('email', auth()->user()->email) }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info btn-sm">{{ _('Salvar') }}</button>
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
                            <p class="description">
                                {{ _('Desarrollador web') }}
                            </p>
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
