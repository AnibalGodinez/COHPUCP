@extends('layouts.app')

@section('content')

<div class="col-lg-4 ml-auto mr-auto" style="margin-top: -100px;">
    <div class="card">
        <div class="card-header text-center">
            <h2 class="card-title" style="font-weight: bold; top: 20px; left: 4px; text-transform: none;">Recuperación de contraseña</h2>
        </div><br>

        <div class="card-body">
            <p class="text-dark mb-2" style="margin-bottom: 20px;">Seleccione el método de recuperación de contraseña:</p><br>

            <div class="text-center">
                @if ($securityQuestions->isNotEmpty())
                    <a href="{{ route('security_questions.show', ['security_question' => $securityQuestions->first()->id]) }}" class="btn btn-info mb-3">
                        Recuperación por preguntas de seguridad
                    </a><br>
                @else
                    <p class="text-danger">No hay preguntas de seguridad disponibles.</p><br>
                @endif
                <a href="{{ route('password.request') }}" class="btn btn-success">
                    Recuperación por correo electrónico
                </a>          
            </div>
        </div>
    </div>
</div>
@endsection
