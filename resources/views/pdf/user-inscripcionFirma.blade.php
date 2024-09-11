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
        .img-small {
            width: 150px; /* Ajusta el tamaño según tus necesidades */
            height: auto;
            object-fit: contain;
            display: block;
            margin: 0 auto; /* Centra la imagen */
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
        .socio-page-break {
            page-break-before: always;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado -->
        <div class="header-container">
            <div class="section text-center"><br>
                <h3>COLEGIO HONDUREÑO DE PROFESIONALES <br> UNIVERSITARIOS EN CONTADURÍA PÚBLICA <br> 
                    <span class="section text-center">(COHPUCP)</span>
                </h3>
            </div>                                         
        </div>

        <!-- Campo Número de Colegiación -->
        <div class="section">
            <p><strong>NÚMERO DE MEMBRESÍA:</strong></p>
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
            <p style="margin: 0;">La Sociedad <strong>{{ $inscripcionFirma->nombre_sociedad }}</strong>, 
                por este medio solicita al Colegio Hondureño de Profesionales Universitarios en Contaduría Publica ser
                inscrito como sociedad mercantil de ese colegio y se compromete al estricto cumplimiento de los
                establecido en la Ley Orgánica, contenida en el Decreto 19/93, publicado en el Diario Oficial La Gaceta
                número 27043 de la fecha 14 de mayo de 1993.</p>   
        </div>
 
        <img src="white/img/logo-empresa.png" alt="Logo" style="margin-left: -5px; margin-top:-340px; width: 90px; height: auto;">

        <!-- I. DATOS DE LA SOCIEDAD -->
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">I. DATOS DE LA SOCIEDAD</h4>
            </div>
            <p><strong>Nombre de la sociedad:</strong> {{ $inscripcionFirma->nombre_sociedad }}</p>
            <p><strong>Nº Inscripción Registro Público Comercio:</strong> {{ $inscripcionFirma->num_inscripcion_registro_publico_comercio }}</p>
            <p><strong>Fecha Constitución de la firma:</strong> {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcionFirma->fecha_constitucion)->format('Y') }}</p>
            <p><strong>Nº Registro Tributario Nacional:</strong> {{ $inscripcionFirma->registro_tributario_nacional }}</p>
            <p><strong>Nº Inscripción Cámara Comercio:</strong> {{ $inscripcionFirma->num_inscripcion_camara_comercio }}</p>
            <p><strong>Dirección de la firma:</strong> {{ $inscripcionFirma->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $inscripcionFirma->telefono }}</p>
            <p><strong>Celular:</strong> {{ $inscripcionFirma->celular }}</p>
            <p><strong>Correo electrónico:</strong> {{ $inscripcionFirma->email }}</p>
        </div>

        <!-- II. DATOS DE LOS SOCIOS -->

        <!-- SOCIO 1 -->
        <div class="section page-break">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">II. DATOS DE LOS SOCIOS</h4>
            </div>
            <br>
            <h5 class="text-center" style="text-decoration: underline;">SOCIO 1</h5>
            <p><strong>Nombre completo:</strong> {{ $inscripcionFirma->primer_nombre_socio1 }} {{ $inscripcionFirma->segundo_nombre_socio1 }} {{ $inscripcionFirma->primer_apellido_socio1 }} {{ $inscripcionFirma->segundo_apellido_socio1 }}</p>
            <p><strong>Número Colegiación:</strong> {{ $inscripcionFirma->num_colegiacion_socio1 }}</p>
            <br>

            @if($inscripcionFirma->imagen_firma_socio1)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_socio1) }}" alt="Firma Socio 1" class="img-small">
                </div>
            @endif

            <div class="section text-center" style="margin-top: -50px">
                <p>_________________________________</p>
                <p><strong>Firma</strong></p>
            </div>

            <!-- Imágenes del título universitario -->
            <div class="page-break">
                <div class="section text-center">
                    <h4 style="text-decoration: underline;">TÍTULO UNIVERSITARIO</h4>

                    @php
                        $imagenesTitulo = json_decode($inscripcionFirma->imagen_titulo_socio1);
                    @endphp

                    @if($imagenesTitulo && !empty($imagenesTitulo))
                        <img src="{{ public_path('storage/' . $imagenesTitulo[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 90%; object-fit: contain;">
                        
                        @if(count($imagenesTitulo) > 1)
                            <img src="{{ public_path('storage/' . $imagenesTitulo[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        @endif
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>

            <!-- Constancia de solvencia -->
            <div class="page-break">
                <div class="section text-center" style="page-break-inside: avoid;">
                    <h4 class="text-center" style="text-decoration: underline;">CONSTANCIA DE SOLVENCIA</h4>

                    @if($inscripcionFirma->constancia_solvencia_socio1)
                        <img src="{{ public_path('storage/' . $inscripcionFirma->constancia_solvencia_socio1) }}" 
                            alt="Constancia de solvencia" 
                            class="img-fluid" 
                            style="max-width: 100%; max-height: 90%; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>

        </div>


        <!-- SOCIO 2 -->
        <div class="section page-break">
            <h5 class="text-center" style="text-decoration: underline;">SOCIO 2</h5>
            <p><strong>Nombre completo:</strong> {{ $inscripcionFirma->primer_nombre_socio2 }} {{ $inscripcionFirma->segundo_nombre_socio2 }} {{ $inscripcionFirma->primer_apellido_socio2 }} {{ $inscripcionFirma->segundo_apellido_socio2 }}</p>
            <p><strong>Número Colegiación:</strong> {{ $inscripcionFirma->num_colegiacion_socio2 }}</p>
            <br>

            @if($inscripcionFirma->imagen_firma_socio2)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_socio2) }}" alt="Firma Socio 2" class="img-small">
                </div>
            @endif

            <div class="section text-center" style="margin-top: -50px">
                <p>_________________________________</p>
                <p><strong>Firma</strong></p>
            </div>

            <!-- Imágenes del título universitario -->
            <div class="page-break">
                <div class="section text-center">
                    <h4 style="text-decoration: underline;">TÍTULO UNIVERSITARIO</h4>

                    @php
                        $imagenesTitulo2 = json_decode($inscripcionFirma->imagen_titulo_socio2);
                    @endphp

                    @if($imagenesTitulo2 && !empty($imagenesTitulo2))
                        <img src="{{ public_path('storage/' . $imagenesTitulo2[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 90%; object-fit: contain;">
                        
                        @if(count($imagenesTitulo2) > 1)
                            <img src="{{ public_path('storage/' . $imagenesTitulo2[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        @endif
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>

            <!-- Constancia de solvencia -->
            <div class="page-break">
                <div class="section text-center" style="page-break-inside: avoid;">
                    <h4 class="text-center" style="text-decoration: underline;">CONSTANCIA DE SOLVENCIA</h4>

                    @if($inscripcionFirma->constancia_solvencia_socio2)
                        <img src="{{ public_path('storage/' . $inscripcionFirma->constancia_solvencia_socio2) }}" 
                            alt="Constancia de solvencia" 
                            class="img-fluid" 
                            style="max-width: 100%; max-height: 90%; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>
            
        </div>


        <!-- SOCIO 3 -->
        <div class="section page-break">
            <h5 class="text-center" style="text-decoration: underline;">SOCIO 3</h5>
            <p><strong>Nombre completo:</strong> {{ $inscripcionFirma->primer_nombre_socio3 }} {{ $inscripcionFirma->segundo_nombre_socio3 }} {{ $inscripcionFirma->primer_apellido_socio3 }} {{ $inscripcionFirma->segundo_apellido_socio3 }}</p>
            <p><strong>Número Colegiación:</strong> {{ $inscripcionFirma->num_colegiacion_socio3 }}</p>
            <br>

            @if($inscripcionFirma->imagen_firma_socio3)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_socio3) }}" alt="Firma Socio 3" class="img-small">
                </div>
            @endif

            <div class="section text-center" style="margin-top: -50px">
                <p>_________________________________</p>
                <p><strong>Firma</strong></p>
            </div>

            <!-- Imágenes del título universitario -->
            <div class="page-break">
                <div class="section text-center">
                    <h4 style="text-decoration: underline;">TÍTULO UNIVERSITARIO</h4>

                    @php
                        $imagenesTitulo3 = json_decode($inscripcionFirma->imagen_titulo_socio3);
                    @endphp

                    @if($imagenesTitulo3 && !empty($imagenesTitulo3))
                        <img src="{{ public_path('storage/' . $imagenesTitulo3[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 90%; object-fit: contain;">
                        
                        @if(count($imagenesTitulo3) > 1)
                            <img src="{{ public_path('storage/' . $imagenesTitulo3[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        @endif
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>

            <!-- Constancia de solvencia -->
            <div class="page-break">
                <div class="section text-center" style="page-break-inside: avoid;">
                    <h4 class="text-center" style="text-decoration: underline;">CONSTANCIA DE SOLVENCIA</h4>

                    @if($inscripcionFirma->constancia_solvencia_socio3)
                        <img src="{{ public_path('storage/' . $inscripcionFirma->constancia_solvencia_socio3) }}" 
                            alt="Constancia de solvencia" 
                            class="img-fluid" 
                            style="max-width: 100%; max-height: 90%; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>
            
        </div>


        <!-- SOCIO 4 -->
        <div class="section page-break">
            <h5 class="text-center" style="text-decoration: underline;">SOCIO 4</h5>
            <p><strong>Nombre completo:</strong> {{ $inscripcionFirma->primer_nombre_socio4 }} {{ $inscripcionFirma->segundo_nombre_socio4 }} {{ $inscripcionFirma->primer_apellido_socio4 }} {{ $inscripcionFirma->segundo_apellido_socio4 }}</p>
            <p><strong>Número Colegiación:</strong> {{ $inscripcionFirma->num_colegiacion_socio4 }}</p>
            <br>

            @if($inscripcionFirma->imagen_firma_socio4)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_socio4) }}" alt="Firma Socio 4" class="img-small">
                </div>
            @endif

            <div class="section text-center" style="margin-top: -50px">
                <p>_________________________________</p>
                <p><strong>Firma</strong></p>
            </div>

            <!-- Imágenes del título universitario -->
            <div class="page-break">
                <div class="section text-center">
                    <h4 style="text-decoration: underline;">TÍTULO UNIVERSITARIO</h4>

                    @php
                        $imagenesTitulo4 = json_decode($inscripcionFirma->imagen_titulo_socio4);
                    @endphp

                    @if($imagenesTitulo4 && !empty($imagenesTitulo4))
                        <img src="{{ public_path('storage/' . $imagenesTitulo4[0]) }}" alt="Foto del Título Universitario Frontal" class="img-fluid" style="width: 100%; height: 90%; object-fit: contain;">
                        
                        @if(count($imagenesTitulo4) > 1)
                            <img src="{{ public_path('storage/' . $imagenesTitulo4[1]) }}" alt="Foto del Título Universitario Reverso" class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        @endif
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>

            <!-- Constancia de solvencia -->
            <div class="page-break">
                <div class="section text-center" style="page-break-inside: avoid;">
                    <h4 class="text-center" style="text-decoration: underline;">CONSTANCIA DE SOLVENCIA</h4>

                    @if($inscripcionFirma->constancia_solvencia_socio4)
                        <img src="{{ public_path('storage/' . $inscripcionFirma->constancia_solvencia_socio4) }}" 
                            alt="Constancia de solvencia" 
                            class="img-fluid" 
                            style="max-width: 100%; max-height: 90%; object-fit: contain;">
                    @else
                        <p>No disponible</p>
                    @endif
                </div>
            </div>
            
        </div>


        <!-- Curriculun Vitae los socios -->
        <div class="section page-break">
            <h4 class="text-center" style="text-decoration: underline;">CURRICULUM VITAE DE LOS SOCIOS</h4><br>

            <!-- Link del socio 1 -->
            @if($inscripcionFirma->cv_socio1)
                <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio1) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                    1) Para ver el Curriculum Vitae del socio 1, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio1) }}"><br>ver cv del socio 1</a>
                </iframe>
            @else
                <p>No disponible</p>
            @endif

            <br><br><br><br>

            <!-- Link del socio 2 -->
            @if($inscripcionFirma->cv_socio2)
                <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio2) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                    2) Para ver el Curriculum Vitae del socio 2, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio2) }}"><br>ver cv del socio 2</a>
                </iframe>
            @else
                <p>No disponible</p>
            @endif

            <br><br><br><br>

            <!-- Link del socio 3 -->
            @if($inscripcionFirma->cv_socio3)
                <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio3) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                    3) Para ver el Curriculum Vitae del socio 3, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio3) }}"><br>ver cv del socio 3</a>
                </iframe>
            @else
                <p>No disponible</p>
            @endif

            <br><br><br><br>

            <!-- Link del socio 4 -->
            @if($inscripcionFirma->cv_socio4)
                <iframe src="{{ asset('storage/' . $inscripcionFirma->cv_socio4) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                    4) Para ver el Curriculum Vitae del socio 4, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcionFirma->cv_socio4) }}"><br>ver cv del socio 4</a>
                </iframe>
            @else
                <p>No disponible</p>
            @endif
        </div>


        <!-- Documentos -->

        <!-- ESCRITURA DE CONSTITUCIÓN -->
        <div class="section page-break">
            <h4 class="text-center" style="text-decoration: underline;">ESCRITURA DE CONSTITUCIÓN</h4>
            @if($inscripcionFirma->imagen_escritura_constitucion)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_escritura_constitucion) }}" alt="Escritura de constitución de la firma" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                </div>
            @else
                <span style="text-decoration: line-through;">No disponible</span>
            @endif
        </div>

        <!-- REGISTRO MERCANTIL -->
        <div class="section page-break">
            <h4 class="text-center"  style="text-decoration: underline; margin-bottom: 6em;">REGISTRO MERCANTIL</h4>
            @if($inscripcionFirma->imagen_registro_mercantil)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_registro_mercantil) }}" alt="Registro mercantil de la firma" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                </div>
            @else
                <span style="text-decoration: line-through;">No disponible</span>
            @endif
        </div>

        <!-- RTN DE LA FIRMA -->
        <div class="section page-break">
            <h4 class="text-center" style="text-decoration: underline; margin-bottom: 6em;">RTN DE LA FIRMA</h4>
            @if($inscripcionFirma->imagen_rtn_firma_auditora)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_rtn_firma_auditora) }}" alt="RTN de la firma" class="img-fluid" style="width: 100%; height: auto; object-fit: contain;">
                </div>
            @else
                <span style="text-decoration: line-through;">No disponible</span>
            @endif
        </div>

        <!-- PDF DE LA NÓMINA DE PAGO DE LA FIRMA -->
        <div class="section page-break">
            <h4 class="text-center" style="text-decoration: underline;">NÓMINA DE PAGO PROYECTADA DE LA FIRMA (PLANILLA)</h4><br>

            <!-- Link del socio 1 -->
            @if($inscripcionFirma->nomina_pago_firma)
                <iframe src="{{ asset('storage/' . $inscripcionFirma->nomina_pago_firma) }}" 
                    style="width: 100%; height: 100%; border: none;" frameborder="0">
                    1) Para ver la nómina de pago proyectada de la firma, haz clic en el enlace y luego podrás descargarlo. <a href="{{ asset('storage/' . $inscripcionFirma->nomina_pago_firma) }}"><br>ver nómina</a>
                </iframe>
            @else
                <span style="text-decoration: line-through;">No disponible</span>
            @endif
        </div>

        <div class="section page-break" style="margin-top: 70px">
            <!-- Firma social -->
            @if($inscripcionFirma->imagen_firma_social)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_social) }}" alt="Firma Social" class="img-small">
                </div>
            @endif
            <div class="section text-center" style="margin-top: -50px">
                <p><strong></strong> ______________________________________________________ </p>
                <p><strong></strong> Nombre del Representante Legal o Firma Social</p>
            </div><br><br>

            <!-- Firma del representante legal -->
            @if($inscripcionFirma->imagen_firma_representante_legal)
                <div class="text-center">
                    <img src="{{ public_path('storage/' . $inscripcionFirma->imagen_firma_representante_legal) }}" alt="Firma representante legal" class="img-small">
                </div>
            @endif
            <div class="section text-center" style="margin-top: -50px">
                <p><strong></strong> _________________________________ </p>
                <p><strong></strong> Firma del Representante Legal</p>
            </div><br><br>

            <div class="section text-center" style="margin-top: -50px">
                <p><strong></strong> _________________________________ </p>
                <p><strong></strong> Secretario(a) del Colegio</p>
            </div><br><br>

            <div class="section text-center">
                <!-- Fecha -->
                <p><strong></strong> {{ $inscripcionFirma->municipio_realiza_solicitud }}. {{ \Carbon\Carbon::now()->format('d') }} de {{ \Carbon\Carbon::now()->translatedFormat('F') }} del {{ \Carbon\Carbon::now()->format('Y') }}</p>
            </div>
        </div>

    </div>
</body>
</html>
