
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row" style="margin-top: -140px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-white text-center">
                    <h3 class="card-title" style="color: beige"><strong>PREGUNTAS DE SEGURIDAD</strong></h3>
                </div>


                    <div class="card-body">
                        <p>Selecciona las <strong> preguntas de seguridad</strong> ingresando <strong>tus respuestas</strong>, estas respuestas nos ayudarán a verificar tu identidad y así podrás acceder al formulario para que puedas hacer el cambio de contraseña.</p><br>

                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question1">PREGUNTA 1</label>
                                <select name="question1" id="question1" class="form-control">
                                    <option value="" disabled selected>Selecciona una pregunta</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer1">Respuesta</label>
                                <input type="text" name="answer1" id="answer1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="question2">PREGUNTA 2</label>
                                <select name="question2" id="question2" class="form-control">
                                    <option disabled selected>Selecciona una pregunta</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer2">Respuesta</label>
                                <input type="text" name="answer2" id="answer2" class="form-control">
                            </div>
                            

                            <div class="form-group">
                                <label for="question3">PREGUNTA 3</label>
                                <select name="question3" id="question3" class="form-control">
                                    <option disabled selected>Selecciona una pregunta</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer3">Respuesta</label>
                                <input type="text" name="answer3" id="answer3" class="form-control">
                            </div class="text-center">

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-unlock-alt" style="margin-right: 8px;"></i>
                                        Recuperar contraseña
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
