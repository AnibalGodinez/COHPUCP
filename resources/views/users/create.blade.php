@extends('layouts.app')

@section('content')
<div class="container-fluid mt-8" style="margin-top: 88px">
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
                                <label for="name">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>PRIMER NOMBRE *</strong>
                                </label>
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
                                <label for="name2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    SEGUNDO NOMBRE
                                </label>
                                <input 
                                type="text" 
                                name="name2" class="form-control" 
                                placeholder="Ingrese el segundo nombre"
                                value="{{ old('name2') }}"
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
                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                                placeholder="Ingrese el primer apellido" 
                                value="{{ old('apellido') }}"                         
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
                                class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" 
                                placeholder="Ingrese el segundo apellido" 
                                value="{{ old('apellido2') }}"                         
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
                                <label for="numero_colegiacion">
                                    <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                    Nº COLEGIACIÓN
                                </label>                                                             
                                <input 
                                type="text" 
                                name="numero_colegiacion" 
                                class="form-control" 
                                id="numero_colegiacion" 
                                placeholder="Nº de colegiación (SIN GUIONES)"
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
                                <label for="rtn">
                                    <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                    RTN
                                </label>       
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
                                <label for="sexo">
                                    <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                    <strong>SEXO *</strong>
                                </label>
                                <select name="sexo" class="form-control @error('sexo') is-invalid @enderror" id="sexo" required>
                                    <option disabled selected>Seleccione el sexo</option>
                                    <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>Femenino</option>
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
                                    value="{{ old('fecha_nacimiento') }}"
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

                            <!-- Campo para edad -->
                            <div class="form-group col-md-3">
                                <label for="edad">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    EDAD
                                </label> 
                                <div class="input-group">
                                    <input 
                                        type="text" 
                                        name="edad" 
                                        class="form-control"
                                        placeholder="Edad"
                                        id="edad" 
                                        readonly>
                                </div>
                            </div>
                            <script>
                                document.getElementById('fecha_nacimiento').addEventListener('change', function() {
                                    var birthDate = new Date(this.value);
                                    var today = new Date();
                                    var age = today.getFullYear() - birthDate.getFullYear();
                                    var monthDifference = today.getMonth() - birthDate.getMonth();                
                                    // Ajusta la edad si aún no ha pasado el cumpleaños este año
                                    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                        age--;
                                    }                
                                    document.getElementById('edad').value = age;
                                });
                            </script>

                            <!-- Campo para seleccionar el país -->
                            <div class="col-md-6">
                                <label for="pais">
                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                    <strong>PAÍS *</strong>
                                </label>
                                <select id="pais" name="pais_id" class="form-control">
                                    <option value="">Seleccione un país</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" data-codigo="{{ $pais->codigo }}"
                                            {{ old('pais_id') == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->nombre }}
                                        </option>
                                    @endforeach
                                </select>
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

                            <!-- Campo para el teléfono fijo -->
                            <div class="form-group col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    TELÉFONO FIJO
                                </label>                                                             
                                <div class="input-group{{ $errors->has('telefono') ? ' has-danger' : '' }}">
                                    <div class="input-group">
                                        <span id="codigo_telefono" class="input-group-text"></span>
                                        <input 
                                        id="telefono" 
                                        type="text" 
                                        class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                                        name="telefono"
                                        placeholder="Ingrese su número de teléfono fijo"
                                        maxlength="15" 
                                        value="{{ old('telefono') }}"
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
                                        <span id="codigo_telefono_celular" class="input-group-text"></span>
                                        <input 
                                        id="telefono_celular" 
                                        type="text" 
                                        class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" 
                                        name="telefono_celular" 
                                        placeholder="Ingrese su número de celular"
                                        maxlength="15" 
                                        value="{{ old('telefono_celular') }}"
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

                           <!-- Campo para el correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>CORREO ELECTRÓNICO *</strong>
                                </label>
                                <input 
                                type="email" 
                                name="email" 
                                id="email"
                                class="form-control" 
                                placeholder="Ingrese el correo electrónico" 
                                value="{{ old('email') }}" 
                                required>
                            </div>

                            <!-- Campo para la confirmación del correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email_confirmation">
                                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                    <strong>CONFIRMAR CORREO ELECTRÓNICO *</strong>
                                </label>
                                <input 
                                type="email" 
                                name="email_confirmation" 
                                id="email_confirmation"
                                class="form-control" 
                                placeholder="Confirme el correo electrónico" 
                                value="{{ old('email_confirmation') }}" 
                                required>
                                @error('email_confirmation')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Campo para el Rol -->
                            <div class="form-group col-md-3">
                                <label>
                                    <i class="fas fa-user-tag" style="margin-right: 8px;"></i>
                                    <strong>ROL *</strong>
                                </label>
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
                                <label for="password">
                                    <i class="fas fa-lock" style="margin-right: 8px;"></i>
                                    <strong>CONTRASEÑA *</strong>
                                </label>
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
                            <div class="form-group col-md-3">
                                <label for="password_confirmation">
                                    <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                    <strong>CONFIRMAR NUEVA CONTRASEÑA *</strong>
                                </label>
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

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save" style="margin-right: 8px;"></i>
                                    Guardar
                                </button>
                                <a href="{{ route('usuarios.ver') }}" class="btn btn-secondary">
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

<script>
    var numero_colegiacion = document.getElementById('numero_colegiacion');
    var roles = document.querySelector('select[name="roles[]"]');

    function checkAgremiadoStatus() {
        var agremiadoOption = Array.from(roles.options).find(option => option.textContent === 'Agremiado');
        if (numero_colegiacion.value.trim() === '') {
            agremiadoOption.disabled = true;
        } else {
            agremiadoOption.disabled = false;
        }
    }

    numero_colegiacion.addEventListener('input', checkAgremiadoStatus);
    window.addEventListener('load', checkAgremiadoStatus);
</script>

@endsection
