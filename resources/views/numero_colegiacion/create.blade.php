@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8">
    <div class="row" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-default text-white text-center">
                    <h3 style="color: white">ASIGNAR NÚMERO DE COLEGIACIÓN AL USUARIO</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('numero_colegiacion.store') }}" method="POST">
                        @csrf

                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-row">
                            <!-- Nombre completo del usuario -->
                            <div class="form-group col-md-6">
                                <label for="name" class="form-label">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE COMPLETO</strong>
                                </label>
                                <input type="text" class="form-control" id="name" value="{{ $user->name }} {{ $user->name2 }} {{ $user->apellido }} {{ $user->apellido2 }}" readonly>
                            </div>

                            <!-- DNI del usuario -->
                            <div class="form-group col-md-6">
                                <label for="numero_identidad" class="form-label">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>DNI</strong>
                                </label>
                                <input type="text" class="form-control" id="numero_identidad" value="{{ $user->numero_identidad }}" readonly>
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Celular del usuario -->
                            <div class="form-group col-md-6">
                                <label for="telefono_celular" class="form-label">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR</strong>
                                </label>
                                <input type="text" class="form-control" id="telefono_celular" value="{{ $user->telefono_celular }}" readonly>
                            </div>

                            <!-- Correo electrónico del usuario -->
                            <div class="form-group col-md-6">
                                <label for="email" class="form-label">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO</strong>
                                </label>
                                <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        <!-- Campo para el número de colegiación centrado -->
                        <div class="form-row justify-content-center">
                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion" class="text-center d-block">
                                    <i class="fas fa-address-card" style="margin-right: 8px; font-size: 1.0rem;"></i>
                                    <strong style="font-size: 1.0rem;">NÚMERO DE COLEGIACIÓN</strong>
                                </label>
                                <input 
                                    type="text" 
                                    name="numero_colegiacion" 
                                    class="form-control text-center" 
                                    id="numero_colegiacion" 
                                    placeholder="INGRESE EL NÚMERO DE COLEGIACIÓN (SIN GUIONES)"
                                    value="{{ old('numero_colegiacion') }}" 
                                    maxlength="12" 
                                    pattern="\d{4}-\d{2}-\d{4}" 
                                    required
                                >
                            </div>
                        </div>

                        <!-- Script del campo número de colegiación -->
                        <script>
                            document.getElementById('numero_colegiacion').addEventListener('input', function (e) {
                                var input = e.target.value.replace(/\D/g, '');
                                var formatted = '';
                                if (input.length <= 4) {
                                    formatted = input;
                                } else if (input.length <= 6) {
                                    formatted = input.slice(0, 4) + '-' + input.slice(4);
                                } else {
                                    formatted = input.slice(0, 4) + '-' + input.slice(4, 6) + '-' + input.slice(6, 10);
                                }
                                e.target.value = formatted;
                            });
                        </script>

                        <!-- Botones de acción -->
                        <div class="form-group row mb-0 text-center">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Asignar
                                </button>
                                <a href="{{ route('numero_colegiacion.index') }}" class="btn btn-secondary ml-2">
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
