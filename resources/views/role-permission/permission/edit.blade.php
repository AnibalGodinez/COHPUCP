@extends('layouts.app', ['page' => __('Editar permisos'), 'pageSlug' => 'editPermisos'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Editar permisos
                        <a href="{{ url('permission') }}" class="btn btn-secondary btn-sm float-end">Regresar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('permission/' . $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name">Nombre del permiso</label>
                            <input type="text" name="name" value="{{ $permission->name }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
