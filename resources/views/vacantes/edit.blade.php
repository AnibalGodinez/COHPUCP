@extends('layouts.app')

@section('content')

<div class="container-fluid mt-5">
    <div class="row justify-content-center" style="margin-top: 90px">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-info text-white text-center">
                    <h3 class="card-title" style="color: rgb(247, 247, 247)"><strong>EDITAR SOLICITUD DE VACANTE</strong></h3>
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
                    <form action="{{ route('vacantes.update', $solicitud->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h4>Por favor, complete todos los campos marcados con asterisco (<strong><strong>*</strong></strong>) ya que son <strong>obligatorios</strong> y no pueden quedar vacíos al momento de editar la vacante.</h4><br>
                        
                        <style>
                            h4 {
                                font-family: 'Arial', sans-serif; /* Cambiar 'Arial' por la fuente que prefieras */
                            }
                        </style>
                        
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
                                value="{{ old('nombre_empresa', $solicitud->nombre_empresa) }}" 
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
                                value="{{ old('nombre_vacante', $solicitud->nombre_vacante) }}" 
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
                                required>{{ old('descripcion', $solicitud->descripcion) }}</textarea>
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
                                required>{{ old('responsabilidades', $solicitud->responsabilidades) }}</textarea>
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
                                required>{{ old('requisitos', $solicitud->requisitos) }}</textarea>
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
                                required>{{ old('experiencia', $solicitud->experiencia) }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="ubicacion">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                                    <strong>UBICACIÓN DE LA EMPRESA *</strong>
                                </label>
                                <textarea 
                                name="ubicacion"
                                id="ubicacion"
                                class="form-control"
                                style="min-height: 150px; border: 1px solid #898b91;"
                                placeholder="Ingrese la dirección de la empresa" 
                                required>{{ old('ubicacion', $solicitud->ubicacion) }}</textarea>
                            </div>

                            <div class="col-md-3">
                                <label for="tiempo">
                                    <i class="fas fa-clock" style="margin-right: 8px;"></i>
                                    <strong>TIEMPO *</strong>
                                </label>
                                medio tiempo/tiempo completo
                                <input type="text" id="tiempo" name="tiempo" class="form-control" value="{{ old('tiempo', $solicitud->tiempo) }}" placeholder="Ingrese el tiempo de la vacante" required>
                            </div>

                            <div class="col-md-3">
                                <label for="correo">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO *</strong>
                                </label>
                                <input type="email" id="correo" name="correo" class="form-control" value="{{ old('correo', $solicitud->correo) }}" placeholder="Ingrese el correo elecrónico" required>
                            </div>

                            <div class="col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    <strong>TELÉFONO *</strong>
                                </label>
                                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $solicitud->telefono) }}" placeholder="Ingrese el teléfono fijo" required>
                            </div>

                            <div class="col-md-3">
                                <label for="celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR *</strong>
                                </label>
                                <input type="text" id="celular" name="celular" class="form-control" value="{{ old('celular', $solicitud->celular) }}" placeholder="Ingrese el teléfono celular" required>
                            </div>

                            <div class="col-md-6 d-flex justify-content-center">
                                <div class="w-100">
                                    <label for="enlace">
                                        <i class="fas fa-link" style="margin-right: 8px;"></i>
                                        <strong>ENLACE FORMULARIO O PÁGINA WEB</strong>
                                    </label>
                                    / puedes ingresar un enlace del formulario donde el agremiado pueda ingresar sus datos
                                    <input type="text" id="enlace" name="enlace" class="form-control" value="{{ old('enlace', $solicitud->enlace) }}" placeholder="Ingrese el enlace del formulario">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="estado">
                                    <strong>ESTADO *</strong>
                                </label>
                                <select id="estado" name="estado" class="form-control" required>
                                    <option value="pendiente" {{ old('estado', $solicitud->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                    <option value="aprobado" {{ old('estado', $solicitud->estado) == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                                    <option value="rechazado" {{ old('estado', $solicitud->estado) == 'rechazada' ? 'selected' : '' }}>Rechazada</option>
                                </select>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-2">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Actualizar vacante
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
