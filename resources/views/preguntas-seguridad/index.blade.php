@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">

                    <div class="card-header d-flex justify-content-between align-items-center py-3" style="background-color: #b1b3b6; border-bottom: 1px solid #7e7979;">
                        <h3 class="card-title"><strong>Lista de preguntas de seguridad</strong></h3>
                        <a href="{{ route('security_questions.create') }}" class="btn btn-round btn-simple" style="color:black">
                            <i class="fas fa-plus-circle" style="color: black"></i> Crear nueva pregunta
                        </a>
                    </div>

                    <!-- Mensaje de éxito -->
                    @if(session('status'))
                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                                {{ session('status') }}
                                <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mt-4">
                                <thead style="background-color: #3288af;">
                                    <tr>
                                        <th class="text-center" style="color: white;">ID</th>
                                        <th class="text-center" style="color: white;">Editar</th>
                                        <th class="text-center" style="color: white;">Eliminar</th>
                                        <th class="text-center" style="color: white;">Pregunta de seguridad</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($questions as $question)
                                        <tr>
                                            <td class="text-center">{{ $question->id }}</td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="{{ url('security_questions/'.$question->id.'/edit') }}" class="btn btn-success btn-sm btn-icon">
                                                    <i class="tim-icons icon-settings"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">
                                                <a href="#" class="btn btn-danger btn-sm btn-icon" onclick="confirmarEliminacion('{{ url('security_questions/'.$question->id.'/delete') }}')">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </a>
                                            </td>
                                            <td class="text-center" style="white-space: nowrap;">{{ $question->question }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
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
