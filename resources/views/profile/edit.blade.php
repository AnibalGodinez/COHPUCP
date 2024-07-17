@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center col-sm-8" style="margin-top: 15px">
        <div class="col-md-12">
            <div class="card card-user">

                <div class="card-body">
                    <p class="card-text">
                        <h3 class="card-title text-center"><strong>Editar perfil</strong></h3>
                        <div class="author">
                            <div class="block block-one bg-info"></div>
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
    </div>
    <div class="container d-flex justify-content-center col-sm-8">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                    <div class="card-body">
                        <h3 class="card-title text-center">Información</h3><br>
                        @csrf
                        @method('put')
                    
                        @include('alerts.success')

                        <div class="form-row">
                            <!-- Campo para el primer nombre -->
                            <div class="form-group col-md-3">
                                <label for="name">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>Primer nombre *</strong>
                                </label>                            
                                <input 
                                type="text" 
                                name="name"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras" 
                                class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                placeholder="Primer nombre" 
                                value="{{ old('name', auth()->user()->name) }}"
                                required>
                            </div>

                            <!-- Campo para el segundo nombre -->
                            <div class="form-group col-md-3">
                                <label for="name2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    Segundo nombre
                                </label> 
                                <input 
                                type="text" 
                                name="name2" 
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                class="form-control{{ $errors->has('name2') ? ' is-invalid' : '' }}" 
                                placeholder="Segundo nombre" 
                                value="{{ old('name2', auth()->user()->name2) }}">
                            </div>

                            <!-- Campo para el primer apellido -->
                            <div class="form-group col-md-3">
                                <label for="apellido">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    <strong>Primer apellido *</strong>
                                </label> 
                                <input 
                                type="text" 
                                name="apellido"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras" 
                                class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" 
                                placeholder="Primer apellido" 
                                value="{{ old('apellido', auth()->user()->apellido) }}"
                                required>
                            </div>

                            <!-- Campo para el segundo apellido -->
                            <div class="form-group col-md-3">
                                <label for="apellido2">
                                    <i class="fas fa-user" style="margin-right: 8px;"></i>
                                    Segundo apellido
                                </label> 
                                <input 
                                type="text" 
                                name="apellido2"
                                pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+"
                                title="En este campo sólo se permiten letras"
                                class="form-control{{ $errors->has('apellido2') ? ' is-invalid' : '' }}" 
                                placeholder="{{ __('Segundo apellido') }}" 
                                value="{{ old('apellido2', auth()->user()->apellido2) }}">
                            </div>

                            <!-- Campo para el DNI -->
                            <div class="form-group col-md-3">
                                <label for="numero_identidad">
                                    <i class="fas fa-id-card" style="margin-right: 8px;"></i>
                                    <strong>DNI *</strong>
                                </label>
                                <input 
                                type="text" 
                                id="dni"
                                name="numero_identidad" 
                                class="form-control{{ $errors->has('numero_identidad') ? ' is-invalid' : '' }}" 
                                placeholder="Ingrese SU DNI (SIN GUIONES)"
                                maxlength="15" 
                                value="{{ old('numero_identidad', auth()->user()->numero_identidad) }}"
                                required>
                            </div>                   
                            <script>
                            document.getElementById('dni').addEventListener('input', function (e) {
                              var target = e.target, position = target.selectionEnd, length = target.value.length;                      
                              target.value = target.value.replace(/\D/g, '').replace(/(\d{4})?(\d{4})?(\d{5})?/, function (_, p1, p2, p3) {
                                return (p1 ? p1 + '-' : '') + (p2 ? p2 + '-' : '') + (p3 || '');
                              }).substring(0, 15);
                              position = position - (length - target.value.length);
                              target.setSelectionRange(position, position);
                            });
                            </script>
                            
                            <!-- Campo para el número de colegiación -->
                            <div class="form-group col-md-3">
                                <label for="numero_colegiacion">
                                    <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                    Nº colegiación
                                </label> 
                                <input 
                                type="text" 
                                id="numero_colegiacion"
                                name="numero_colegiacion" 
                                class="form-control{{ $errors->has('numero_colegiacion') ? ' is-invalid' : '' }}" 
                                placeholder="Nº de colegiación (SIN GUIONES)"
                                value="{{ old('numero_colegiacion', auth()->user()->numero_colegiacion) }}"
                                maxlength="12">
                            </div> 
                            <script>
                            document.getElementById('numero_colegiacion').addEventListener('input', function (e) {
                              var target = e.target, position = target.selectionEnd, length = target.value.length;
                              target.value = target.value.replace(/\D/g, '').replace(/(\d{4})?(\d{2})?(\d{4})?/, function (_, p1, p2, p3) {
                                return (p1 ? p1 + '-' : '') + (p2 ? p2 + '-' : '') + (p3 || '');
                              }).substring(0, 12);
                              position = position - (length - target.value.length);
                              target.setSelectionRange(position, position);
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
                                id="rtn"
                                name="rtn" 
                                class="form-control{{ $errors->has('rtn') ? ' is-invalid' : '' }}" 
                                placeholder="0000-0000-000000"
                                value="{{ old('rtn', auth()->user()->rtn) }}"
                                maxlength="16">
                            </div>
                            <script>
                            document.getElementById('rtn').addEventListener('input', function (e) {
                              var target = e.target, position = target.selectionEnd, length = target.value.length;
                              target.value = target.value.replace(/\D/g, '').replace(/(\d{4})?(\d{4})?(\d{6})?/, function (_, p1, p2, p3) {
                                return (p1 ? p1 + '-' : '') + (p2 ? p2 + '-' : '') + (p3 || '');
                              }).substring(0, 16); 
                              position = position - (length - target.value.length);
                              target.setSelectionRange(position, position);
                            });
                            </script>

                            <!-- Campo para el Sexo -->
                            <div class="form-group col-md-3">
                                <label for="sexo">
                                    <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                    <strong>Sexo *</strong>
                                </label>
                                <select name="sexo" class="form-control{{ $errors->has('sexo') ? ' is-invalid' : '' }}">
                                    <option value="masculino" {{ old('sexo', auth()->user()->sexo) == 'masculino' ? 'selected' : '' }}>Masculino</option>
                                    <option value="femenino" {{ old('sexo', auth()->user()->sexo) == 'femenino' ? 'selected' : '' }}>Femenino</option>
                                </select>
                                @include('alerts.feedback', ['field' => 'sexo'])
                            </div>

                            <!-- Campo para la Fecha de Nacimiento -->
                            <div class="form-group col-md-3">
                                <label for="fecha_nacimiento">
                                    <i class="fas fa-birthday-cake" style="margin-right: 8px;"></i>
                                    <strong>Fecha de nacimiento *</strong>
                                </label>
                                <input 
                                type="date" 
                                id="fecha_nacimiento"
                                name="fecha_nacimiento" 
                                class="form-control{{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" 
                                value="{{ old('fecha_nacimiento', auth()->user()->fecha_nacimiento) }}"
                                required>
                                @include('alerts.feedback', ['field' => 'fecha_nacimiento'])
                            </div>

                            <!-- Campo para la Edad -->
                            <div class="form-group col-md-3">
                                <label for="edad">
                                    <i class="fas fa-calendar-alt" style="margin-right: 8px;"></i>
                                    Edad
                                </label>
                                <input 
                                type="text" 
                                id="edad"
                                name="edad" 
                                class="form-control" 
                                readonly>
                            </div>
                            <script>
                                function calculateAge() {
                                    var birthDate = new Date(document.getElementById('fecha_nacimiento').value);
                                    var today = new Date();
                                    var age = today.getFullYear() - birthDate.getFullYear();
                                    var monthDifference = today.getMonth() - birthDate.getMonth();                
                                    // Ajusta la edad si aún no ha pasado el cumpleaños este año
                                    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                        age--;
                                    }                
                                    document.getElementById('edad').value = age;
                                }
                                document.getElementById('fecha_nacimiento').addEventListener('change', calculateAge);
                                window.onload = calculateAge;
                            </script>

                            <!-- Campo para seleccionar el país -->
                            <div class="col-md-3">
                                <label for="pais">
                                    <i class="fas fa-globe" style="margin-right: 8px;"></i>
                                    <strong>País *</strong>
                                </label>
                                <select id="pais" name="pais_id" class="form-control" required>
                                    <option value="">Seleccione un país</option>
                                    @foreach($paises as $pais)
                                        <option value="{{ $pais->id }}" data-codigo="{{ $pais->codigo }}"
                                            {{ auth()->user()->pais_id == $pais->id ? 'selected' : '' }}>
                                            {{ $pais->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Campo para el teléfono fijo -->
                            <div class="form-group col-md-3">
                                <label for="telefono">
                                    <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                    Teléfono fijo
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
                                        value="{{ auth()->user()->telefono }}"
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
                                    <strong>Celular *</strong>
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
                                        value="{{ auth()->user()->telefono_celular }}"
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

                                function updatePhoneCodes() {
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
                                }

                                paisSelect.addEventListener('change', updatePhoneCodes);

                                // Llama a la función updatePhoneCodes cuando se carga la página
                                window.onload = updatePhoneCodes;
                            });
                            </script>


                            <!-- Campo para el correo electrónico -->
                            <div class="form-group col-md-3">
                                <label for="email">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                    <strong>Correo electrónico *</strong>
                                </label>
                                <input 
                                type="email" 
                                name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                placeholder="Ingrese su correo electrónico" 
                                value="{{ old('email', auth()->user()->email) }}">
                                @include('alerts.feedback', ['field' => 'email'])
                            </div>
                        </div>

                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-success">Actualizar información</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
