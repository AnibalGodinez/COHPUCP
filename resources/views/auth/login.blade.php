@extends('layouts.app')

@section('content')
<div class="col-lg-3 col-md-6 ml-auto mr-auto" style="margin-top: -120px;">

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-register card-white" style="border-radius: 14px">
            <div class="card-header">
                <img src="{{ asset('white/img/background-vector.jpg')}}" class="card-img-top" alt="Card image">
                <h3 class="card-title" style="position: absolute; top: 20px; left: 54px; text-transform: none; font-size: 34px;">Inicio de sesión</h3>
            </div>
            
            <div class="card-body" style="margin-top: -70px;">
                <p class="text-dark mb-2" style="margin-bottom: 50px;">Inicia sesión con tu <strong>correo electrónico </strong> y <strong>contraseña secreta </strong></p><br>

                <div class="form-row">
                    
                    <div class="input-group{{ $errors->has('login_type') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input 
                        type="text" 
                        name="login_type" 
                        class="form-control{{ $errors->has('login_type') ? ' is-invalid' : '' }}" 
                        placeholder="{{ _('Correo electrónico o número de colegiación') }}" 
                        value="{{ old('login_type') }}"
                        required>
                        @error('login_type')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input 
                        type="password" 
                        placeholder="{{ _('Contraseña') }}" 
                        name="password" 
                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                        required>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><br>
                    @error('estado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="card-footer" style="margin-top: -10px;">
                    <button type="submit" href="" class="btn btn-info btn-lg btn-block mb-3">Ingresar</button>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" class="link footer-link" style="color: rgb(38, 119, 246); font-weight: bold;">Crear una cuenta</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('opcion.recuperacion') }}" style="color: rgb(38, 119, 246); font-weight: bold;">¿Has olvidado tu contraseña?</a>
                        </h6>
                    </div>
                </div>                
                
            </div>
        </div>
    </form>
</div>
@endsection
