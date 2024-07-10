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
                    
                        <!-- Campo para la nueva contraseña actual -->
                        <div class="form-row justify-content-center">
                            <div class="form-group text-center col-md-4">
                                <label for=""><strong>Contraseña actual *</strong></label>
                                    <input 
                                    type="password" 
                                    name="old_password" 
                                    class="form-control" 
                                    placeholder="Contraseña actual" 
                                    value="{{ old('old_password') }}"  
                                    required>
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback d-block text-center" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                            </div><br>
                        </div>                       
                    
                        <div class="form-row justify-content-center">

                            <!-- Campo para la nueva contraseña  -->
                            <div class="form-group text-center col-md-4">
                                <label for=""><strong>Nueva contraseña *</strong></label>
                                <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="Ingrese la nueva contraseña"
                                minlength="8"
                                maxlength="20"
                                value="{{ old('password') }}" 
                                required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block text-center" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <!-- Campo para la confirmación de la contraseña  -->
                            <div class="form-group text-center col-md-4">
                                <label for=""><strong>Confirmar Contraseña *</strong></label>
                                <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control" 
                                placeholder="Confirme la nueva contraseña"
                                minlength="8"
                                maxlength="20" 
                                value="{{ old('password_confirmation') }}" 
                                required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback d-block text-center" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
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
