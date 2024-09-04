@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.guest')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 140px;">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-default text-white text-center">
                        <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>VERIFICACIÓN DEL CORREO ELECTRÓNICO</strong></h3>
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

                    <div class="card-body">
                        <p class="mb-4 text-center" style="font-size: 1.2em; color:rgb(197, 30, 30)"><strong><strong>¡GRACIAS POR REGISTRARTE!</strong></strong></p><br>

                        <p class="mb-4" style="font-size: 1.1em;">
                            Para acceder a la <strong><strong>Plataforma Tecnológica del COHPUCP</strong></strong>, es necesario <strong><strong>verificar</strong></strong>  su dirección de correo electrónico. <br><br>
                            
                            Por favor, ingrese a su <strong><strong>cuenta de correo registrada</strong></strong> y <strong><strong>complete el proceso de verificación</strong></strong>. Una vez realizado, podrá ingresar a la plataforma. Si no ha recibido el correo de verificación, puede solicitar uno nuevo haciendo clic en el botón "Solicitar otro enlace".
                        </p>

                        <div class="d-flex justify-content-center mt-4">
                            @if (Route::has('verification.send'))
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info">
                                        <i class="fas fa-link" style="margin-right: 8px;"></i>
                                        Solicitar otro enlace
                                    </button>
                                </form>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
