@extends('layouts.app', ['page' => __('Roles'), 'pageSlug' => 'mantenimientoRoles'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Editar rol</h3>
                        <a href="{{ url('roles') }}" class="btn btn-secondary btn-sm">Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/' . $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="name">Nombre del rol</label>
                            <input type="text" id="name" name="name" value="{{ $role->name }}" class="form-control w-50">
                        </div>
                        
                        <div class="mb-3">
                            <label for="description">Descripción del rol</label>
                            <textarea id="description" name="description" class="form-control w-50">{{ $role->description }}</textarea>
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
