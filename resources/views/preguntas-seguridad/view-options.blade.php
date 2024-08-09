@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>RECUPERACIÓN DE CONTRASEÑA</strong></h3>
                </div>

                <div class="card-body">
                    <p class="text-dark mb-4">Seleccione el método de recuperación de contraseña:</p>

                    <div class="d-flex flex-column align-items-center">
                        @if ($securityQuestions->isNotEmpty())
                        <a href="{{ route('preguntas-seguridad.view') }}" class="btn btn-info mb-3 w-40 btn-simple">
                            Por preguntas de seguridad
                        </a>
                        @else
                            <p class="text-danger">No hay preguntas de seguridad disponibles.</p>
                        @endif
                        <a href="{{ route('password.request') }}" class="btn w-40 ">
                            Por correo electrónico
                        </a>          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
