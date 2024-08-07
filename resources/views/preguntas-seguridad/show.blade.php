
@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: -100px;">
        <div class="row justify-content-center" style="margin-top: 88px">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h2 class="card-title">Preguntas de seguridad</h2>
                    </div>
                    <div class="card-body">
                        <p>Selecciona las <strong>3 preguntas de seguridad</strong> ingresando <strong>tus respuestas</strong>, éstas respuestas nos ayudarán a verificar tu identidad y así podrás acceder al sistema.</p><br>

                        <form action="{{ route('password.request') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question1">Pregunta  1</label>
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
                                <label for="question2">Pregunta 2</label>
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
                                <label for="question3">Pregunta 3</label>
                                <select name="question3" id="question3" class="form-control">
                                    <option disabled selected>Selecciona una pregunta</option>
                                    @foreach ($questions as $question)
                                        <option value="{{ $question->id }}">{{ $question->question }}</option>
                                    @endforeach
                                </select>
                                <label for="answer3">Respuesta</label>
                                <input type="text" name="answer3" id="answer3" class="form-control">
                            </div class="text-center">
                                <button type="submit" class="btn btn-info btn-lg btn-block mb-7">Ingresar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
