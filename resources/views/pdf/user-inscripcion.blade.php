<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Inscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .photo-frame {
            width: 3.5cm;
            height: 4.5cm;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .photo-frame img {
            max-width: 100%;
            max-height: 100%;
        }
        .section {
            margin-bottom: 20px;
        }
        .section h4 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container">
            <div>
                <h3>COLEGIO HONDUREÑO DE PROFESIONALES UNIVERSITARIOS EN CONTADURÍA PÚBLICA (COHPUCP)</h3>
            </div>
            <div class="photo-frame">
                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenCarnet = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(!empty($imagenCarnet))
                        <img src="{{ public_path('storage/' . $imagenCarnet[0]) }}" alt="Foto Carnet">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>
        
        <p>Yo <strong>{{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</strong>, licenciado(a) en Contaduría Pública por este medio solicito al Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro de este Colegio y me comprometo al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93 publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporcionaré la siguiente información.</p>

        <div class="section">
            <h4>I. DATOS PERSONALES</h4>
            <p><strong>Nombre completo:</strong> {{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</p>
            <p><strong>Numero de identidad:</strong> {{ $inscripcion->numero_identidad }}</p>
            <p><strong>Lugar de nacimiento:</strong> {{ $inscripcion->direccion_residencia }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('d F Y') }}</p>
            <p><strong>Dirección de residencia:</strong> {{ $inscripcion->lugar_nacimiento }}</p>
            <p><strong>Teléfono fijo:</strong> {{ $inscripcion->telefono }}</p>
            <p><strong>Celular:</strong> {{ $inscripcion->telefono_celular }}</p>
            <p><strong>Correo electrónico:</strong> {{ $inscripcion->email }}</p>
        </div>

        <div class="section">
            <h4>II. DATOS PROFESIONALES</h4>
            <p><strong>Universidad donde se graduó:</strong> {{ $inscripcion->universidad }}</p>
            <p><strong>Fecha de graduación:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->format('d F Y') }}</p>
            <p><strong>Nombre de la empresa donde labora actualmente:</strong> {{ $inscripcion->nombre_empresa_trabajo_actual }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo }}</p>
            <p><strong>Dirección de la empresa:</strong> {{ $inscripcion->direccion_empresa }}</p>
            <p><strong>Correo de la empresa:</strong> {{ $inscripcion->correo_empresa }}</p>
            <p><strong>Teléfono de la empresa:</strong> {{ $inscripcion->telefono_empresa }}</p>
            <p><strong>Extensión teléfonica de la empresa:</strong> {{ $inscripcion->extension_telefono_empresa }}</p>
        </div>

        <div class="section">
            <h4>III. INFORMACIÓN ADICIONAL</h4>
            <p><strong>Especialidad 1:</strong> {{ $inscripcion->especialidad_1 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_1 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->format('d F Y') }}</p>
            <p><strong>Especialidad 2:</strong> {{ $inscripcion->especialidad_2 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_2 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->format('d F Y') }}</p>
        </div>

        <div class="section">
            <h4>IV. CURSOS DE ESPECIALIZACIÓN</h4>
            <p><strong>Nombre del curso de especialización:</strong> {{ $inscripcion->nombre_curso_especializacion }}</p>
            <p><strong>Lugar del curso:</strong> {{ $inscripcion->lugar_curso }}</p>
            <p><strong>Fecha del curso:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->format('d F Y') }}</p>
        </div>

        <div class="section">
            <h4>V. EXPERIENCIA PROFESIONAL</h4>
            <p><strong>Nombre de la empresa 1:</strong> {{ $inscripcion->nombre_empresa1 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa1 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa1 }}</p>
            <p><strong>Nombre de la empresa 2:</strong> {{ $inscripcion->nombre_empresa2 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa2 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa2 }}</p>
        </div>

        <div class="section">
            <h4>VI. MISIONES DESEMPEÑADAS</h4>
            <p><strong>Comisiones:</strong> {{ $inscripcion->comisiones }}</p>
            <p><strong>Representaciones:</strong> {{ $inscripcion->representaciones }}</p>
            <p><strong>Delegaciones:</strong> {{ $inscripcion->delegaciones }}</p>
        </div>

        <div class="section">
            <h4>VII. OTROS</h4>
            <p><strong>Publicación de documentos:</strong> {{ $inscripcion->publicacion_documentos }}</p>
            <p><strong>Publicaciones:</strong> {{ $inscripcion->publicaciones }}</p>
            <p><strong>Publicación de libro:</strong> {{ $inscripcion->publicacion_libro }}</p>
        </div>

        <div class="text-center">

            @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif

            @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif

        </div>

        <div class="text-center">
            @if($inscripcion->imagen_dni)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 20px;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        
            @if($inscripcion->imagen_dni)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI Reverso" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        </div>


        <div class="text-center">
            @if($inscripcion->imagen_dni_beneficiario1)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 1 Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 20px;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        
            @if($inscripcion->imagen_dni_beneficiario1)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 1 Reverso" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        </div>
        

        <div class="text-center">
            @if($inscripcion->imagen_dni_beneficiario2)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 2 Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 20px;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        
            @if($inscripcion->imagen_dni_beneficiario2)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 2 Reverso" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        </div>
              

        <div class="text-center">
            @if($inscripcion->imagen_dni_beneficiario3)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 3 Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 20px;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        
            @if($inscripcion->imagen_dni_beneficiario3)
                @php
                    $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 3 Reverso" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        </div>
        
        
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>

        <div class="text-center">
            @if($inscripcion->cv)
                <iframe src="{{ asset('storage/' . $inscripcion->cv) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                        Por favor, descargue el PDF del Curriculum Vitae: <a href="{{ asset('storage/' . $inscripcion->cv) }}">Descargar PDF</a>.
                </iframe>
            @else
                <p>No Disponible</p>
            @endif
        </div>

    </div>
</body>
</html>
