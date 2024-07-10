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
                        <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}" value="{{ old('sexo') }}" required>
                            <option value="">{{ _('Seleccione sexo') }}</option>
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
                                <i class="tim-icons icon-calendar-60"></i>
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


{{-- ============================================================================================================================== --}}

                    <!-- Campo para teléfono -->
                    <div class="input-group{{ $errors->has('telefono') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
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

                    <!-- Campo para teléfono celular -->
                    <div class="input-group{{ $errors->has('telefono_celular') ? ' has-danger' : '' }} form-group col-md-6">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                        </div>
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
@endsection
