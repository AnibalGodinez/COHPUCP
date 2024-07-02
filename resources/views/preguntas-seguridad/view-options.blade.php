@extends('layouts.app')

@section('content')

<div class="col-lg-7 ml-auto mr-auto" style="margin-top: -100px;">
    <div class="card">
        <div class="card-header text-center">
            <h2 class="card-title" style="font-weight: bold; top: 20px; left: 4px; text-transform: none;">Recuperación de Contraseña</h2>
        </div><br>

        <div class="card-body">
            <p class="text-dark mb-2" style="margin-bottom: 20px;">Seleccione el método de recuperación de contraseña:</p><br>

            <div>
                <a href="{{ route('security_questions.show', ['security_question' => $securityQuestions->first()->id]) }}" class="btn btn-info btn-lg btn-block mb-3">
                    Recuperación por Preguntas de Seguridad
                </a><br>
                <a href="{{ route('password.request') }}" class="btn btn-success btn-lg btn-block mb-3">
                    Recuperación por Correo Electrónico
                </a>          
            </div>
        </div>
    </div>
</div>
@endsection
