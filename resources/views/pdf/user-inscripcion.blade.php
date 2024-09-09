<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Inscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            border: 1px solid #000000bd;
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
        .page-break {
            page-break-before: always;
        }
        .text-center {
            text-align: center;
        }
        .img-fluid {
            width: 100%;
            height: auto;
            object-fit: contain;
        }
        .img-50 {
            width: 50%;
            height: auto;
            object-fit: contain;
        }
        .number-colegiacion {
            border: 1px solid #000;
            padding: 5px;
            display: inline-block;
            margin: 10px 0;
        }
        .full-cover-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('white/img/logo-empresa.png');
            background-repeat: no-repeat;
            background-size: 80%;
            background-position: center center;
            opacity: 0.1; /* Ajusta este valor para cambiar la transparencia */
            z-index: -1; /* Asegura que el contenido de la página esté por encima de la imagen */
        }
        body::after {
            content: '';
            position: fixed;
            bottom: -175px; /* Ajusta este valor para mover la imagen hacia abajo */
            left: -230px;
            width: 170%;
            height: 400px; /* Ajusta la altura del pie de página según necesites */
            background-image: url('white/img/color-1.jpg');
            background-repeat: no-repeat;
            background-size: 70%; /* Ajusta el tamaño de la imagen */
            background-position: center bottom;
            opacity: 0.9; /* Ajusta la opacidad para un efecto de marca de agua */
            z-index: -1; /* Asegura que el contenido esté sobre la imagen */
        }


    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header-container">
            <div style="margin-left: 110px; margin-top:-10px"><br>
                <h3>COLEGIO HONDUREÑO DE PROFESIONALES <br> UNIVERSITARIOS EN CONTADURÍA PÚBLICA <br> 
                    <span style="margin-left: 170px; display: inline-block;">(COHPUCP)</span>
                </h3>
            </div>            
            <div class="photo-frame" style="margin-left: 575px; margin-top:-250px">
                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenCarnet = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(!empty($imagenCarnet))
                        <img src="{{ public_path('storage/' . $imagenCarnet[0]) }}" alt="Foto Carnet" class="full-cover-img">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>                       
        </div>
        <img src="white/img/logo-empresa.png" alt="Logo" style="margin-left: -10px; margin-top:-180px; width: 90px; height: auto;">

        <!-- Campo Número de Colegiación -->
        <div class="section">
            <p><strong>NÚMERO DE AFILIACIÓN:</strong></p>
            <div class="number-colegiacion" style="margin-left: 210px; margin-top:-45px; font-size: 1.3rem;">
                @if($numero_colegiacion)
                    @php
                        // Formatear el número de colegiación
                        $formattedNumber = preg_replace('/(\d{4})(\d{2})(\d{4})/', '$1-$2-$3', $numero_colegiacion);
                    @endphp
                    {{ $formattedNumber }}
                @else
                    <p style="margin: 0;">No disponible</p>
                @endif
            </div>
            <p style="margin: 0;">El abajo firmante licenciado(a) en Contaduría Pública por este medio solicita al Colegio Hondureño de
                Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro de este Colegio y se
                compromete al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93
                publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporciona la
                siguiente información.</p>
        </div>

        <!-- Datos Personales -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">I. DATOS PERSONALES</h4>
            </div>
            <p><strong>Nombre completo:</strong> {{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</p>
            <p><strong>Numero de identidad:</strong> {{ $inscripcion->numero_identidad }}</p>
            <p><strong>Lugar de nacimiento:</strong> {{ $inscripcion->direccion_residencia }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('Y') }}</p>
            <p><strong>Dirección de residencia:</strong> {{ $inscripcion->lugar_nacimiento }}</p>
            <p><strong>Teléfono fijo:</strong> {{ $inscripcion->telefono }}</p>
            <p><strong>Celular:</strong> {{ $inscripcion->telefono_celular }}</p>
            <p><strong>Correo electrónico:</strong> {{ $inscripcion->email }}</p>
        </div>

        <!-- Datos Profesionales -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">II. DATOS PROFESIONALES</h4>
            </div>
            <p><strong>Universidad donde se graduó:</strong> {{ $inscripcion->universidad }}</p>
            <p><strong>Fecha de graduación:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->format('Y') }}</p>
            <p><strong>Empresa donde labora actualmente:</strong> {{ $inscripcion->nombre_empresa_trabajo_actual }}</p>
            <p><strong>Cargo que desempeña:</strong> {{ $inscripcion->cargo }}</p>
            <p><strong>Dirección de la empresa:</strong> {{ $inscripcion->direccion_empresa }}</p>
            <p><strong>Correo de la empresa:</strong> {{ $inscripcion->correo_empresa }}</p>
            <p><strong>Teléfono de la empresa:</strong> {{ $inscripcion->telefono_empresa }}</p>
            <p><strong>Extensión teléfonica de la empresa:</strong> {{ $inscripcion->extension_telefono_empresa }}</p>
        </div>

        <!-- Información Adicional -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">III. INFORMACIÓN ADICIONAL</h4>
            </div>
            <p><strong>Especialidad 1:</strong> {{ $inscripcion->especialidad_1 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_1 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->format('Y') }}</p>
            
            <p><strong>Especialidad 2:</strong> {{ $inscripcion->especialidad_2 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_2 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->format('Y') }}</p>
        </div>

        <!-- Cursos de Especialización -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">IV. CURSO DE ESPECIALIZACIÓN</h4>
            </div>
            <p><strong>Nombre del curso de especialización:</strong> {{ $inscripcion->nombre_curso_especializacion }}</p>
            <p><strong>Lugar del curso:</strong> {{ $inscripcion->lugar_curso }}</p>
            <p><strong>Fecha del curso:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->format('Y') }}</p>
        </div>

        <!-- Experiencia Profesional -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">V. EXPERIENCIA PROFESIONAL</h4>
            </div>
            <p><strong>Nombre de la empresa 1:</strong> {{ $inscripcion->nombre_empresa1 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa1 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa1 }}</p>

            <p><strong>Nombre de la empresa 2:</strong> {{ $inscripcion->nombre_empresa2 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa2 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa2 }}</p>
        </div>

        <!-- Misiones Desempeñadas -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">VI. MISIONES DESEMPEÑADAS</h4>
            </div>
            <p><strong>Comisiones:</strong> {{ $inscripcion->comisiones }}</p>
            <p><strong>Representaciones:</strong> {{ $inscripcion->representaciones }}</p>
            <p><strong>Delegaciones:</strong> {{ $inscripcion->delegaciones }}</p>
        </div>

        <!-- Otros -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">VII. OTROS</h4>
            </div>
            <p><strong>Publicación de documentos:</strong> {{ $inscripcion->publicacion_documentos }}</p>
            <p><strong>Publicaciones:</strong> {{ $inscripcion->publicaciones }}</p>
            <p><strong>Publicación de libro:</strong> {{ $inscripcion->publicacion_libro }}</p>
        </div>

        <!-- Imágenes del título universitario -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">TÍTULO UNIVERSITARIO</h4>
                @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 90%; object-fit: contain;">
                @else
                    <p>No disponible</p>
                @endif
            @else
                <p>No disponible</p>
            @endif

            @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(count($imagenes) > 1)
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                @else
                    <p>No disponible</p>
                @endif
            @else
                <p>No disponible</p>
            @endif
            </div>
        </div>

        <!-- Imágenes del dni -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">DNI DEL SOLICITANTE</h4><br><br>
                @if($inscripcion->imagen_dni)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif

                @if($inscripcion->imagen_dni)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes tamaño carnet -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">FOTOS TAMAÑO CARNET</h4><br><br>
                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto tamaño carnet 1" class="img-fluid" style="width: 50%; height: auto; object-fit: contain; margin-bottom: 60px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif

                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto tamaño carnet 2" class="img-fluid" style="width: 50%; height: auto; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 1 -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">DNI DEL BENEFICIARIO 1</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario1)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 1 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif

                @if($inscripcion->imagen_dni_beneficiario1)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 1 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 2 -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">DNI DEL BENEFICIARIO 2</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario2)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 2 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif

                @if($inscripcion->imagen_dni_beneficiario2)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 2 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 3 -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">DNI DEL BENEFICIARIO 3</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario3)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 3 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif

                @if($inscripcion->imagen_dni_beneficiario3)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 3 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes del rtn -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">FOTO DEL RTN</h4><br><br>
                @if($inscripcion->imagen_rtn)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_rtn);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del RTN Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No disponible</p>
                    @endif
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Curriculun Vitae -->
        <div class="page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">CURRICULUM VITAE</h4><br><br>
                @if($inscripcion->cv)
                    <iframe src="{{ asset('storage/' . $inscripcion->cv) }}" 
                        style="width: 100%; height: 100%; border: none;" frameborder="0">
                        Para ver el Curriculum Vitae, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcion->cv) }}"><br><br>Ver currículum vitae</a>
                    </iframe>
                @else
                    <p>No disponible</p>
                @endif
            </div>
        </div>

        <!-- Autorización -->
        <div class="page-break"><br>
            <div class="section text-center">
                <h3 style="text-decoration: underline;">AUTORIZACIÓN</h3>
            </div>

            <div>
                <p>
                    El <strong>Colegio Hondureño de Profesionales Universitarios en Contaduría Pública</strong> me otorga el
                    beneficio del Seguro de Vida Colectivo; en caso de retrasarme más de tres (03) meses en el pago de
                    mis cuotas de colegiación mensual, autorizo al Colegio <strong>excluirme de forma automática de la póliza
                    del Seguro de Vida Colectivo; todo ello sin responsabilidad legal para el Colegio.</strong> <br><br><br>

                    Bajo el entendido, que: <br><br>
                     1) El colegio me re incluirá en la póliza del seguro de Vida Colectivo al
                    estar completamente al día en el pago de las cuotas procediendo a llenar el formulario que la compañía
                    aseguradora proporcione al Colegio. <br><br>

                    2) El COHPUCP no es responsable por las denegaciones de primer ingreso o reingreso a la Póliza de
                    Seguro de Vida Colectivo.
                </p>
            </div><br><br><br>

            <div class="section text-center" style="margin-left: -350px;">
                <!-- Firma solicitante -->
                <p><strong></strong> _________________________________ </p>
                <p><strong></strong> Firma del solicitante</p>
            </div>

            <div class="section text-center" style="margin-left: 350px; margin-top:-250px">
                <!-- Firma secretario -->
                <p><strong></strong> _________________________________ </p>
                <p><strong></strong> Firma del secretario(a)</p><br><br>
            </div>

            <div class="section text-center">
                <!-- Fecha -->
                <p><strong></strong> {{ \Carbon\Carbon::now()->format('d') }} de {{ \Carbon\Carbon::now()->translatedFormat('F') }} del {{ \Carbon\Carbon::now()->format('Y') }}</p>
            </div>
        </div>

    </div>
</body>
</html>
