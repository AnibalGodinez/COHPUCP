@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title text-center">LISTA DE PREGUNTAS DE SEGURIDAD</h3>

                    @if (session('success'))
                        <div class="alert alert-success text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('security_questions.create') }}" class="btn btn-info btn-round btn-simple">
                            <i class="fas fa-plus-circle"></i> Crear pregunta
                        </a>
                    </div>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Pregunta</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                                <tr>
                                    <td class="text-center">{{ $question->id }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('security_questions.edit', $question->id) }}" class="btn btn-info btn-sm">Editar</a>
                                        <form action="{{ route('security_questions.destroy', $question->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que quieres eliminar esta pregunta?')">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
