@extends('layouts.app')

@section('content')
    <div class="col-lg-4 col-md-6 ml-auto mr-auto" style="margin-top: -70px;">

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="card card-register card-white" style="border-radius: 14px">
                <div class="card-header">
                    <img src="{{ asset('white/img/background-vector.jpg')}}" class="card-img-top" alt="Card image">
                    <h3 class="card-title" style="position: absolute; top: 20px; left: 72px; text-transform: none; font-size: 46px;">Registrarse</h3>
                </div>

                <div class="card-body" style="margin-top: -80px;">
                    <p class="text-dark mb-2" style="margin-bottom: 50px;">Registrate para que ingreses a la <strong>Plataforma Tecnológica del COHPUCP</strong></p><br>
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
                        <div class="form-group col-md-8 mt-3 {{ $errors->has('agree_terms_and_conditions') ? ' has-danger' : '' }}">
                            <div class="form-check-label text-center">
                                <label class="form-check-label">
                                    <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions" type="checkbox" {{ old('agree_terms_and_conditions') ? 'checked' : '' }}>
                                    <span class="form-check-sign"></span> HE LEÍDO Y ACEPTO 
                                    <a href="{{ route('register') }}" style="color: rgb(38, 119, 246); font-weight: bold;">TÉRMINOS Y CONDICIONES</a>
                                    @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                                </label>
                            </div>
                        </div>
                    </div>                                   
                </div> 

                <div class="card-footer" style="margin-top: -10px;">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Registrarse</button>
                    <div class="pull-left">
                        <h6>
                            <a><strong><strong>¿Ya tienes cuenta?</strong></strong></a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('login') }}" class="link footer-info" style="color: rgb(38, 119, 246); font-weight: bold">Inicia sesión aquí</a>
                        </h6>
                    </div>                  
                </div>
            </div>
        </form>
    </div>
@endsection
