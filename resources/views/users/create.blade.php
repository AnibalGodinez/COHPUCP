@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center font-weight-bold">Crear usuario</h2>
                    <form action="{{url('usuarios')}}" method="POST">
                        @csrf
                        
                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for="name"><strong>Primer nombre *</strong></label>
                                <input 
                                type="text" 
                                name="name" class="form-control" 
                                placeholder="Ingrese el primer nombre"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                maxlength="40"
                                required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="name2"><strong>Segundo nombre</strong></label>
                                <input 
                                type="text" 
                                name="name2" class="form-control" 
                                placeholder="Ingrese el primer nombre"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                maxlength="40">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="apellido"><strong>Primer apellido *</strong></label>
                                <input 
                                type="text" 
                                name="apellido" 
                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                                placeholder="Primer apellido" 
                                value="{{ old('apellido') }}"                         
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                                title="En este campo sólo se permiten letras"
                                maxlength="40" 
                                required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="apellido2"><strong>Segundo apellido</strong></label>
                                <input 
                                type="text" 
                                name="apellido2" 
                                class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" 
                                placeholder="Segundo apellido" 
                                value="{{ old('apellido2') }}"                         
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                                title="En este campo sólo se permiten letras"
                                maxlength="40">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="numero_identidad"><strong>DNI *</strong></label>
                                <input 
                                type="num" 
                                name="numero_identidad" 
                                class="form-control" 
                                id="numero_identidad" 
                                placeholder="Ingrese su DNI (SIN GUIONES)" 
                                value="{{ old('numero_identidad') }}" 
                                maxlength="15" 
                                pattern="\d{4}-\d{4}-\d{5}" 
                                required>
                            </div>

                            <script>
                                document.getElementById('numero_identidad').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/[^0-9]/g, '');
                                    if (input.length <= 4) {
                                        input = input;
                                    } else if (input.length <= 8) {
                                        input = input.slice(0, 4) + '-' + input.slice(4);
                                    } else if (input.length <= 13) {
                                        input = input.slice(0, 4) + '-' + input.slice(4, 8) + '-' + input.slice(8);
                                    }
                                    e.target.value = input;
                                });
                            </script>

                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion"><strong>Nº colegiación</strong></label>
                                <input 
                                type="num" 
                                name="numero_colegiacion" 
                                class="form-control" 
                                id="numero_colegiacion" 
                                placeholder="Nº de coleagiación (SIN GUIONES)"
                                value="{{ old('numero_colegiacion') }}" 
                                maxlength="12" 
                                pattern="\d{4}-\d{2}-\d{4}">
                            </div>

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

                            <div class="form-group col-md-3">
                                <label for="rtn"><strong>RTN</strong></label>
                                <input 
                                type="num" 
                                name="rtn" 
                                class="form-control" 
                                id="rtn" 
                                placeholder="Ingrese su RTN (SIN GUIONES)"
                                value="{{ old('rtn') }}"
                                maxlength="16" 
                                pattern="\d{4}-\d{4}-\d{6}">
                            </div>

                            <script>
                                document.getElementById('rtn').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formatted = '';
                            
                                    if (input.length <= 4) {
                                        formatted = input;
                                    } else if (input.length <= 8) {
                                        formatted = input.slice(0, 4) + '-' + input.slice(4);
                                    } else {
                                        formatted = input.slice(0, 4) + '-' + input.slice(4, 8) + '-' + input.slice(8, 14);
                                    }
                            
                                    e.target.value = formatted;
                                });
                            </script>

                            <div class="form-group col-md-3">
                                <label for="sexo"><strong>Sexo *</strong></label>
                                <select 
                                name="sexo" 
                                class="form-control" 
                                id="sexo"
                                value="{{ old('sexo') }}" 
                                required>
                                    <option value="">Seleccione una opción</option>
                                    <option value="masculino">Masculino</option>
                                    <option value="femenino">Femenino</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento"><strong>Fecha de nacimiento *</strong></label>
                                <input 
                                type="date" 
                                name="fecha_nacimiento" 
                                class="form-control"
                                value="{{ old('fecha_nacimiento') }}"
                                id="fecha_nacimiento"                                                           
                                required>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    // Obtener el elemento del campo de fecha de nacimiento
                                    var fechaNacimiento = document.getElementById('fecha_nacimiento');
            
                                    // Calcular el año máximo permitido (100 años atrás desde el año actual)
                                    var fechaActual = new Date();
                                    var yearActual = fechaActual.getFullYear();
                                    var yearMin = yearActual - 100;
                                    var yearMax = 2005; // Año máximo permitido para la fecha de nacimiento
            
                                    // Calcular el año mínimo permitido (100 años atrás desde el año máximo permitido)
                                    var yearMinAllowed = yearMax - 100;
            
                                    // Formatear la fecha mínima permitida en formato YYYY-MM-DD
                                    var fechaMin = yearMinAllowed + '-' + ('0' + (fechaActual.getMonth() + 1)).slice(-2) + '-' + ('0' + fechaActual.getDate()).slice(-2);
            
                                    // Establecer los atributos mínimos y máximos en el campo de fecha de nacimiento
                                    fechaNacimiento.setAttribute('min', fechaMin);
                                    fechaNacimiento.setAttribute('max', yearMax + '-12-31'); // Establecer el último día del año máximo
            
                                    // Función para actualizar el rango de años permitido cada año nuevo
                                    function actualizarRangoAnios() {
                                        var newYearMinAllowed = yearMax - 100;
                                        fechaNacimiento.setAttribute('min', newYearMinAllowed + '-01-01');
                                        yearMinAllowed = newYearMinAllowed;
                                        yearMax++;
                                        fechaNacimiento.setAttribute('max', yearMax + '-12-31');
                                    }
            
                                    // Llamar a la función para establecer inicialmente el rango de años
                                    actualizarRangoAnios();
            
                                    // Llamar a la función para actualizar el rango de años cada vez que se inicie un nuevo año
                                    setInterval(function() {
                                        var currentYear = new Date().getFullYear();
                                        if (currentYear > yearMax) {
                                            actualizarRangoAnios();
                                        }
                                    }, 1000 * 60 * 60); // Revisar cada hora si es necesario actualizar el rango de años
                                });
                                </script>

                            <div class="form-group col-md-3">
                                <label for="telefono"><strong>Teléfono</strong></label>
                                <input 
                                type="num" 
                                name="telefono" 
                                class="form-control" 
                                id="telefono" 
                                placeholder="Teléfono casa (SIN GUIONES)"
                                value="{{ old('telefono') }}"
                                pattern="\d{4}-\d{4}"
                                maxlength="9">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="telefono_celular"><strong>Celular *</strong></label>
                                <input 
                                type="num" 
                                name="telefono_celular" 
                                class="form-control" 
                                id="telefono_celular" 
                                placeholder="Teléfono celular (SIN GUIONES)"
                                value="{{ old('telefono_celular') }}"
                                pattern="\d{4}-\d{4}"
                                maxlength="9"
                                required>
                            </div>

                            <script>
                                document.getElementById('telefono').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formatted = '';
                            
                                    if (input.length <= 4) {
                                        formatted = input;
                                    } else {
                                        formatted = input.slice(0, 4) + '-' + input.slice(4, 8);
                                    }
                            
                                    e.target.value = formatted;
                                });
                            
                                document.getElementById('telefono_celular').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formatted = '';
                            
                                    if (input.length <= 4) {
                                        formatted = input;
                                    } else {
                                        formatted = input.slice(0, 4) + '-' + input.slice(4, 8);
                                    }
                            
                                    e.target.value = formatted;
                                });
                            </script>

                            <div class="form-group col-md-3">
                                <label for=""><strong>Correo electrónico *</strong></label>
                                <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Ingrese su correo electrónico" 
                                value="{{ old('email') }}" 
                                required>
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><strong>Contraseña *</strong></label>
                                <input 
                                type="password" 
                                name="password" 
                                class="form-control" 
                                placeholder="********"
                                minlength="8"
                                maxlength="20"
                                value="{{ old('password') }}" 
                                required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><strong>Confirmar Contraseña *</strong></label>
                                <input 
                                type="password" 
                                name="password_confirmation" 
                                class="form-control" 
                                placeholder="********"
                                minlength="8"
                                maxlength="20" 
                                value="{{ old('password_confirmation') }}" 
                                required>
                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                            <div class="form-group col-md-3">
                                <label for=""><strong>Rol *</strong></label>
                                <select name="roles[]" class="form-control" required>
                                    <option value="">Seleccione un rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role}}">{{$role}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success px-4">Guardar</button>
                            <a href="{{url('usuarios')}}" class="btn btn-danger px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
