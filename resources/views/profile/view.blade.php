@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 69px; padding: 6px;">
        <div class="row no-gutters">
            <div class="col-md-12">
                <div class="card mb-3" style="border: 3px solid #ebeff3; border-radius: 15px; width: 100%">
                    <div class="card shadow-lg">
                        <h1 class="card-header bg-info text-white text-center">
                            Perfil
                        </h1><br>

                        <div class="row">
                            <div class="col-md-3 p-4">
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

                            <div class="col-md-9">
                                <div class="card mb-3" style="border-radius: 15px;">
                                    <div class="card-body">
                                        <div class="form-row">
                                            <!-- Campo para el primer nombre -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="name">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>PRIMER NOMBRE *</strong>
                                                </label>
                                                <p class="form-control-static tex-center">
                                                    @if(Auth::user()->name)
                                                        {{ Auth::user()->name }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el segundo nombre -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="name2">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>SEGUNDO NOMBRE</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->name2)
                                                        {{ Auth::user()->name2 }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el primer apellido -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="apellido">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>PRIMER APELLIDO *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->apellido)
                                                        {{ Auth::user()->apellido }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el segundo apellido -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="apellido2">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>SEGUNDO APELLIDO</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->apellido2)
                                                        {{ Auth::user()->apellido2 }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el DNI -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="numero_identidad">
                                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                                    <strong>DNI *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->numero_identidad)
                                                        {{ Auth::user()->numero_identidad }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el número de colegiación -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="numero_colegiacion">
                                                    <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                                    <strong>Nº DE COLEGIACIÓN</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->numero_colegiacion)
                                                        {{ Auth::user()->numero_colegiacion }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el RTN -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="rtn">
                                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                                    <strong>RTN</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->rtn)
                                                        {{ Auth::user()->rtn }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el sexo -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="sexo">
                                                    <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                                    <strong>SEXO *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->sexo)
                                                        {{ Auth::user()->sexo }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la fecha de nacimiento -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="fecha_nacimiento">
                                                    <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                                    <strong>FECHA DE NACIMIENTO *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->fecha_nacimiento)
                                                        {{ Auth::user()->fecha_nacimiento }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la edad -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label>
                                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                                    <strong>EDAD *</strong>
                                                </label>
                                                <p>{{ $age ?? 'No disponible' }}</p>
                                            </div>


                                            <!-- Campo para el pais -->
                                            <div class="form-group col-md-4 mb-4">
                                                 <label for="pais">
                                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                                    <strong>PAÍS *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if($user->pais)
                                                        {{ $user->pais->nombre }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el teléfono fijo -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="telefono">
                                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                                    <strong>TELÉFONO FIJO</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->telefono)
                                                        @if(Auth::user()->pais)
                                                            {{ Auth::user()->pais->codigo }} {{ Auth::user()->telefono }}
                                                        @else
                                                            {{ Auth::user()->telefono }}
                                                        @endif
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el teléfono celular -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="telefono_celular">
                                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                                    <strong>CELULAR *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->telefono_celular)
                                                        @if(Auth::user()->pais)
                                                            {{ Auth::user()->pais->codigo }} {{ Auth::user()->telefono_celular }}
                                                        @else
                                                            {{ Auth::user()->telefono_celular }}
                                                        @endif
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el correo electrónico -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="email">
                                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                                    <strong>CORREO ELECTÓNICO *</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->email)
                                                        {{ Auth::user()->email }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
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
