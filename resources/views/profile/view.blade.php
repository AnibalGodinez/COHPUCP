@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title" style="color:white"><strong>MI PERFIL</strong></h3>
                    </div><br>

                        <!-- Mensaje de éxito -->
                        @if(session('success'))
                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                                {{ session('success') }}
                                <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                        @endif

                        <div class="row">
                            <div class="col-md-3 d-flex justify-content-start" style="margin-top: 15px;">
                                <div class="card mb-3" style="border: 1px solid #0e7ddf; border-radius: 30px; margin-left: 15px;">
                                    <div class="card-body text-center">
                                        @if(Auth::user()->profile_image)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Imagen de perfil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('white/img/user.jpg') }}" alt="Imagen de perfil por defecto" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                        @endif
                                        <div class="d-flex justify-content-center mb-3">
                                            <h4 class="card-title mb-0 mr-2"><strong><strong>{{ Auth::user()->name }}</strong></strong></h4>
                                            <h4 class="card-title mb-0 mr-2"><strong><strong>{{ Auth::user()->name2 }}</strong></strong></h4>
                                            <h4 class="card-title"><strong><strong>{{ Auth::user()->apellido }}</strong></strong></h4>
                                        </div>
                                        <p class="card-text">{!! nl2br(e(Auth::user()->bio)) !!}</p><br>
                                        <div class="mt-3 d-flex justify-content-center">
                                            <a href="{{ Auth::user()->facebook_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #0865FE; ">
                                                <i class="fab fa-facebook" style="font-size: 1.7em"></i>
                                            </a>
                                            <a href="{{ Auth::user()->instagram_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #C927D0">
                                                <i class="fab fa-instagram" style="font-size: 1.8em"></i>
                                            </a>
                                            <a href="{{ Auth::user()->twitter_link }}" target="_blank" class="mx-2">
                                                <img src="{{ asset('icons/X_red_social.svg') }}" alt="X" style="width: 1.5em; height: 1.5em;">
                                            </a>
                                            <a href="{{ Auth::user()->linkedin_link }}" target="_blank" class="mx-2" aria-label="Facebook" style="color: #0077B7">
                                                <i class="fab fa-linkedin" style="font-size: 1.7em"></i>
                                            </a>
                                        </div><br>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9">
                                <div class="card mb-3" style="border-radius: 15px;">
                                    <div class="card-body">
                                        <div class="form-row">

                                            <!-- Campo del ID del usuario -->
                                            <div class="form-group col-md-12 mb-4 text-center">
                                                <label for="id">
                                                    <i class="fas fa-id-badge" style="margin-right: 8px; color:#771212"></i>
                                                    <strong>ID</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->id)
                                                        {{ Auth::user()->id }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>
                                      
                                            <!-- Campo para el primer nombre -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="name">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>PRIMER NOMBRE</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->name)
                                                        {{ Auth::user()->name }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el segundo nombre -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="name2">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>SEGUNDO NOMBRE</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->name2)
                                                        {{ Auth::user()->name2 }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el primer apellido -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="apellido">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>PRIMER APELLIDO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->apellido)
                                                        {{ Auth::user()->apellido }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el segundo apellido -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="apellido2">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>SEGUNDO APELLIDO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->apellido2)
                                                        {{ Auth::user()->apellido2 }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el DNI -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="numero_identidad">
                                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                                    <strong>DNI</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->numero_identidad)
                                                        {{ Auth::user()->numero_identidad }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el número de colegiación -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="numero_colegiacion">
                                                    <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                                    <strong>Nº DE COLEGIACIÓN</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->numero_colegiacion)
                                                        {{ Auth::user()->numero_colegiacion }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el RTN -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="rtn">
                                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                                    <strong>RTN</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->rtn)
                                                        {{ Auth::user()->rtn }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el sexo -->
                                            <div class="form-group col-md-3 mb-4 text-center" >
                                                <label for="sexo">
                                                    <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                                    <strong>SEXO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->sexo)
                                                        {{ Auth::user()->sexo->nombre }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la fecha de nacimiento -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="fecha_nacimiento">
                                                    <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                                    <strong>FECHA DE NACIMIENTO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if(Auth::user()->fecha_nacimiento)
                                                        {{ Auth::user()->fecha_nacimiento }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la edad -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label>
                                                    <i class="fas fa-calendar-alt text-center" style="margin-right: 8px;"></i>
                                                    <strong>EDAD</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if (!empty($user->fecha_nacimiento))
                                                        {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el pais -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                 <label for="pais">
                                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                                    <strong>PAÍS</strong>
                                                </label>
                                                <p class="form-control-static text-center">
                                                    @if($user->pais)
                                                        {{ $user->pais->nombre }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el teléfono fijo -->
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="telefono">
                                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                                    <strong>TELÉFONO FIJO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
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
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="telefono_celular">
                                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                                    <strong>CELULAR</strong>
                                                </label>
                                                <p class="form-control-static text-center">
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
                                            <div class="form-group col-md-3 mb-4 text-center">
                                                <label for="email">
                                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                                    <strong>CORREO ELECTRÓNICO</strong>
                                                </label>
                                                <p class="form-control-static text-center">
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
