@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center" style="margin-top: 90px;">
        <div class="col-12">
            <div class="card shadow-lg" style="border-radius: 15px;">
                <div class="card-header bg-info text-white text-center">
                    <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>DETALLES DEL USUARIO</strong></h3>
                </div><br>

                <!-- Campo para el ID del usuario -->
                <div class="form-group text-center mb-5 px-3">
                    <div class="col-md-3 md-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-id-badge fa-lg text-warning me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>ID:</strong>
                                <p class="mb-0">{{ Auth::user()->id ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-5 px-3">
                    <!-- Campo para el primer nombre -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>PRIMER NOMBRE:</strong>
                                <p class="mb-0">{{ Auth::user()->name ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el segundo nombre -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>SEGUNDO NOMBRE:</strong>
                                <p class="mb-0">{{ Auth::user()->name2 ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el primer apellido -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>PRIMER APELLIDO:</strong>
                                <p class="mb-0">{{ Auth::user()->apellido ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el segundo apellido -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-user fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>SEGUNDO APELLIDO:</strong>
                                <p class="mb-0">{{ Auth::user()->apellido2 ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-5 px-3">
                    <!-- Campo para el DNI -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-id-card fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>DNI:</strong>
                                <p class="mb-0">{{ Auth::user()->numero_identidad ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el número de colegiación -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-address-card fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>Nº DE COLEGIACIÓN:</strong>
                                <p class="mb-0">{{ Auth::user()->numero_colegiacion ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el RTN -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-file-alt fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>RTN:</strong>
                                <p class="mb-0">{{ Auth::user()->rtn ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el sexo -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-venus-mars fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>SEXO:</strong>
                                <p class="mb-0">{{ Auth::user()->sexo ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-5 px-3">
                    <!-- Campo para la fecha de nacimiento -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-birthday-cake fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>FECHA DE NACIMIENTO:</strong>
                                <p class="mb-0">{{ Auth::user()->fecha_nacimiento ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para la edad -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-calendar-alt fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>EDAD:</strong>
                                <p class="mb-0">{{ \Carbon\Carbon::parse(Auth::user()->fecha_nacimiento)->age ?? 'No disponible' }} años</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el país -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-globe fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>PAÍS:</strong>
                                <p class="mb-0">{{ Auth::user()->pais->nombre ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el teléfono fijo -->
                    <div class="col-md-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-phone fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>TELÉFONO FIJO:</strong>
                                <p class="mb-0">
                                    {{ Auth::user()->telefono ? (Auth::user()->pais ? Auth::user()->pais->codigo . ' ' . Auth::user()->telefono : Auth::user()->telefono) : 'No disponible' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-5 px-3">
                    <!-- Campo para el teléfono celular -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-mobile-alt fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>CELULAR:</strong>
                                <p class="mb-0">
                                    {{ Auth::user()->telefono_celular ? (Auth::user()->pais ? Auth::user()->pais->codigo . ' ' . Auth::user()->telefono_celular : Auth::user()->telefono_celular) : 'No disponible' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Campo para el correo electrónico -->
                    <div class="col-md-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-envelope fa-lg text-dark me-3"></i>
                            <div style="margin-left: 20px;">
                                <strong>CORREO ELECTRÓNICO:</strong>
                                <p class="mb-0">{{ Auth::user()->email ?? 'No disponible' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0 px-3">
                    <div class="col-md-12 text-center">
                        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Regresar a la lista de usuarios
                        </a>
                    </div>
                </div><br>

            </div>
        </div>
    </div>
</div>
@endsection
