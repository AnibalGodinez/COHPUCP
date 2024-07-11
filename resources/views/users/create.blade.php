@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">CREAR USUARIO</h3>
                    <form action="{{url('usuarios')}}" method="POST">
                        @csrf
                        
                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group col-md-3">
                                <label for="name"><strong>Primer nombre *</strong></label>
                                <input 
                                type="text" 
                                name="name" class="form-control" 
                                placeholder="Ingrese el primer nombre"
                                value="{{ old('name') }}"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                maxlength="40"
                                required>
                            </div>

                            <!-- Campo para el segundo nombre -->
                            <div class="form-group col-md-3">
                                <label for="name2"><strong>Segundo nombre</strong></label>
                                <input 
                                type="text" 
                                name="name2" class="form-control" 
                                placeholder="Ingrese el primer nombre"
                                value="{{ old('name2') }}"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                maxlength="40">
                            </div>

                            <!-- Campo para el primer apellido -->
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

                            <!-- Campo para el segundo apellido -->
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

                            <!-- Campo para el número de identidad -->
                            <div class="form-group col-md-3">
                                <label for="numero_identidad"><strong>DNI *</strong></label>
                                <input 
                                type="text" 
                                name="numero_identidad" 
                                class="form-control" 
                                id="numero_identidad" 
                                placeholder="Ingrese el DNI (SIN GUIONES)" 
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

                            <!-- Campo para el número de colegiación -->
                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion"><strong>Nº colegiación</strong></label>
                                <input 
                                type="text" 
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

                            <!-- Campo para el RTN -->
                            <div class="form-group col-md-3">
                                <label for="rtn"><strong>RTN</strong></label>
                                <input 
                                type="text" 
                                name="rtn" 
                                class="form-control" 
                                id="rtn" 
                                placeholder="Ingrese el RTN (SIN GUIONES)"
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

                            <!-- Campo para el Sexo -->
                            <div class="form-group col-md-3">
                                <label for="sexo"><strong>Sexo *</strong></label>
                                <select name="sexo" class="form-control @error('sexo') is-invalid @enderror" id="sexo" required>
                                    <option disabled selected>Seleccione una opción</option>
                                    <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @error('sexo')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- Campo para la Fecha de Nacimiento -->
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
                                
                                    // Calcular el año máximo permitido (2005)
                                    var yearMax = 2005; 
                                    // Calcular el año mínimo permitido (1925)
                                    var yearMin = 1925; 
                                
                                    // Establecer los atributos mínimos y máximos en el campo de fecha de nacimiento
                                    fechaNacimiento.setAttribute('min', yearMin + '-01-01');
                                    fechaNacimiento.setAttribute('max', yearMax + '-12-31');
                                
                                    // Función para actualizar el rango de años permitido cada año nuevo
                                    function actualizarRangoAnios() {
                                        var currentYear = new Date().getFullYear();
                                        var newYearMin = currentYear - 80;
                                        var newYearMax = newYearMin + 80;
                                
                                        // Establecer los nuevos límites en el campo de fecha de nacimiento
                                        fechaNacimiento.setAttribute('min', newYearMin + '-01-01');
                                        fechaNacimiento.setAttribute('max', newYearMax + '-12-31');
                                    }
                                
                                    // Llamar a la función para establecer inicialmente el rango de años
                                    actualizarRangoAnios();
                                
                                    // Llamar a la función para actualizar el rango de años cada vez que se inicie un nuevo año
                                    setInterval(function() {
                                        var currentYear = new Date().getFullYear();
                                        var newYearMin = currentYear - 80;
                                        var newYearMax = newYearMin + 80;
                                        if (parseInt(fechaNacimiento.getAttribute('max').split('-')[0]) !== newYearMax) {
                                            actualizarRangoAnios();
                                        }
                                    }, 1000 * 60 * 60); // Revisar cada hora si es necesario actualizar el rango de años
                                });
                                </script>

                            <!-- Campo para el teléfono -->
                            <div class="form-group col-md-3">
                                <label for="telefono"><strong>Teléfono fijo</strong></label>
                                <input 
                                type="text" 
                                name="telefono" 
                                class="form-control" 
                                id="telefono" 
                                placeholder="Teléfono casa (SIN GUION)"
                                value="{{ old('telefono') }}"
                                pattern="\d{4}-\d{4}"
                                maxlength="9">
                            </div>

                            <!-- Campo para el teléfono celular -->
                            <div class="form-group col-md-3">
                                <label for="telefono_celular"><strong>Celular *</strong></label>
                                <input 
                                type="text" 
                                name="telefono_celular" 
                                class="form-control" 
                                id="telefono_celular" 
                                placeholder="Teléfono celular (SIN GUION)"
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

                            <!-- Campo para el correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email"><strong>Correo electrónico *</strong></label>
                                <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Ingrese el correo electrónico" 
                                value="{{ old('email') }}" 
                                required>
                            </div>
                          
                            <!-- Campo para el Rol -->
                            <div class="form-group col-md-3">
                                <label><strong>Rol *</strong></label>
                                <select name="roles[]" class="form-control @error('roles') is-invalid @enderror" required>
                                    <option disabled selected>Seleccione un rol</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ in_array($role, old('roles', [])) ? 'selected' : '' }}>{{ $role }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <!-- Campo para la contraseña  -->
                            <div class="form-group col-md-3">
                                <label for="password"><strong>Contraseña *</strong></label>
                                <input 
                                    type="password" 
                                    name="password" 
                                    class="form-control @error('password') is-invalid @enderror" 
                                    placeholder="Ingrese la contraseña"
                                    minlength="8"
                                    maxlength="20"
                                    required>
                                @error('password')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para la confirmación de la contraseña  -->
                            <div class="form-group col-md-4">
                                <label for="password_confirmation"><strong>Confirmar Contraseña *</strong></label>
                                <input 
                                    type="password" 
                                    name="password_confirmation" 
                                    class="form-control @error('password_confirmation') is-invalid @enderror" 
                                    placeholder="Ingrese la confirmación de la contraseña"
                                    minlength="8"
                                    maxlength="20" 
                                    required>
                                @error('password_confirmation')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
