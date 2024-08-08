@extends('layouts.app')

@section('content')
    <div class="row" style="margin-top: 88px">
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
                                        <a href="{{ url('security_questions/'.$question->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                            <i class="tim-icons icon-settings"></i>
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('security_questions/'.$question->id.'/delete') }}')">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmarEliminacion(url) {
            if (confirm('¿Estás seguro de que deseas eliminar esta pregunta?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
