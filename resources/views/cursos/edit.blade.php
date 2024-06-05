@extends('layouts.app', ['page' => __('Editar Curso'), 'pageSlug' => 'cursosPlataforma'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Editar Curso') }}</h5>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('cursos.update', $curso->id) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Nombre') }}</label>
                                    <input type="text" name="nombre" class="form-control" placeholder="Nombre" value="{{ $curso->nombre }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ __('Descripción') }}</label>
                                    <textarea name="descripcion" class="form-control" placeholder="Descripción">{{ $curso->descripcion }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-info">{{ __('Guardar') }}</button>
                            <a href="{{ route('cursos.index') }}" class="btn btn-default">{{ __('Cancelar') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
