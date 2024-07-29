@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px; padding: 6px; border-radius: 15px">
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- Tarjeta Contenedora con borde resaltado ocupando toda la pantalla -->
                <div class="card mb-3" style="border: 3px solid #ebeff3; border-radius: 15px; width: 100%">
                    <div class="card-body">
                        <h1 class="card-header bg-info text-white text-center">
                            Perfil
                        </h1><br>

                        <div class="row">
                            <!-- Tarjeta de Foto de Perfil y Nombre con borde resaltado -->
                            <div class="col-md-3">
                                <div class="card mb-3" style="border: 1px solid #abb2b8; border-radius: 10px;"> <!-- Color gris Bootstrap -->
                                    <div class="card-body text-center">
                                        @if(Auth::user()->profile_image)
                                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('storage/default-profile.png') }}" alt="Default Profile Image" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                        @endif
                                        <!-- Nombre y Apellido en la misma línea -->
                                        <div class="d-flex justify-content-center mb-3">
                                            <h4 class="card-title mb-0 mr-2">{{ Auth::user()->name }}</h4>
                                            <h4 class="card-title mb-0">{{ Auth::user()->apellido }}</h4>
                                        </div>
                                        <!-- Descripción debajo del nombre y apellido -->
                                        <p class="card-text">{!! nl2br(e(Auth::user()->bio)) !!}</p>
                                        <!-- Enlaces de redes sociales debajo de la bio -->
                                        <div class="mt-3 d-flex justify-content-center">
                                            <!-- Íconos de redes sociales -->
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

                            <!-- Tarjeta de Información Adicional con borde resaltado -->
                            <div class="col-md-9">
                                <div class="card mb-3" style="border-radius: 15px;"> <!-- Color gris Bootstrap -->
                                    <div class="card-body">
                                        <div class="form-row">
                                            <!-- Campo para el primer nombre -->
                                            <div class="form-group col-md-4 mb-3">
                                                <label for="name">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Primer nombre</strong>
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
                                            <div class="form-group col-md-4 mb-3">
                                                <label for="name2">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Segundo nombre</strong>
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
                                            <div class="form-group col-md-4 mb-3">
                                                <label for="apellido">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Primer apellido</strong>
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
                                                    <strong>Segundo apellido</strong>
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
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>DNI</strong>
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
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Número de colegiación</strong>
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
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
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

                                            <!-- Campo para el Sexo -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="sexo">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Sexo</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->sexo)
                                                        {{ Auth::user()->sexo }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la Fecha de Nacimiento -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="fecha_nacimiento">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Fecha de nacimiento</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->fecha_nacimiento)
                                                        {{ Auth::user()->fecha_nacimiento }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para la Edad -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="edad">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Edad</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->edad)
                                                        {{ Auth::user()->edad }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para seleccionar el país -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="pais">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>País</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->pais)
                                                        {{ Auth::user()->pais }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el teléfono fijo -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="telefono">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Teléfono fijo</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->telefono)
                                                        {{ Auth::user()->telefono }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el teléfono celular -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="telefono_celular">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Teléfono celular</strong>
                                                </label>
                                                <p class="form-control-static">
                                                    @if(Auth::user()->telefono_celular)
                                                        {{ Auth::user()->telefono_celular }}
                                                    @else
                                                        No disponible
                                                    @endif
                                                </p>
                                            </div>

                                            <!-- Campo para el correo electrónico -->
                                            <div class="form-group col-md-4 mb-4">
                                                <label for="email">
                                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                                    <strong>Correo electrónico</strong>
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
