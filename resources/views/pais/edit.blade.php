@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center" style="margin-top: 88px">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="card-title" style="color:aliceblue"><strong>EDITAR PAÍS</strong></h3>
                    </div>

                    <div class="card-body">
                        {{-- Mostrar mensaje de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('pais.update', $pai) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group text-center">
                                <label for="nombre"><strong>Nombre *</strong></label>
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
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label for="codigo"><strong>Código *</strong></label>
                                <div class="col-md-6 mx-auto">
                                    <input 
                                        type="text" 
                                        name="codigo" 
                                        id="codigo"
                                        placeholder="Ingrese el código del país" 
                                        value="{{ old('codigo', $pai->codigo) }}"  
                                        class="form-control @error('codigo') is-invalid @enderror"
                                        required>
                                </div>
                            </div>

                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-success">Actualizar</button>
                                <a href="{{ route('pais.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
