@extends('layouts.app', ['page' => __('Crear Permiso'), 'pageSlug' => 'mantenimientoPermisos'])

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Crear Permiso</h3>
                    <div>
                        <a href="{{ url('permission') }}" class="btn btn-secondary btn-sm mr-1">Regresar</a>
                    </div>
                </div> 
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ url('permission') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre del Permiso</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción del Permiso</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
