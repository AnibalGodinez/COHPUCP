@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center mb-4">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>AGREGAR NUEVO PAÍS</strong></h3>
                </div>

                <form action="{{ route('pais.store') }}" method="POST">
                    @csrf

                    <div class="form-group text-center">
                        <label for="nombre"> <strong>NOMBRE DEL PAÍS *</strong></label>
                        <div class="col-md-6 mx-auto"> <!-- mx-auto centra el contenido horizontalmente -->
                            <input 
                                type="text" 
                                name="nombre"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                                title="En este campo sólo se permiten letras" 
                                id="nombre" 
                                placeholder="Nombre del país"
                                value="{{ old('nombre') }}"  
                                class="form-control @error('nombre') is-invalid @enderror" 
                                required>
                            
                            <!-- Mostrar mensaje de error -->
                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>

                    <div class="form-group text-center">
                        <label for="codigo"><strong>CÓDIGO TELEFÓNICO *</strong></label>
                        <div class="col-md-6 mx-auto"> <!-- mx-auto centra el contenido horizontalmente -->
                            <input 
                                type="text" 
                                name="codigo" 
                                id="codigo"
                                placeholder="Código telefónico" 
                                class="form-control @error('codigo') is-invalid @enderror"
                                required>
                            
                            <!-- Mostrar mensaje de error -->
                            @error('codigo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div><br>

                    <div class="form-group row mb-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save" style="margin-right: 8px;"></i>
                                Guardar
                            </button>
                            <a href="{{ route('pais.index') }}" class="btn btn-secondary">
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
@endsection
