@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center mb-4">
                    <h3 class="card-title" style="color:white"><strong>EDITAR IDIOMA</strong></h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('idiomas.update', $idioma->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre"><strong>NOMBRE DEL IDIOMA *</strong></label>
                            <input 
                                type="text" 
                                name="nombre" 
                                id="nombre" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                value="{{ old('nombre', $idioma->nombre) }}"
                            >
                            @error('nombre')
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

                                <a href="{{ route('idiomas.index') }}" class="btn btn-secondary">
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
