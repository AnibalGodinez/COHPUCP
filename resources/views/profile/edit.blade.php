@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-5">
        <div class="row justify-content-center" style="margin-top: 90px;">
            <div class="col-md-12">
                <div class="card shadow-lg">
                    <div class="card-header bg-info text-white text-center">
                        <h3 class="card-title" style="color: rgb(255, 255, 255)"><strong>EDITAR PERFIL</strong></h3>
                    </div>


                        <div class="card-body">
                            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <!-- Campo para la foto de perfil -->
                                <div class="form-group text-center mb-5">
                                    <label for="profile_image">Foto de Perfil</label>
                                    <div class="mb-3">
                                        <input type="file" class="form-control-file" id="profile_image" name="profile_image" accept="image/*" onchange="previewImage(event)">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        @if (Auth::user()->profile_image)
                                            <img id="profile_image_preview" src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image" class="img-fluid mt-2" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('white/img/user.jpg') }}" alt="Imagen de perfil por defecto" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                                        @endif
                                    </div>
                                </div>
                                <script>
                                    function previewImage(event) {
                                        var reader = new FileReader();
                                        reader.onload = function(){
                                            var output = document.getElementById('profile_image_preview');
                                            output.src = reader.result;
                                            output.style.display = 'block';
                                        }
                                        reader.readAsDataURL(event.target.files[0]);
                                    }
                                </script>

                                <h4 class="mb-4">Por favor, complete todos los campos marcados con asterisco (<strong><strong>*</strong></strong>) ya que son <strong>obligatorios</strong> y no pueden quedar vacíos al momento de editar su información.</h4><br>
                                <style>
                                    h4 {
                                        font-family: 'Arial', sans-serif; /* Cambiar 'Arial' por la fuente que prefieras */
                                    }
                                </style>

                                <h5 class="text-center" style="text-decoration: underline;"><strong>DATOS PERSONALES</strong></h5>

                                <div class="form-group row">
                                    <!-- Campo para el primer nombre -->                                  
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
                                        <label for="name2">
                                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                                            <strong>SEGUNDO NOMBRE</strong>
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
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
                                        <label for="apellido2">
                                            <i class="fas fa-user" style="margin-right: 8px;"></i>
                                            <strong>SEGUNDO APELLIDO</strong>
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
                                    <div class="col-md-2">
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
                                        @error('numero_identidad')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                    <div class="col-md-2">
                                        <label for="numero_colegiacion">
                                            <i class="fas fa-address-card" style="margin-right: 8px;"></i>
                                            <strong>Nº COLEGIACIÓN</strong>
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
                                        @error('numero_colegiacion')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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

                                </div>


                                <div class="form-group row">
                                    <!-- Campo para el RTN -->
                                    <div class="col-md-2">
                                        <label for="rtn">
                                            <i class="fas fa-file-alt" style="margin-right: 8px;"></i>
                                            <strong>RTN</strong>
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
                                        @error('rtn')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
                                    <div class="col-md-1">
                                        <label for="sexo">
                                            <i class="fas fa-venus-mars" style="margin-right: 8px;"></i>
                                            <strong>SEXO *</strong>
                                        </label>
                                        <select name="sexo_id" class="form-control" required>
                                            <option value="" disabled selected>Seleccione el sexo</option>
                                            @foreach($sexos as $sexo)
                                                <option value="{{ $sexo->id }}" {{ old('sexo_id', $user->sexo_id) == $sexo->id ? 'selected' : '' }}>
                                                    {{ $sexo->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sexo_id')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo para la Fecha de Nacimiento -->
                                    <div class="col-md-2">
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

                                    <!-- Campo para la edad -->
                                    <div class="col-md-1">
                                        <label for="edad">
                                            <i class="fas fa-calendar-day" style="margin-right: 8px;"></i>
                                            <strong>EDAD</strong>
                                        </label>
                                        <input 
                                            type="text" 
                                            name="edad"                                      
                                            class="form-control"
                                            placeholder="Edad"
                                            id="edad"
                                            value="{{ old('edad', $user->edad . ' años') }}"
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
                                                var edad = calcularEdad(this.value) + ' años';
                                                document.getElementById('edad').value = edad;
                                            });
                                            // Calcula y muestra la edad inicialmente
                                            var edadInicial = calcularEdad(document.getElementById('fecha_nacimiento').value) + ' años';
                                            document.getElementById('edad').value = edadInicial;
                                        });
                                    </script>


                                    <!-- Campo para seleccionar el país -->
                                    <div class="col-md-2">
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
                                    <div class="col-md-2">
                                        <label for="telefono">
                                            <i class="fas fa-phone" style="margin-right: 8px;"></i>
                                            <strong>TELÉFONO FIJO</strong>
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
                                    <div class="col-md-2">
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

                                </div><br>

                                <h5 class="text-center" style="text-decoration: underline;"><strong>ENLACES DE MIS REDES SOCIALES</strong></h5>

                                <div class="form-group row">                                                              
                                    <!-- Campo para el link de facebook -->
                                    <div class="col-md-3">
                                        <label for="facebook_link">
                                            <i class="fab fa-facebook" style="margin-right: 8px; color: #0865FE;"></i>
                                            <strong>ENLACE DE FACEBOOK</strong>
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="facebook_link" 
                                            name="facebook_link"
                                            placeholder="Agrega el enlace de tu red social de FACEBOOK" 
                                            value="{{ old('facebook_link', $user->facebook_link) }}">
                                        @error('facebook_link')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo para el link de instagram -->
                                    <div class="col-md-3">
                                        <label for="instagram_link">
                                            <i class="fab fa-instagram" style="margin-right: 8px; color: #C927D0"></i>
                                            <strong>ENLACE DE INSTAGRAM</strong>
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="instagram_link" 
                                            name="instagram_link"
                                            placeholder="Agrega el enlace de tu red social de INSTAGRAM"  
                                            value="{{ old('instagram_link', $user->instagram_link) }}">
                                        @error('instagram_link')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo para el link de linkedin -->
                                    <div class="col-md-3">
                                        <label for="linkedin_link">
                                            <i class="fab fa-linkedin" style="margin-right: 8px; color: #0077B7"></i>
                                            <strong>ENLACE DE LINKENDIN</strong>
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="linkedin_link" 
                                            name="linkedin_link" 
                                            placeholder="Agrega el enlace de tu red social de LINKENDIN" 
                                            value="{{ old('linkedin_link', $user->linkedin_link) }}">
                                        @error('linkedin_link')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo para el link de twitter -->
                                    <div class="col-md-3">
                                        <label for="twitter_link">
                                            <i class="fab fa-x" style="margin-right: 8px; color: #000000"></i>
                                            <strong>ENLACE DE LA RED SOCIAL X</strong>
                                        </label>
                                        <input 
                                            type="text" 
                                            class="form-control" 
                                            id="twitter_link" 
                                            name="twitter_link"
                                            placeholder="Agrega el enlace de tu red social X" 
                                            value="{{ old('twitter_link', $user->twitter_link) }}">
                                        @error('twitter_link')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Campo para el correo electrónico -->
                                    <div class="col-md-2 mb-4">
                                        <label for="email">
                                            <i class="fas fa-envelope" style="margin-right: 8px;"></i>
                                            <strong>CORREO ELECTRÓNICO *</strong>
                                        </label>
                                        <input 
                                            type="email" 
                                            name="email" 
                                            class="form-control"
                                            placeholder="Ingrese su correo electrónico"
                                            value="{{ old('email', $user->email) }}"
                                            required>
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><br>

                                    <!-- Campo para la descripción personal -->
                                    <div class="col-md-12">
                                        <label for="bio">
                                            <i class="fas fa-align-left" style="margin-right: 8px;"></i>
                                            <strong>RESEÑA SOBRE MÍ</strong>
                                        </label>
                                        <textarea 
                                        name="bio" 
                                        id="bio" 
                                        class="form-control"  
                                        placeholder="Ingrese una pequeña reseña" 
                                        style="min-height: 150px; border: 1px solid #838588;" 
                                        rows="12">{{ old('bio', $user->bio) }}</textarea>
                                        @error('bio')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                        
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-save"></i> Guardar cambios
                                    </button>
                                    <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Volver
                                    </a>
                                </div>

                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
