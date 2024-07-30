@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px; padding: 6px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card mb-3" style="border: 3px solid #ebeff3; border-radius: 15px; width: 100%">
                    <div class="card-body">
                        <h1 class="card-header bg-info text-white text-center">
                            Perfil
                        </h1><br>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="card mb-3" style="border: 1px solid #0e7ddf; border-radius: 30px;">
                                    <div class="card-body text-center">
                                        @if(Auth::user()->profile_image)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/default-profile.png') }}" alt="Default Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                        @endif
                                        <div class="d-flex justify-content-center mb-3">
                                            <h4 class="card-title mb-0 mr-2" style="text-transform: uppercase;"><strong><strong>{{ Auth::user()->name }}</strong></strong></h4>
                                            <h4 class="card-title mb-0" style="text-transform: uppercase;"><strong><strong>{{ Auth::user()->apellido }}</strong></strong></h4>
                                        </div><br>
                                        <p class="card-text">{!! nl2br(e(Auth::user()->bio)) !!}</p><br>
                                        <div class="mt-3 d-flex justify-content-center">
                                            <a href="{{ Auth::user()->facebook_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #0865FE">
                                                <i class="fab fa-facebook fa-2x"></i>
                                            </a>
                                            <a href="{{ Auth::user()->twitter_link }}" target="_blank" class="mx-2" aria-label="Twitter" style="color: #00A2F3">
                                                <i class="fab fa-twitter fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Formulario para Cambiar la Contraseña -->
                            <div class="col-md-9">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h3 class="card-title">Cambiar contraseña</h3>
                                        
                                        @if(session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{ route('profile.updatePassword') }}" method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <!-- Campo para la Contraseña Actual -->
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                        <label for="current_password">Contraseña actual</label>
                                                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                                                    @error('current_password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div> 
                                            </div>

                                            <!-- Campo para la Nueva Contraseña -->
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label for="new_password">Nueva contraseña</label>
                                                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                                                    @error('new_password')
                                                        <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>                                               
                                            </div>

                                            <!-- Campo para Confirmar Nueva Contraseña -->
                                            <div class="form-group">
                                                <div class="col-sm-4">
                                                    <label for="new_password_confirmation">Confirmar nueva contraseña</label>
                                                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" required>
                                                </div>
                                            </div><br>

                                            <div class="form-group mt-4">
                                                <button type="submit" class="btn btn-success">Actualizar contraseña</button>
                                            </div> 
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
