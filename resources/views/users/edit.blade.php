@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mb-4">EDITAR USUARIO</h3>
                    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group col-md-3">
                                <label for="name"><strong>Primer nombre *</strong></label>
                                <input 
                                type="text" 
                                name="name" class="form-control"
                                placeholder="Ingrese el primer nombre"
                                value="{{ old('name', $user->name) }}"
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
                                placeholder="Ingrese el segundo nombre"
                                value="{{ old('name2', $user->name2) }}"
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
                                class="form-control"
                                placeholder="Ingrese el primer apellido"
                                value="{{ old('apellido', $user->apellido) }}"
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
                                class="form-control"
                                placeholder="Ingrese el segundo apellido" 
                                value="{{ old('apellido2', $user->apellido2) }}"
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
                                placeholder="Ingrese su DNI (CON GUIONES)" 
                                value="{{ old('numero_identidad', $user->numero_identidad) }}"
                                maxlength="15"
                                pattern="\d{4}-\d{4}-\d{5}"
                                required>
                            </div>

                            <!-- Campo para el número de colegiación -->
                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion"><strong>Nº colegiación</strong></label>
                                <input 
                                type="text" 
                                name="numero_colegiacion" 
                                class="form-control"
                                placeholder="Nº de colegiación (CON GUIONES)"
                                    value="{{ old('numero_colegiacion', $user->numero_colegiacion) }}"
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

                                placeholder="Ingrese su RTN (CON GUIONES)"
                                    value="{{ old('rtn', $user->rtn) }}"
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
                                <select name="sexo" class="form-control" required>
                                    <option value="masculino" {{ old('sexo', $user->sexo) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo', $user->sexo) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                            </div>

                            <!-- Campo para la Fecha de Nacimiento -->
                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento"><strong>Fecha de nacimiento *</strong></label>
                                <input 
                                type="date" 
                                name="fecha_nacimiento" 
                                class="form-control"
                                    value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}"
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
                                placeholder="0000-0000 (INGRESE EL GUIÓN)"
                                    value="{{ old('telefono', $user->telefono) }}"
                                    maxlength="9"
                                    pattern="\d{4}-\d{4}">
                            </div>

                            <script>
                                document.getElementById('telefono').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/\D/g, '');
                                    if (input.length > 4) {
                                        input = input.slice(0, 4) + '-' + input.slice(4, 8);
                                    }
                                    e.target.value = input;
                                });
                            </script>

                            <!-- Campo para el teléfono celular -->
                            <div class="form-group col-md-3">
                                <label for="telefono_celular"><strong>Celular *</strong></label>
                                <input 
                                type="text" 
                                name="telefono_celular" 
                                class="form-control"
                                placeholder="0000-0000 (INGRESE EL GUIÓN)"
                                    value="{{ old('telefono_celular', $user->telefono_celular) }}"                                 
                                    maxlength="9"
                                    pattern="\d{4}-\d{4}"
                                    required>
                            </div>

                            <script>
                                document.getElementById('telefono_celular').addEventListener('input', function (e) {
                                    var input = e.target.value.replace(/\D/g, '');
                                    if (input.length > 4) {
                                        input = input.slice(0, 4) + '-' + input.slice(4, 8);
                                    }
                                    e.target.value = input;
                                });
                            </script>

                            <!-- Campo para el correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email"><strong>Correo electrónico *</strong></label>
                                <input 
                                type="email" 
                                name="email" 
                                class="form-control"
                                placeholder="Correo electrónico"
                                    value="{{ old('email', $user->email) }}"
                                    readonly>
                            </div>

                            <!-- Campo para el Rol -->
                            <div class="form-group col-md-3">
                                <label><strong>Rol *</strong></label>
                                <select name="roles[]" class="form-control" multiple required>
                                    @foreach ($roles as $role => $roleName)
                                        <option value="{{ $role }}" {{ in_array($role, $user->roles->pluck('name')->toArray()) ? 'selected' : '' }}>{{ $roleName }}</option>
                                    @endforeach
                                </select>
                            </div>                            
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success px-4">Actualizar</button>
                            <a href="{{ url('usuarios') }}" class="btn btn-danger px-4">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
