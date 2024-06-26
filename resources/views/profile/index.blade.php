@extends('layouts.app')

@section('content')

    <div class="col-md-10" style="margin-top: -40px;">
        <div class="card card-user">
            <div class="card-body">

                <p class="card-text">
                    <div class="author">
                        <div class="block block-one bg-info"></div>
                        <div class="block block-two"></div>
                        <div class="block block-three bg-info"></div>
                        <div class="block block-four"></div>
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
    
    <div class="row">
        <div class="col-md-10">
            <div class="card">
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        @csrf
                        @method('put')
                    
                        @include('alerts.success')

                        <div class="form-row">
                                <!-- Campo para el primer nombre -->
                                <div class="form-group col-md-3">
                                    <label>Primer nombre</label>
                                    <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                </div>
    
                                <!-- Campo para el segundo nombre -->
                                <div class="form-group col-md-3">
                                    <label>Segundo nombre</label>
                                    <input type="text" name="name2" class="form-control" value="{{ auth()->user()->name2 }}" readonly>
                                </div>
    
                                <!-- Campo para el primer apellido -->
                                <div class="form-group col-md-3">
                                    <label>Primer apellido</label>
                                    <input type="text" name="apellido" class="form-control" value="{{ auth()->user()->apellido }}" readonly>
                                </div>
    
                                <!-- Campo para el segundo apellido -->
                                <div class="form-group col-md-3">
                                    <label>Segundo apellido</label>
                                    <input type="text" name="apellido2" class="form-control" value="{{ auth()->user()->apellido2 }}" readonly>
                                </div>
    
                                <!-- Campo para el número de identidad -->
                                <div class="form-group col-md-3">
                                    <label>Número de identidad</label>
                                    <input type="text" name="numero_identidad" class="form-control" value="{{ auth()->user()->numero_identidad }}" readonly>
                                </div>
    
                                <!-- Campo para el número de colegiación -->
                                <div class="form-group col-md-3">
                                    <label>Número de colegiación</label>
                                    <input type="text" name="numero_colegiacion" class="form-control" value="{{ auth()->user()->numero_colegiacion }}" readonly>
                                </div>
    
                                <!-- Campo para el RTN -->
                                <div class="form-group col-md-3">
                                    <label>RTN</label>
                                    <input type="text" name="rtn" class="form-control" value="{{ auth()->user()->rtn }}" readonly>
                                </div>
    
                                <!-- Campo para el Sexo -->
                                <div class="form-group col-md-3">
                                    <label>Sexo</label>
                                    <select name="sexo" class="form-control" disabled>
                                        <option value="masculino" {{ auth()->user()->sexo == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                        <option value="femenino" {{ auth()->user()->sexo == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                    </select>
                                </div>
    
                                <!-- Campo para la Fecha de Nacimiento -->
                                <div class="form-group col-md-3">
                                    <label>Fecha de Nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" value="{{ auth()->user()->fecha_nacimiento }}" readonly>
                                </div>
    
                                <!-- Campo para el teléfono -->
                                <div class="form-group col-md-3">
                                    <label>Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" value="{{ auth()->user()->telefono }}" readonly>
                                </div>
    
                                <!-- Campo para el teléfono celular -->
                                <div class="form-group col-md-3">
                                    <label>Teléfono celular</label>
                                    <input type="text" name="telefono_celular" class="form-control" value="{{ auth()->user()->telefono_celular }}" readonly>
                                </div>
    
                                <!-- Campo para el correo electrónico -->
                                <div class="form-group col-md-3">
                                    <label>Correo electrónico</label>
                                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" readonly>
                                </div>
                        </div>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
@endsection
