@extends('layouts.app')

@section('content')
    <div class="container-fluid" style="margin-top: 20px; padding: 6px; border-radius: 15px">
        <div class="row no-gutters">
            <div class="col-md-12">
                <!-- Tarjeta Contenedora con borde resaltado ocupando toda la pantalla -->
                <div class="card mb-3" style="border: 3px solid #ebeff3; border-radius: 15px; width: 100%">
                    <div class="card-body">
                        <h1 class="card-header bg-info text-white text-center">
                            
                            Perfil</h1><br>

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
                                    </div>
                                </div>
                            </div>

                            <!-- Tarjeta de Información Adicional con borde resaltado -->
                            <div class="col-md-9">
                                <div class="card mb-3" style="border-radius: 15px;"> <!-- Color gris Bootstrap -->
                                    <div class="card-body">
                                        <p class="card-text">
                                            <strong>Facebook:</strong>
                                            @if(Auth::user()->facebook_link)
                                                <a href="{{ Auth::user()->facebook_link }}" target="_blank">{{ Auth::user()->facebook_link }}</a>
                                            @else
                                                No disponible
                                            @endif
                                        </p>
                                        <p class="card-text">
                                            <strong>Twitter:</strong>
                                            @if(Auth::user()->twitter_link)
                                                <a href="{{ Auth::user()->twitter_link }}" target="_blank">{{ Auth::user()->twitter_link }}</a>
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
                <!-- Fin de Tarjeta Contenedora -->
            </div>
        </div>
    </div>
@endsection
