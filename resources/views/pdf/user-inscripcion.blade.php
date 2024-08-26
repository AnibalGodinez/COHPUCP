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
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
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
        
        <p>Yo <strong>{{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</strong>, licenciado(a) en Contaduría Pública por este medio solicito al Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro de este Colegio y me comprometo al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93 publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporcionaré la siguiente información.</p><br>

        <!-- Datos Personales -->
        <div class="section">
            <div class="section text-center">
                <h4>I. DATOS PERSONALES</h4>
            </div>
            <p><strong>Nombre completo:</strong> {{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</p>
            <p><strong>Numero de identidad:</strong> {{ $inscripcion->numero_identidad }}</p>
            <p><strong>Lugar de nacimiento:</strong> {{ $inscripcion->direccion_residencia }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('Y') }}</p>
            <p><strong>Dirección de residencia:</strong> {{ $inscripcion->lugar_nacimiento }}</p>
            <p><strong>Teléfono fijo:</strong> {{ $inscripcion->telefono }}</p>
            <p><strong>Celular:</strong> {{ $inscripcion->telefono_celular }}</p>
            <p><strong>Correo electrónico:</strong> {{ $inscripcion->email }}</p>
        </div><br>

        <!-- Datos Profesionales -->
        <div class="section">
            <div class="section text-center">
                <h3>II. DATOS PROFESIONALES</h3>
            </div>
            <p><strong>Universidad donde se graduó:</strong> {{ $inscripcion->universidad }}</p>
            <p><strong>Fecha de graduación:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_graduacion)->format('Y') }}</p>
            <p><strong>Nombre de la empresa donde labora actualmente:</strong> {{ $inscripcion->nombre_empresa_trabajo_actual }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo }}</p>
            <p><strong>Dirección de la empresa:</strong> {{ $inscripcion->direccion_empresa }}</p>
            <p><strong>Correo de la empresa:</strong> {{ $inscripcion->correo_empresa }}</p>
            <p><strong>Teléfono de la empresa:</strong> {{ $inscripcion->telefono_empresa }}</p>
            <p><strong>Extensión teléfonica de la empresa:</strong> {{ $inscripcion->extension_telefono_empresa }}</p>
        </div><br>

        <!-- Información Adicional -->
        <div class="section">
            <div class="section text-center">
                <h4>III. INFORMACIÓN ADICIONAL</h4>
            </div>
            <p><strong>Especialidad 1:</strong> {{ $inscripcion->especialidad_1 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_1 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_1)->format('Y') }}</p><br>
            
            <p><strong>Especialidad 2:</strong> {{ $inscripcion->especialidad_2 }}</p>
            <p><strong>Lugar de la especialidad:</strong> {{ $inscripcion->lugar_especialidad_2 }}</p>
            <p><strong>Fecha de la especialidad:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_especialidad_2)->format('Y') }}</p>
        </div><br>

        <!-- Cursos de Especialización -->
        <div class="section">
            <div class="section text-center">
                <h4>IV. CURSOS DE ESPECIALIZACIÓN</h4>
            </div>
            <p><strong>Nombre del curso de especialización:</strong> {{ $inscripcion->nombre_curso_especializacion }}</p>
            <p><strong>Lugar del curso:</strong> {{ $inscripcion->lugar_curso }}</p>
            <p><strong>Fecha del curso:</strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_curso)->format('Y') }}</p>
        </div><br>

        <!-- Experiencia Profesional -->
        <div class="section">
            <div class="section text-center">
                <h4>V. EXPERIENCIA PROFESIONAL</h4>
            </div>
            <p><strong>Nombre de la empresa 1:</strong> {{ $inscripcion->nombre_empresa1 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa1 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa1 }}</p><br>

            <p><strong>Nombre de la empresa 2:</strong> {{ $inscripcion->nombre_empresa2 }}</p>
            <p><strong>Cargo:</strong> {{ $inscripcion->cargo_empresa2 }}</p>
            <p><strong>Duración:</strong> {{ $inscripcion->duración_empresa2 }}</p>
        </div><br>

        <!-- Misiones Desempeñadas -->
        <div class="section">
            <div class="section text-center">
                <h4>VI. MISIONES DESEMPEÑADAS</h4>
            </div>
            <p><strong>Comisiones:</strong> {{ $inscripcion->comisiones }}</p>
            <p><strong>Representaciones:</strong> {{ $inscripcion->representaciones }}</p>
            <p><strong>Delegaciones:</strong> {{ $inscripcion->delegaciones }}</p>
        </div><br>

        <!-- Otros -->
        <div class="section">
            <div class="section text-center">
                <h4>VII. OTROS</h4>
            </div>
            <p><strong>Publicación de documentos:</strong> {{ $inscripcion->publicacion_documentos }}</p>
            <p><strong>Publicaciones:</strong> {{ $inscripcion->publicaciones }}</p>
            <p><strong>Publicación de libro:</strong> {{ $inscripcion->publicacion_libro }}</p>
        </div>

        <!-- Imágenes del título universitario -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS DEL TÍTULO UNIVERSITARIO</h4>
                @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(!empty($imagenes))
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 94%; object-fit: contain;">
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
                    <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
            </div>
        </div>

        <!-- Imágenes del dni -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS DEL DNI</h4><br><br>
                @if($inscripcion->imagen_dni)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
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
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes tamaño carnet -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS TAMAÑO CARNET</h4><br><br>
                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto tamaño carnet 1" class="img-fluid" style="width: 50%; height: auto; object-fit: contain; margin-bottom: 60px;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif

                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(count($imagenes) > 1)
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto tamaño carnet 2" class="img-fluid" style="width: 50%; height: auto; object-fit: contain;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 1 -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS DEL DNI DEL BENEFICIARIO 1</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario1)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario1);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 1 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
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
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 1 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 2 -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS DEL DNI DEL BENEFICIARIO 2</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario2)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario2);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 2 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
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
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 2 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes beneficiario 3 -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTOS DEL DNI DEL BENEFICIARIO 3</h4><br><br>
                @if($inscripcion->imagen_dni_beneficiario3)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_dni_beneficiario3);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del DNI del beneficiario 3 Frontal" class="img-fluid" style="width: 80%; height: auto; object-fit: contain; margin-bottom: 80px;">
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
                        <img src="{{ public_path('storage/' . $imagenes[1]) }}" alt="Foto del DNI del beneficiario 3 Reverso" class="img-fluid" style="width: 80%; height: auto; object-fit: contain;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>

        <!-- Imágenes del rtn -->
        <div class="page-break">
            <div class="section text-center">
                <h4>FOTO DEL RTN</h4><br><br>
                @if($inscripcion->imagen_rtn)
                    @php
                        $imagenes = json_decode($inscripcion->imagen_rtn);
                    @endphp
                    @if(!empty($imagenes))
                        <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Foto del RTN Frontal" class="img-fluid" style="width: 100%; height: auto; object-fit: contain; margin-bottom: 80px;">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif

                <h4>CURRICULUM VITAE</h4><br><br>
                @if($inscripcion->cv)
                    <iframe src="{{ asset('storage/' . $inscripcion->cv) }}" 
                        style="width: 100%; height: 100%; border: none;" frameborder="0">
                        Para ver el Curriculum Vitae, haz clic en el enlace y luego podrás descargarlo: <a href="{{ asset('storage/' . $inscripcion->cv) }}"><br><br>Ver curriculun vitae</a>
                    </iframe>
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>


        <!-- Autorización -->
        <div class="page-break"><br><br>
            <div class="section text-center">
                <h4 style="text-decoration: underline;">AUTORIZACIÓN</h4>
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

            </div><br>

            <div class="section text-center">
                <!-- Firma -->
                <p><strong></strong> ________________________________________</p>
                <p><strong></strong> Firma del solicitante</p><br>
                <p><strong></strong> {{ \Carbon\Carbon::now()->format('d') }} de {{ \Carbon\Carbon::now()->translatedFormat('F') }} del {{ \Carbon\Carbon::now()->format('Y') }}</p>
            </div>
        </div>


    </div>

</body>
</html>
