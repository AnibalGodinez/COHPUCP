@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-dark text-white text-center">
                        <h3 class="card-title" style="color:aliceblue"><strong>CREAR PAÍS</strong></h3>
                    </div>

                    <div class="card-body">
                        {{-- Mostrar mensaje de éxito --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('pais.store') }}" method="POST">
                            @csrf

                            <div class="form-group text-center">
                                <label for="nombre"> <strong>Nombre *</strong></label>
                                <div class="col-md-6 mx-auto"> <!-- mx-auto centra el contenido horizontalmente -->
                                    <input 
                                        type="text" 
                                        name="nombre"
                                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                                        title="En este campo sólo se permiten letras" 
                                        id="nombre" 
                                        placeholder="Ingrese el nombre del país"
                                        value="{{ old('nombre') }}"  
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="form-group text-center">
                                <label for="codigo"><strong>Código *</strong></label>
                                <div class="col-md-6 mx-auto"> <!-- mx-auto centra el contenido horizontalmente -->
                                    <input 
                                        type="text" 
                                        name="codigo" 
                                        id="codigo"
                                        placeholder="Ingrese el código del país" 
                                        class="form-control"
                                        required>
                                </div>
                            </div><br>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <a href="{{ route('pais.index') }}" class="btn btn-danger">Cancelar</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
