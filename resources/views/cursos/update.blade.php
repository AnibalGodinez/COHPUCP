@extends('layouts.app', ['page' => __('Actualizar Curso'), 'pageSlug' => 'cursosPlataforma'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">{{ __('Actualizar Curso') }}</h5>
                </div>
                <div class="card-body">
                    <div class="alert alert-success" role="alert">
                        {{ __('El curso se actualizó correctamente.') }}
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('cursos.index') }}" class="btn btn-info">{{ __('Volver a la lista de cursos') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
