@extends('layouts.app') {{-- Ajusta el nombre de tu layout si es diferente --}}

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Listado de Preguntas de Seguridad</h1>
                <div class="mb-3">
                    <a href="{{ route('security_questions.create') }}" class="btn btn-info">Crear Pregunta</a>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Pregunta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question }}</td>
                                <td>
                                    <a href="{{ route('security_questions.edit', $question->id) }}" class="btn btn-dark">Editar</a>
                                    {{-- Ejemplo de cómo debería verse en tu vista --}}
                                    <a href="{{ route('security_questions.show', ['security_question' => $question->id]) }}">Ver Detalles</a>

                                    {{-- Formulario para eliminar --}}
                                    <form action="{{ route('security_questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pregunta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
