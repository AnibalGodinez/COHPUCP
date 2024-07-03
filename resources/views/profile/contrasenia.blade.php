@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-content-center" style="margin-top: 15px">
        <div class="col-md-12">
            <div class="card card-user">
                <div class="card-body">
                    <h2 class="card-title text-center">Perfil</h2>
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

    <div class="container d-flex justify-content-center" style="margin-top: 0px">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="title">Actualizar contraseña</h2>
                </div>
                <form method="post" action="{{ route('profile.password') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                    
                        @include('alerts.success', ['key' => 'password_status'])
                    
                        <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }} text-center">
                            <label>Contraseña actual</label>
                            <div class="col-md-4 mx-auto">
                                <input type="password" name="old_password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }} text-center" placeholder="{{ __('Contraseña actual') }}" value="" required>
                                @include('alerts.feedback', ['field' => 'old_password'])
                            </div>
                        </div><br>                        
                    
                        <div class="form-row justify-content-center">
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} text-center col-md-3">
                                <label>Nueva contraseña</label>
                                <input type="password" name="password" class="form-control form-control {{ $errors->has('password') ? ' is-invalid' : '' }} text-center" placeholder="{{ __('Nueva contraseña') }}" value="" required>
                                @include('alerts.feedback', ['field' => 'password'])
                            </div>
                            <div class="form-group text-center col-md-3">
                                <label>Confirmar la nueva contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control form-control text-center" placeholder="{{ __('Confirmar la nueva contraseña') }}" value="" required>
                            </div>
                        </div>
                    </div>                    

                    <div class="card-footer">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success px-4">Cambiar contraseña</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
