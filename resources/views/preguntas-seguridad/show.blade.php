<!-- resources/views/security_questions/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">PREGUNTAS DE SEGURIDAD</div>

                    <div class="card-body">
                        <p>Selecciona tu pregunta de seguridad. Estas nos ayudarán a verificar tu identidad si olvidas tu contraseña.</p>

                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question1">Pregunta de seguridad 1</label>
                                <select name="question1" id="question1" class="form-control">
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer1">Respuesta</label>
                                <input type="text" name="answer1" id="answer1" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="question2">Pregunta de seguridad 2</label>
                                <select name="question2" id="question2" class="form-control">
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer2">Respuesta</label>
                                <input type="text" name="answer2" id="answer2" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="question3">Pregunta de seguridad 3</label>
                                <select name="question3" id="question3" class="form-control">
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer3">Respuesta</label>
                                <input type="text" name="answer3" id="answer3" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Recuperar Contraseña</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
