@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-8">
        <div class="row" style="margin-top: 90px">
            <div class="col-md-12">
                <div class="card m-7">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="card-title text-center">LISTA DE UNIVERSIDADES</h3>
                            <a href="{{ route('universidades.create') }}" class="btn btn-info btn-round btn-simple">
                                <i class="fas fa-plus-circle"></i> Agregar nueva universidad
                            </a>
                        </div><br>

                        {{-- Mensajes de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Nombre de la universidad</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($universidades as $universidad)
                                    <tr>
                                        <td class="text-center">{{ $universidad->nombre_universidad }}</td>

                                        <td class="text-center">
                                            <a href="{{ route('universidades.show', $universidad->id) }}" class="btn btn-primary btn-sm btn-icon">
                                                <i class="tim-icons icon-eye"></i>
                                            </a>

                                            <a href="{{ route('universidades.edit', $universidad->id) }}" class="btn btn-success btn-sm btn-icon">
                                                <i class="tim-icons icon-settings"></i>
                                            </a>

                                            <form action="{{ route('universidades.destroy', $universidad->id) }}" method="POST" style="display:inline-block;" id="delete-form-{{ $universidad->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm btn-icon" onclick="return confirmDelete({{ $universidad->id }})">
                                                    <i class="tim-icons icon-simple-remove"></i>
                                                </button>
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
    </div>

    <script>
        function confirmDelete(universidadId) {
            return confirm('¿Estás seguro que deseas eliminar esta universidad? Esta acción no se puede deshacer.');
        }
    </script>
@endsection
