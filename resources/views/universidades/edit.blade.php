@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">

                <div class="card-header bg-info text-white text-center mb-4">
                    <h3 class="card-title" style="color: white"><strong>EDITAR UNIVERIDAD</strong></h3>
                </div><br>
                    
                <div class="card-body">
                    <form action="{{ route('universidades.update', $universidad->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                        <div class="mb-3">
                            <label for="nombre_universidad" class="form-label"><strong>NOMBRE DE LA UNIVERSIDAD</strong></label>
                            <input type="text" name="nombre_universidad" class="form-control @error('nombre_universidad') is-invalid @enderror" id="nombre_universidad" value="{{ old('nombre_universidad', $universidad->nombre_universidad) }}" required>
                    
                            @error('nombre_universidad')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                        <div class="form-group row mb-4">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar cambios
                                </button>
                                <a href="{{ route('universidades.index') }}" class="btn btn-secondary">
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
