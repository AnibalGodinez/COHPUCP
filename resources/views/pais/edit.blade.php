@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>EDITAR PAÍS</strong></h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('pais.update', $pai) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group text-center">
                            <label for="nombre"><strong>NOMBRE DEL PAÍS *</strong></label>
                            <div class="col-md-6 mx-auto">
                                <input 
                                    type="text" 
                                    name="nombre"
                                    id="nombre" 
                                    placeholder="Ingrese el nombre del país"
                                    value="{{ old('nombre', $pai->nombre) }}"  
                                    class="form-control @error('nombre') is-invalid @enderror"
                                    pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                    title="En este campo sólo se permiten letras"
                                    required>
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <label for="codigo"><strong>CÓDIGO TELEFÓNICO *</strong></label>
                            <div class="col-md-6 mx-auto">
                                <input 
                                    type="text" 
                                    name="codigo" 
                                    id="codigo"
                                    placeholder="Ingrese el código del país" 
                                    value="{{ old('codigo', $pai->codigo) }}"  
                                    class="form-control @error('codigo') is-invalid @enderror"
                                    required>
                                @error('codigo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div><br>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar cambios
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
</div>
@endsection
