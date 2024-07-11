@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header" style="margin-left:300px">
                    <div class="row">
                        <div class="col-sm-10 text-center">
                            <div class="card card-user">

                                <div class="card-body">
                                    <h3 class="card-title"><strong>Perfil</strong></h3>
                                    <p class="card-text">
                                        <div class="author">
                                            <div class="block block-one bg-info"></div>
                                            <a href="#">
                                                <img class="avatar" src="{{ asset('white') }}/img/emilyz.jpg" alt="">
                                                <div class="name-container">
                                                    <h5 class="title">{{ auth()->user()->name }} {{ auth()->user()->apellido }}</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </p>

                                    <div class="card-description">
                                        {{ _('Apasionado por la tecnología y el desarrollo web. Disfruto aprender nuevas habilidades y colaborar en proyectos innovadores. En mi tiempo libre, me gusta leer libros de ciencia ficción y practicar senderismo.') }}
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="button-container">
                                        <button class="btn btn-icon btn-round btn-facebook">
                                            <i class="fab fa-facebook"></i>
                                        </button>
                                        <button class="btn btn-icon btn-round btn-instagram">
                                            <i class="fab fa-instagram"></i>
                                        </button>
                                        <button class="btn btn-icon btn-round btn-linkedin">
                                            <i class="fab fa-linkedin"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-chart">
                <div class="card-header" style="margin-left:300px">
                    <div class="row">
                        <div class="col-sm-10 text-center">
                            <h3 class="card-title">Información</h3>
                            <div class="card">
                                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                                    <div class="card-body">
                                        @csrf
                                        @method('put')
                                        @include('alerts.success')
                
                                        <div class="form-row">
                                            <!-- Campo para el primer nombre -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Primer nombre</strong></label>
                                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el segundo nombre -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Segundo nombre</strong></label>
                                                <input type="text" name="name2" class="form-control" value="{{ auth()->user()->name2 }}" style="text-align: center;" readonly>
                                            </div>

                                            <!-- Campo para el primer apellido -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Primer apellido</strong></label>
                                                <input type="text" name="apellido" class="form-control" value="{{ auth()->user()->apellido }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el segundo apellido -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Segundo apellido</strong></label>
                                                <input type="text" name="apellido2" class="form-control" value="{{ auth()->user()->apellido2 }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el número de identidad -->
                                            <div class="form-group col-md-3">
                                                <label><strong>DNI</strong></label>
                                                <input type="text" name="numero_identidad" class="form-control" value="{{ auth()->user()->numero_identidad }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el número de colegiación -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Número de colegiación</strong></label>
                                                <input type="text" name="numero_colegiacion" class="form-control" value="{{ auth()->user()->numero_colegiacion }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el RTN -->
                                            <div class="form-group col-md-3">
                                                <label><strong>RTN</strong></label>
                                                <input type="text" name="rtn" class="form-control" value="{{ auth()->user()->rtn }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el Sexo -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Sexo</strong></label>
                                                <select name="sexo" class="form-control" style="text-align: center;" disabled>
                                                    <option value="masculino" {{ auth()->user()->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                                    <option value="femenino" {{ auth()->user()->sexo == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                                </select>
                                            </div>
                
                                            <!-- Campo para la Fecha de Nacimiento -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Fecha de Nacimiento</strong></label>
                                                <input type="date" name="fecha_nacimiento" class="form-control" value="{{ auth()->user()->fecha_nacimiento }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el teléfono -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Teléfono fijo</strong></label>
                                                <input type="text" name="telefono" class="form-control" value="{{ auth()->user()->telefono }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el teléfono celular -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Celular</strong></label>
                                                <input type="text" name="telefono_celular" class="form-control" value="{{ auth()->user()->telefono_celular }}" style="text-align: center;" readonly>
                                            </div>
                
                                            <!-- Campo para el correo electrónico -->
                                            <div class="form-group col-md-3">
                                                <label><strong>Correo electrónico</strong></label>
                                                <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" style="text-align: center;" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
