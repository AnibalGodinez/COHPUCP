@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-header bg-warning text-white text-center">
                    <h3 class="card-title"><strong>AGREGAR NUEVO IDIOMA</strong></h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('idiomas.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nombre"><strong>NOMBRE DEL IDIOMA *</strong></label>
                            <input 
                                type="text" 
                                id="nombre" 
                                name="nombre" 
                                class="form-control @error('nombre') is-invalid @enderror" 
                                style="max-width: 300px;" 
                                value="{{ old('nombre') }}" 
                                placeholder="Ingrese el nombre del idioma"
                                required
                            >
                            @error('nombre')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save" style="margin-right: 8px;"></i>
                                Guardar
                            </button>

                            <a href="{{ route('idiomas.index') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>
                                Volver
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
