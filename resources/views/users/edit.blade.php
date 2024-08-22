@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8" style="margin-top: 90px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center">EDITAR INFORMACIÓN</h3>

                    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group col-md-3">
                                <label for="name">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE *</strong>
                                </label>
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
                                <label for="name2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    SEGUNDO NOMBRE
                                </label>
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
                                <label for="apellido">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER APELLIDO *</strong>
                                </label>
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
                                <label for="apellido2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    SEGUNDO APELLIDO
                                </label>
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

                            <!-- Campo para el DNI -->
                            <div class="form-group col-md-3">
                                <label for="numero_identidad">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>DNI *</strong>
                                </label> 
                                <input 
                                    type="text" 
                                    name="numero_identidad" 
                                    id="numero_identidad"
                                    class="form-control"
                                    placeholder="Ingrese su DNI (SIN GUIONES)" 
                                    value="{{ old('numero_identidad', $user->numero_identidad) }}"
                                    maxlength="15"
                                    pattern="\d{4}-\d{4}-\d{5}"
                                    title="Formato: 0000-0000-00000"
                                    required>
                            </div>

                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var input = document.getElementById('numero_identidad');
                                input.addEventListener('input', function(e) {
                                    var value = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formattedValue = value;
                                    if (value.length > 8) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 8) + '-' + value.slice(8, 13);
                                    } else if (value.length > 4) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 8);
                                    }
                                    e.target.value = formattedValue;
                                });
                            });
                            </script>

                            <!-- Campo para el número de colegiación -->
                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion">
                                    <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                    Nº COLEGIACIÓN
                                </label>
                                <input 
                                    type="text" 
                                    name="numero_colegiacion" 
                                    id="numero_colegiacion"
                                    class="form-control"
                                    placeholder="Nº de colegiación (SIN GUIONES)"
                                    value="{{ old('numero_colegiacion', $user->numero_colegiacion) }}"
                                    maxlength="12"
                                    pattern="\d{4}-\d{2}-\d{4}"
                                    title="Formato: 0000-00-0000">
                            </div>

                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var input = document.getElementById('numero_colegiacion');
                                input.addEventListener('input', function(e) {
                                    var value = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formattedValue = value;
                                    if (value.length > 6) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6) + '-' + value.slice(6, 10);
                                    } else if (value.length > 4) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 6);
                                    }
                                    e.target.value = formattedValue;
                                });
                            });
                            </script>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const numeroColegiacionInput = document.getElementById('numero_colegiacion');
                                    const rolesSelect = document.getElementById('roles');
                                    const agremiadoOption = Array.from(rolesSelect.options).find(option => option.text === 'Agremiado');

                                    function toggleAgremiadoOption() {
                                        if (numeroColegiacionInput.value.trim() === '') {
                                            agremiadoOption.disabled = true;
                                            agremiadoOption.selected = false;
                                        } else {
                                            agremiadoOption.disabled = false;
                                        }
                                    }

                                    // Ejecutar la función cuando se cargue la página por primera vez
                                    toggleAgremiadoOption();

                                    // Ejecutar la función cuando se cambie el valor del número de colegiación
                                    numeroColegiacionInput.addEventListener('input', toggleAgremiadoOption);
                                });
                            </script>

                           <!-- Campo para el RTN -->
                            <div class="form-group col-md-3">
                                <label for="rtn">
                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                    RTN
                                </label> 
                                <input 
                                    type="text" 
                                    name="rtn" 
                                    id="rtn"
                                    class="form-control"
                                    placeholder="Ingrese su RTN (SIN GUIONES)"
                                    value="{{ old('rtn', $user->rtn) }}"
                                    maxlength="16"
                                    pattern="\d{4}-\d{4}-\d{6}"
                                    title="Formato: 0000-0000-000000">
                            </div>
                            <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var input = document.getElementById('rtn');
                                input.addEventListener('input', function(e) {
                                    var value = e.target.value.replace(/\D/g, ''); // Eliminar caracteres no numéricos
                                    var formattedValue = value;
                                    if (value.length > 8) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 8) + '-' + value.slice(8, 14);
                                    } else if (value.length > 4) {
                                        formattedValue = value.slice(0, 4) + '-' + value.slice(4, 8);
                                    }
                                    e.target.value = formattedValue;
                                });
                            });
                            </script>

                            <!-- Campo para el Sexo -->
                            <div class="form-group col-md-3">
                                <label for="sexo">
                                    <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                    <strong>SEXO *</strong>
                                </label>
                                <select name="sexo" id="sexo" class="form-control" required>
                                    <option value="" disabled>Selecciona una opción</option>
                                    @foreach($sexos as $sexo)
                                        <option value="{{ $sexo->id }}" {{ old('sexo', $user->sexo_id) == $sexo->id ? 'selected' : '' }}>
                                            {{ $sexo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo para la Fecha de Nacimiento -->
                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento">
                                    <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                    <strong>FECHA DE NACIMIENTO *</strong>
                                </label>
                                <input 
                                    type="date" 
                                    name="fecha_nacimiento" 
                                    class="form-control"
                                    value="{{ old('fecha_nacimiento', $user->fecha_nacimiento) }}"
                                    id="fecha_nacimiento" 
                                    required>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const today = new Date();
                                    const currentYear = today.getFullYear();
                                    const minYear = currentYear - 106;
                                    const maxYear = currentYear - 18;
                                    const minDate = `${minYear}-01-01`;
                                    const maxDate = `${maxYear}-12-31`;
                                    const fechaNacimientoInput = document.getElementById('fecha_nacimiento');
                                    fechaNacimientoInput.setAttribute('min', minDate);
                                    fechaNacimientoInput.setAttribute('max', maxDate);
                                    });
                            </script>

                            <!-- Campo para la Edad -->
                            <div class="form-group col-md-3">
                                <label for="edad">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    EDAD
                                </label>
                                    <input 
                                        type="text" 
                                        name="edad" 
                                        class="form-control"
                                        placeholder="Edad"
                                        id="edad" 
                                        value="{{ $user->edad }}"
                                        readonly>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    function calcularEdad(fechaNacimiento) {
                                        var birthDate = new Date(fechaNacimiento);
                                        var today = new Date();
                                        var age = today.getFullYear() - birthDate.getFullYear();
                                        var monthDifference = today.getMonth() - birthDate.getMonth();                
                                        // Ajusta la edad si aún no ha pasado el cumpleaños este año
                                        if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                            age--;
                                        }                
                                        return age;
                                    }
                                    // Actualiza la edad cuando cambia la fecha de nacimiento
                                    document.getElementById('fecha_nacimiento').addEventListener('change', function() {
                                        var edad = calcularEdad(this.value);
                                        document.getElementById('edad').value = edad;
                                    });
                                    // Calcula y muestra la edad inicialmente
                                    var edadInicial = calcularEdad(document.getElementById('fecha_nacimiento').value);
                                    document.getElementById('edad').value = edadInicial;
                                });
                            </script>

                            <!-- Campo para seleccionar el país -->
                            <div class="col-md-3">
                                <label for="pais">
                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                    <strong>PAÍS *</strong>
                                </label>
                                <select id="pais" name="pais_id" class="form-control">
                                    <option value="">Seleccione un país</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" data-codigo="{{ $pais->codigo }}" {{ $user->pais_id == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo para el teléfono fijo -->
                            <div class="form-group col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    TELÉFONO FIJO
                                </label>                                                             
                                <div class="input-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <span id="codigo_telefono" class="input-group-text">{{ $user->pais->codigo ?? '' }}</span>
                                        <input 
                                            id="telefono" 
                                            type="text" 
                                            class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                                            name="telefono"
                                            placeholder="Ingrese su número de teléfono fijo"
                                            maxlength="15" 
                                            value="{{ old('telefono', $user->telefono) }}"
                                            pattern="^[\d-]*$">
                                    </div>
                                </div>
                                @error('telefono')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para el teléfono celular -->
                            <div class="form-group col-md-3">
                                <label for="telefono_celular">
                                    <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                    <strong>CELULAR *</strong>
                                </label>                                
                                <div class="input-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <span id="codigo_telefono_celular" class="input-group-text">{{ $user->pais->codigo ?? '' }}</span>
                                        <input 
                                            id="telefono_celular" 
                                            type="text" 
                                            class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" 
                                            name="telefono_celular" 
                                            placeholder="Ingrese su número de celular"
                                            maxlength="15" 
                                            value="{{ old('telefono_celular', $user->telefono_celular) }}"
                                            pattern="^[\d-]*$"
                                            required>
                                    </div>
                                </div>
                                @error('telefono_celular')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const paisSelect = document.getElementById('pais');
                                    const codigoTelefonoSpan = document.getElementById('codigo_telefono');
                                    const codigoTelefonoCelularSpan = document.getElementById('codigo_telefono_celular');
                                    const telefonoInput = document.getElementById('telefono');
                                    const telefonoCelularInput = document.getElementById('telefono_celular');                            
                                    paisSelect.addEventListener('change', function () {
                                        const selectedOption = paisSelect.options[paisSelect.selectedIndex];
                                        const codigoPais = selectedOption.getAttribute('data-codigo');
                                        // Actualizar los span con el código del país
                                        codigoTelefonoSpan.textContent = codigoPais;
                                        codigoTelefonoCelularSpan.textContent = codigoPais;                                     
                                        // Obtener el valor actual del teléfono y eliminar el código del país si existe
                                        const telefonoValue = telefonoInput.value;
                                        const telefonoSinCodigo = telefonoValue.startsWith(codigoPais) ? telefonoValue.slice(codigoPais.length) : telefonoValue;
                                        telefonoInput.value = telefonoSinCodigo; // Solo el número sin el código                                
                                        const telefonoCelularValue = telefonoCelularInput.value;
                                        const telefonoCelularSinCodigo = telefonoCelularValue.startsWith(codigoPais) ? telefonoCelularValue.slice(codigoPais.length) : telefonoCelularValue;
                                        telefonoCelularInput.value = telefonoCelularSinCodigo; // Solo el número sin el código
                                    });
                                });
                            </script>

                            <!-- Campo para el correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email"><strong>CORREO ELECTRÓNICO *</strong></label>
                                <input 
                                type="email" 
                                name="email" 
                                class="form-control"
                                placeholder="Ingrese su correo electrónico"
                                    value="{{ old('email', $user->email) }}">
                            </div>

                            <!-- Campo para el Rol -->
                            <div class="form-group col-md-3">
                                <label><strong>ROL *</strong></label>
                                <select id="roles" name="roles[]" class="form-control" multiple required>
                                    @foreach ($roles as $role => $roleName)
                                        <option value="{{ $role }}" {{ in_array($role, $user->roles->pluck('name')->toArray()) ? 'selected' : '' }}>
                                            {{ $roleName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo para el Estado -->
                            <div class="form-group col-md-3">
                                <label for="estado">
                                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                    ESTADO
                                </label>
                                <select name="estado" class="form-control" required>
                                    <option value="activo" {{ old('estado', $user->estado) == 'activo' ? 'selected' : '' }}>Activo</option>
                                    <option value="inactivo" {{ old('estado', $user->estado) == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar cambios
                                </button>
                                <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">
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
