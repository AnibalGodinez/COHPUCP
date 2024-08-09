@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 140px;">
            <div class="col-lg-5 col-md-7">
                <div class="card shadow-lg">
                    <div class="card-header bg-default text-white text-center">
                        <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>VERIFICACIÓN DEL CORREO ELECTRÓNICO</strong></h3>
                    </div>

                    <div class="card-body">
                        <p class="mb-4 text-center" style="font-size: 1.2em; color:rgb(197, 30, 30)"><strong><strong>¡GRACIAS POR REGISTRARTE!</strong></strong></p><br>

                        <p class="mb-4" style="font-size: 1.1em;">
                            Para acceder a la <strong>Plataforma Tecnológica del COHPUCP</strong>, es necesario verificar su dirección de correo electrónico. <br><br>
                            
                            Por favor, ingrese a su <strong><strong>cuenta de correo registrada y complete el proceso de verificación</strong></strong>. Una vez realizado, podrá ingresar a la plataforma. Si no ha recibido el correo de verificación, puede solicitar uno nuevo haciendo clic en el botón de abajo.
                        </p>
                        
                        <div class="d-flex justify-content-center mt-4">
                            @if (Route::has('verification.send'))
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-info">Solicitar otro link</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
