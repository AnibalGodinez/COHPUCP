@extends('layouts.app')

@section('content')
<div class="col-lg-4 col-md-6 ml-auto mr-auto" style="margin-top: -120px;">

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="card card-register card-white">
            <div class="card-header">
                <img src="{{ asset('white/img/card-primary.png')}}" class="card-img-top" alt="Card image">
                <h2 class="card-title" style="position: absolute; top: 20px; left: 4px; text-transform: none;">Registrarse</h2>
            </div>

            <div class="card-body" style="margin-top: -70px;">
                <p class="text-dark mb-2" style="margin-bottom: 50px;">Registrate para que ingreses a la <strong>Plataforma Tecnológica del COHPUCP.</strong></p><br>

                <div class="form-row">
                    <!-- Campo para el primer nombre -->
                    <div class="input-group{{ $errors->has('name') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input 
                        type="text" 
                        name="name" 
                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                        placeholder="Primer nombre" 
                        value="{{ old('name') }}"                         
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                        title="En este campo sólo se permiten letras"
                        maxlength="40"
                        required>
                    </div>

                    
                    <!-- Campo para el segundo nombre -->
                    <div class="input-group{{ $errors->has('name2') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <input 
                        type="text" 
                        name="name2" 
                        class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" 
                        placeholder="Segundo nombre" 
                        value="{{ old('name2') }}"                         
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                        title="En este campo sólo se permiten letras"
                        maxlength="40">
                    </div>

                    <!-- Campo para el primer apellido -->
                    <div class="input-group{{ $errors->has('apellido') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
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
                    <div class="input-group{{ $errors->has('apellido2') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
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
{{-- ============================================================================================================================== --}}
                    <!-- Campo para el número de identidad -->
                    <div class="input-group{{ $errors->has('numero_identidad') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-badge"></i>
                            </div>
                        </div>
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
{{-- ============================================================================================================================== --}}

                    <!-- Campo para el número de colegiación -->
                    <div class="input-group{{ $errors->has('numero_colegiacion') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-badge"></i>
                            </div>
                        </div>
                        <input 
                        type="num" 
                        name="numero_colegiacion" 
                        class="form-control" 
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
{{-- ============================================================================================================================== --}}

                    <!-- Campo para RTN -->
                    <div class="input-group{{ $errors->has('rtn') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-notes"></i>
                            </div>
                        </div>
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
{{-- ============================================================================================================================== --}}

                    <!-- Campo para sexo -->
                    <div class="input-group{{ $errors->has('sexo') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-single-02"></i>
                            </div>
                        </div>
                        <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" value="{{ old('sexo') }}">
                            <option disabled selected>Seleccione el sexo</option>
                            <option value="masculino" {{ old('sexo') == 'masculino' ? 'selected' : '' }}>Masculino</option>
                            <option value="femenino" {{ old('sexo') == 'femenino' ? 'selected' : '' }}>Femenino</option>
                        </select>
                        @include('alerts.feedback', ['field' => 'sexo'])
                    </div>
{{-- ============================================================================================================================== --}}


                    <!-- Campo para fecha de nacimiento -->
                        <div class="input-group{{ $errors->has('fecha_nacimiento') ? ' has-danger' : '' }} form-group col-md-6">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-birthday-cake"></i>
                                </div>
                            </div>
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
                    <div class="input-group form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                        <input 
                            type="text" 
                            name="edad" 
                            class="form-control"
                            placeholder="Edad"
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

{{-- ============================================================================================================================== --}}

                    <!-- Campo para seleccionar país -->
                    <div class="input-group{{ $errors->has('pais_id') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-world"></i>
                            </div>
                        </div>
                        <select id="pais" name="pais_id" class="form-control{{ $errors->has('pais_id') ? ' is-invalid' : '' }}" required>
                            <option value="" disabled selected>Seleccionar país</option>
                            @foreach($paises as $pais)
                                <option value="{{ $pais->id }}" data-codigo="{{ $pais->codigo }}">{{ $pais->nombre }}</option>
                            @endforeach
                        </select>
                        @error('pais_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <!-- Campo para el teléfono fijo -->
                    <div class="input-group{{ $errors->has('telefono') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
                        <input 
                        id="telefono" 
                        type="text" 
                        class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" 
                        name="telefono" 
                        placeholder="Teléfono" 
                        value="{{ old('telefono') }}" 
                        required>
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    <!-- Campo para el teléfono celular -->
                    <div class="input-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
                        <input 
                        id="telefono_celular" 
                        type="text" 
                        class="form-control{{ $errors->has('telefono_celular') ? ' is-invalid' : '' }}" 
                        name="telefono_celular" 
                        placeholder="Teléfono Celular" 
                        value="{{ old('telefono_celular') }}" 
                        required>
                        @error('telefono_celular')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

{{-- ============================================================================================================================== --}}

                    <!-- Campo para correo electrónico -->
                    <div class="input-group{{ $errors->has('email') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input 
                        type="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="Ingrese su correo electrónico" 
                        value="{{ old('email') }}" 
                        required>
                    </div>

                    <!-- Campo para confirmación del correo electrónico -->
                    <div class="input-group{{ $errors->has('email_confirmation') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-email-85"></i>
                            </div>
                        </div>
                        <input 
                            type="email" 
                            name="email_confirmation" 
                            class="form-control" 
                            placeholder="Confirme su correo electrónico" 
                            value="{{ old('email_confirmation') }}" 
                            required>
                    </div>
                    
                    <!-- Campo para la contraseña -->
                    <div class="input-group{{ $errors->has('password') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
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
                    <div class="input-group form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-lock-circle"></i>
                            </div>
                        </div>
                        <input 
                        type="password" 
                        name="password_confirmation" 
                        class="form-control" 
                        placeholder="Confirme su contraseña"
                        minlength="8"
                        maxlength="20"
                        required>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <!-- Campo para los términos y condiciones -->
                    <div class="form-check mt-3 {{ $errors->has('agree_terms_and_conditions') ? ' has-danger' : '' }} form-group col-md-8">
                        <label class="form-check-label">
                            <input class="form-check-input {{ $errors->has('agree_terms_and_conditions') ? ' is-invalid' : '' }}" name="agree_terms_and_conditions" type="checkbox" {{ old('agree_terms_and_conditions') ? 'checked' : '' }} style="accent-color: blue;">
                            <span class="form-check-sign"></span> HE LEÍDO Y ACEPTO 
                            <a href="{{ route('register') }}" style="color: rgb(38, 119, 246); font-weight: bold;">TÉRMINOS Y CONDICIONES</a>
                            @include('alerts.feedback', ['field' => 'agree_terms_and_conditions'])
                        </label>
                    </div>                    
                </div>

                <div class="card-footer" style="margin-top: -10px;">
                    <button type="submit" class="btn btn-info btn-lg btn-block mb-3">Registrarse</button>
                    <div class="pull-left">
                        <h6>
                            <a>¿Ya tienes cuenta?</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('login') }}" class="link footer-info" style="color: rgb(38, 119, 246); font-weight: bold">Inicia sesión aquí</a>
                        </h6>
                    </div>
                </div>                
                
            </div>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const paisSelect = document.getElementById('pais');
        const telefonoInput = document.getElementById('telefono');
        const telefonoCelularInput = document.getElementById('telefono_celular');
    
        paisSelect.addEventListener('change', function () {
            const selectedOption = paisSelect.options[paisSelect.selectedIndex];
            const codigoPais = selectedOption.getAttribute('data-codigo');
            telefonoInput.value = codigoPais;
            telefonoCelularInput.value = codigoPais;
        });
    });
    </script>
@endsection
