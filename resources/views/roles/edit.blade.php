@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>EDITAR ROL</h3>
                        <a href="{{ url('roles') }}" class="btn btn-secondary btn-sm">Regresar</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ url('roles/' . $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name"><strong>Nombre del rol *</strong></label>
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ $role->name }}" 
                            class="form-control w-50"
                            required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description"><strong>Descripción del rol</strong></label>
                            <textarea id="description" name="description" rows="4" class="form-control w-70 @error('description') is-invalid @enderror">{{ old('description', $role->description) }}</textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
