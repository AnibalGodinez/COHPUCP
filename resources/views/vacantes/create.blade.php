@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>CREAR NUEVA SOLICITUD DE VACANTE</strong></h3>
                </div><br>

                <!-- Mensaje de éxito -->
                @if(session('success'))
                <div class="text-center mb-3">
                    <div class="alert alert-success alert-dismissible fade show d-inline-block position-relative" role="alert" style="padding-right: 2.3rem;">
                        {{ session('success') }}
                        <button type="button" class="close position-absolute" style="top: 0.5rem; right: 0.5rem; font-size: 1.5rem; margin-top: 0.5rem;" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('vacantes.store') }}" method="POST">
                        @csrf

                        <h4>Por favor, complete todos los campos marcados con asterisco (<strong>*</strong>) ya que son <strong>obligatorios</strong> y no pueden quedar vacíos al momento de crear una vacante.</h4><br>
                        <div class="form-group row">

                            <div class="col-md-4">
                                <label for="nombre_empresa">
                                    <i class="fas fa-building" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DE LA EMPRESA *</strong>
                                </label>
                                <input 
                                type="text"
                                id="nombre_empresa"
                                name="nombre_empresa" 
                                class="form-control" 
                                placeholder="Ingrese el nombre de la empresa"
                                value="{{ old('nombre_empresa') }}" 
                                required>
                            </div>

                            <div class="col-md-4">
                                <label for="nombre_vacante">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                    <strong>NOMBRE DE LA VACANTE *</strong>
                                </label>
                                <input 
                                type="text"
                                id="nombre_vacante"
                                name="nombre_vacante" 
                                class="form-control"
                                placeholder="Ingrese el nombre de la vacante"
                                value="{{ old('nombre_vacante') }}" 
                                required>
                            </div>

                            <div class="col-md-4">
                                {{-- ESPACIO --}}
                            </div>

                            <div class="col-md-6">
                                <label for="descripcion">
                                    <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                    <strong>DESCRIPCIÓN DE LA VACANTE *</strong> 
                                </label>
                                <textarea 
                                name="descripcion" 
                                id="descripcion" 
                                class="form-control" 
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese la descripción de la vacante"
                                required>{{ old('descripcion') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="responsabilidades">
                                    <i class="fas fa-tasks" style="margin-right: 8px;"></i>
                                    <strong>RESPONSABILIDADES DE LA VACANTE *</strong> 
                                </label>
                                <textarea 
                                name="responsabilidades" 
                                id="responsabilidades"
                                class="form-control"
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese las responsabilidades de la vacante"
                                required>{{ old('responsabilidades') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="requisitos">
                                    <i class="fas fa-list-alt" style="margin-right: 8px;"></i>
                                    <strong>REQUISITOS DE LA VACANTE *</strong>
                                </label>
                                <textarea 
                                name="requisitos" 
                                id="requisitos"
                                class="form-control"
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese los requisitos de la vacante"
                                required>{{ old('requisitos') }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="experiencia">
                                    <i class="fas fa-briefcase" style="margin-right: 8px;"></i>
                                    <strong>EXPERIENCIA QUE SE PIDE *</strong>
                                </label>
                                <textarea 
                                name="experiencia"
                                id="experiencia" 
                                class="form-control"
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese la experiencia que pide para la vacante"
                                required>{{ old('experiencia') }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="ubicacion">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color:red"></i>
                                    <strong>UBICACIÓN DE LA EMPRESA *</strong>
                                </label>
                                <textarea 
                                name="ubicacion"
                                id="ubicacion"
                                class="form-control"
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese la dirección de la empresa" 
                                required>{{ old('ubicacion') }}</textarea>
                            </div>

                            <div class="col-md-3">
                                <label for="tiempo">
                                    <i class="fas fa-clock" style="margin-right: 8px;"></i>
                                    <strong>TIEMPO *</strong>
                                </label>
                                medio tiempo/tiempo completo
                                <input type="text" id="tiempo" name="tiempo" class="form-control" value="{{ old('tiempo') }}" placeholder="Ingrese el tiempo de la vacante" required>
                            </div>

                            
                            <div class="col-md-3">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO *</strong>
                                </label>
                                <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo') }}" placeholder="Ingrese el correo elecrónico" required>
                            </div>

                            <div class="col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO *</strong>
                                </label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="Ingrese el teléfono fijo" required>
                            </div>

                            <div class="col-md-3">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR *</strong>
                                </label>
                                <input type="text" id="celular" name="celular" class="form-control" value="{{ old('celular') }}" placeholder="Ingrese el teléfono celular" required>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <div class="w-100">
                                    <label for="enlace">
                                        <i class="fas fa-link" style="margin-right: 8px;"></i>
                                        <strong>ENLACE FORMULARIO O PÁGINA WEB</strong>
                                    </label>
                                    / puedes ingresar un enlace del formulario donde el agremiado pueda ingresar sus datos
                                    <input type="url" id="enlace" name="enlace" class="form-control" placeholder="Ingrese el enlace del formulario" value="{{ old('enlace') }}">
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-paper-plane" style="margin-right: 8px;"></i>
                                    Crear vacante
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>@endsection
