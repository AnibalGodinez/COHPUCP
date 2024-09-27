@extends('layouts.app')

@section('content')
<div class="container-fluid d-flex flex-column flex-md-row position-relative" style="min-height: 100vh; margin-top: -65px">

    <!-- Sección con fondo azul y logo -->
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center text-white p-5 section-blue position-relative">
        <div class="text-center" style="z-index: 4; position: relative;">
            <img src="{{ asset('white/img/favicon.png') }}" alt="Logo" class="img-fluid mb-3" style="max-width: 150px;">
            <p class="mt-3"><strong>¡Bienvenido! Regístrate para crear una cuenta.</strong></p>
        </div>

        <img src="{{ asset('white/img/login-image.png') }}" alt="Imagen Registro" class="img-fluid position-absolute" style="bottom: 20px; right: 20px; max-width: 200px; z-index: 10;">

        <svg class="curve" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 80" preserveAspectRatio="none">
            <path d="M100,0 C95,70 30,100 0,100 L110,100 Z" fill="white"/>
        </svg>
    </div>

    <!-- Sección con el formulario de Registro -->
    <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center p-5 section-white position-relative">
        <!-- Imagen de fondo -->
        <div class="background-image position-absolute" style="z-index: 1;"></div>

        <div class="text-center p-4" style="width: 100%; max-width: 600px; z-index: 2;">
            <h1 class="text-dark"><strong>Registro</strong></h1>
            <form method="POST" action="{{ route('register') }}" class="mt-4">
                @csrf

                <h4 class="justify-content-center align-items-left">Por favor, complete todos los campos marcados con asterisco (<strong>*</strong>) ya que son <strong>obligatorios</strong> y no pueden quedar vacíos al momento de registrarse.</h4>
                <style>
                    h4 {
                        font-family: 'Arial', sans-serif; /* Cambiar 'Arial' por la fuente que prefieras */
                    }
                </style>

                <br>

                <div class="form-row">
                    <!-- Campo para el primer nombre -->
                    <div class="form-group col-md-6">
                        <label for="name">
                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                            <strong>Primer nombre *</strong>
                        </label>
                        <input 
                            type="text" 
                            name="name"
                            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  
                            placeholder="Ingrese su primer nombre" 
                            value="{{ old('name') }}"                         
                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                            title="En este campo sólo se permiten letras"
                            maxlength="40"
                            required>
                    </div>

                    <!-- Campo para el segundo nombre -->
                    <div class="form-group col-md-6">
                        <label for="name2">
                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                            Segundo nombre
                        </label>
                        <input 
                            type="text" 
                            name="name2"
                            class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}"  
                            placeholder="Ingrese su segundo nombre" 
                            value="{{ old('name2') }}"                         
                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                            title="En este campo sólo se permiten letras"
                            maxlength="40">
                    </div>

                    <!-- Campo para el primer apellido -->
                    <div class="form-group col-md-6">
                        <label for="apellido">
                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                            <strong>Primer apellido *</strong>
                        </label>
                        <input 
                            type="text" 
                            name="apellido" 
                            class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                            placeholder="Ingrese su primer apellido" 
                            value="{{ old('apellido') }}"                         
                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                            title="En este campo sólo se permiten letras"
                            maxlength="40" 
                            required>
                    </div>

                    <!-- Campo para el segundo apellido -->
                    <div class="form-group col-md-6">
                        <label for="apellido2">
                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                            Segundo apellido
                        </label>
                        <input 
                            type="text" 
                            name="apellido2" 
                            class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" 
                            placeholder="Ingrese su segundo apellido" 
                            value="{{ old('apellido2') }}"                         
                            pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                            title="En este campo sólo se permiten letras"
                            maxlength="40">
                    </div>

                        <!-- Campo para el DNI -->
                        <div class="form-group col-md-6">
                            <label for="numero_identidad">
                                <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                <strong>DNI *</strong>
                            </label>
                            <input 
                                type="text" 
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

                        <!-- Campo para el número de colegiación -->
                        <div class="form-group col-md-6">
                            <label for="numero_colegiacion">
                                <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                Nº colegiación
                            </label>
                            <input 
                                type="text" 
                                name="numero_colegiacion" 
                                class="form-control{{ $errors->has('numero_colegiacion') ? ' is-invalid' : '' }}" 
                                id="numero_colegiacion" 
                                placeholder="Nº colegiación (SIN GUIONES)"
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

                        <!-- Campo para RTN -->
                        <div class="form-group col-md-6">
                            <label for="rtn">
                                <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                RTN
                            </label>
                            <input 
                                type="num" 
                                name="rtn" 
                                class="form-control" 
                                id="rtn" 
                                placeholder="Ingrese RTN (SIN GUIONES)"
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
                        <div class="form-group col-md-6">
                            <label for="sexo">
                                <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                <strong>SEXO *</strong>
                            </label>
                            <select name="sexo" id="sexo" class="form-control" required>
                                <option value="" disabled selected>Selecciona una opción</option>
                                @foreach($sexos as $sexo)
                                    <option value="{{ $sexo['id'] }}" {{ old('sexo') == $sexo['id'] ? 'selected' : '' }}>
                                        {{ $sexo['nombre'] }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Campo para fecha de nacimiento -->
                        <div class="form-group col-md-6">
                            <label for="fecha_nacimiento">
                                <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                <strong>Fecha de nacimiento *</strong>
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
                        <div class="form-group col-md-6">
                            <label for="edad">
                                <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                Edad
                            </label> 
                            <input 
                                type="text" 
                                name="edad" 
                                class="form-control"
                                id="edad" 
                                readonly>
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

                        <!-- Campo para seleccionar país -->
                        <div class="form-group col-md-12">
                            <label for="pais">
                                <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                <strong>País *</strong>
                            </label>
                            <select id="pais" name="pais_id" class="form-control{{ $errors->has('pais_id') ? ' is-invalid' : '' }}">
                                <option value="" disabled selected>Seleccionar país</option>
                                @foreach($paises as $pais)
                                    <option value="{{ $pais->id }}" data-codigo="{{ $pais->codigo }}">{{ $pais->nombre }}</option>
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
                        <div class="form-group col-md-6">
                            <label for="telefono">
                                <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                Teléfono fijo
                            </label> 
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
                            @error('telefono')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <!-- Campo para el teléfono celular -->
                        <div class="form-group col-md-6">
                            <label for="telefono_celular">
                                <i class="fas fa-mobile-alt" style="margin-right: 8px;"></i>
                                <strong>Celular *</strong>
                            </label> 
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
                            @error('telefono_celular')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Campo para correo electrónico -->
                        <div class="form-group col-md-6">
                            <label for="email">
                                <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                <strong>Correo electrónico *</strong>
                            </label>
                            <input 
                                type="email" 
                                name="email" 
                                class="form-control" 
                                placeholder="Ingrese su correo electrónico" 
                                value="{{ old('email') }}" 
                                required>
                                @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <!-- Campo para confirmación del correo electrónico -->
                        <div class="form-group col-md-6">
                            <label for="email_confirmation">
                                <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                                <strong>Confirmar correo electrónico *</strong>
                            </label>
                                <input 
                                    type="email" 
                                    name="email_confirmation" 
                                    class="form-control" 
                                    placeholder="Confirme su correo electrónico" 
                                    value="{{ old('email_confirmation') }}" 
                                    required>
                                    @if ($errors->has('email_confirmation'))
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $errors->first('email_confirmation') }}</strong>
                                    </span>
                                @endif
                        </div>

                    <!-- Campo para la contraseña -->
                    <div class="form-group col-md-6">
                        <label for="password">
                            <i class="fas fa-lock" style="margin-right: 8px;"></i>
                            <strong>Contraseña *</strong>
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-control" 
                            placeholder="Ingrese su contraseña"
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
                    @push('scripts')
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            document.getElementById('password').addEventListener('input', function () {
                                var password = this.value;
                                var regex = /^(?=.*[!@#$%^&*(),.?":{}|<>])[A-Za-z\d!@#$%^&*(),.?":{}|<>]{8,}$/;
                                var isValid = regex.test(password);

                                if (!isValid) {
                                    this.setCustomValidity('La contraseña debe contener al menos un símbolo o caracter especial.');
                                } else {
                                    this.setCustomValidity('');
                                }
                            });
                        });
                    </script>
                    @endpush

                    <!-- Campo para la confirmación de la contraseña -->
                    <div class="form-group col-md-6">
                        <label for="password_confirmation">
                            <i class="fas fa-check-circle" style="margin-right: 8px;"></i>
                            <strong>Confirmar Contraseña *</strong>
                        </label>
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            class="form-control" 
                            placeholder="Confirme su contraseña"
                            minlength="8"
                            maxlength="20"
                            required>
                        @error('password_confirmation')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Campo para los términos y condiciones -->
                    <div class="form-group col-md-12 mt-3 {{ $errors->has('agree_terms_and_conditions') ? ' has-danger' : '' }}">
                        <div class="form-check-label text-center">
                            <label class="form-check-label">
                                <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions" type="checkbox" {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                                <span class="form-check-sign"></span> HE LEÍDO Y ACEPTO 
                                <a href="{{ route('register') }}" style="color: rgb(38, 119, 246); font-weight: bold;">TÉRMINOS Y CONDICIONES</a>
                                @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-info btn-lg btn-block">REGISTRARSE</button>
                    </div>

                    <div class="d-flex justify-content-between mb-4 col-md-12">
                        <strong>¿Ya tienes cuenta?</strong> <a href="{{ route('login') }}" class="text-info font-weight-bold"> Inicia sesión</a>
                    </div>
                </div>                                              
            </form>
        </div>
    </div>
</div>

<style>
    /* Sección azul con logo */
    .section-blue {
        background: linear-gradient(to bottom, #0A4CA0, #1D83E5);
        min-height: 50vh; /* 50% de la altura de la ventana */
        position: relative;
        z-index: 0; /* Asegúrate de que el fondo azul esté detrás */
    }
    
    .curve {
        position: absolute;
        top: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }
    
    /* Imagen de fondo en la sección derecha */
    .background-image {
        background-image: url('{{ asset('white/img/Fondo-blanco-moderno.png') }}');
        background-size: cover;
        background-position: center;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0.9; /* Ajusta la opacidad de la imagen de fondo */
        z-index: 1; /* Asegúrate de que la imagen de fondo esté detrás del formulario */
    }
    
    .text-center {
        z-index: 4; /* Asegurar que el texto y el botón estén delante */
        position: relative;
    }
</style>  
@endsection
