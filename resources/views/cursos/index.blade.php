@extends('layouts.app', ['page' => __('Cursos'), 'pageSlug' => 'cursosPlataforma'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3 class="title">Lista de Cursos</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('cursos.create') }}" class="btn btn-info">Crear Curso</a>
                    </div>
                    @if ($cursos->isEmpty())
                        <p>No hay cursos creados.</p>
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
                                        <div class="card-body">
                                            <p class="card-text">{{ $curso->imagen }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-info btn-sm">Editar</a>
                                            <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
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
    @endsection
