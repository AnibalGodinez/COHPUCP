@extends('layouts.app') {{-- Ajusta el nombre de tu layout si es diferente --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Agregar Nueva Pregunta de Seguridad
                    </div>
                    <div class="card-body">
                        <form action="{{ route('security_questions.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="question">Pregunta de Seguridad</label>
                                <input type="text" name="question" id="question" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar Pregunta</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
