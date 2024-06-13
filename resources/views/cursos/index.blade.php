@extends('layouts.app', ['page' => __('Cursos'), 'pageSlug' => 'cursosPlataforma'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="title">Lista de Cursos</h3>
                <div>
                    <a href="{{ route('cursos.create') }}" class="btn btn-info btn-sm">
                        <i class="fas fa-plus-circle"></i> Agregar un nuevo curso
                    </a>
                </div>
            </div>                           

            <div class="card-body">

                {{-- Formulario de búsqueda --}}
                <form action="{{ url('cursos') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar cursos" value="{{ request()->query('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-info btn-round btn-simple">
                                <i class="tim-icons icon-zoom-split"></i> Buscar
                            </button>
                        </div>
                    </div>
                </form>

                @if ($cursos->isEmpty())
                    <div class="alert alert-default text-center" role="alert">
                        No hay ningún resultado de su búsqueda.
                    </div>
                @else
                    <div class="row">
                        @foreach ($cursos as $curso)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">{{ $curso->nombre }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">{{ $curso->descripcion }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-info btn-sm">Editar</a>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion({{ $curso->id }})">Eliminar</button>
                                        <form id="delete-form-{{ $curso->id }}" action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                {{ $cursos->links('paginacion.simple-bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<!-- Script para confirmar eliminación -->
<script>
    function confirmarEliminacion(cursoId) {
        if (confirm('¿Estás seguro de eliminar este curso?')) {
            document.getElementById('delete-form-' + cursoId).submit();
        }
    }
</script>

@endsection
