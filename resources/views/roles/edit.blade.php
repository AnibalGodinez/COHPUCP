@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color:aliceblue"><strong>EDITAR ROL</strong></h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('roles/' . $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="name"><strong>NOMBRE DEL ROL *</strong></label>
                            <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ $role->name }}" 
                            class="form-control w-50"
                            placeholder="Ingrese el nombre del rol"
                            required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description"><strong>DESCRIPCIÓN DEL ROL</strong></label>
                            <textarea 
                                id="description" 
                                name="description" 
                                style="min-height: 150px; border: 1px solid #838588;"  
                                class="form-control w-70 @error('description') is-invalid @enderror"
                                placeholder="Ingrese una descripción del rol">{{ old('description', $role->description) }}</textarea>
                            
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                        

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar cambios
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                    Volver
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
