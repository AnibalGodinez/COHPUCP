<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Inscripción</title>
    <style>
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header-container my-2">
            <div class="text-center">
                <h3>COLEGIO HONDUREÑO DE PROFESIONALES
                    UNIVERSITARIOS EN CONTADURÍA PÚBLICA (COHPUCP)</h3>
            </div>
            <div class="photo-frame">
                @if($inscripcion->imagen_tamano_carnet)
                    @php
                        $imagenCarnet = json_decode($inscripcion->imagen_tamano_carnet);
                    @endphp
                    @if(count($imagenCarnet) > 0)
                        <img src="{{ public_path('storage/' . $imagenCarnet[0]) }}" alt="Foto Carnet">
                    @else
                        <p>No Disponible</p>
                    @endif
                @else
                    <p>No Disponible</p>
                @endif
            </div>
        </div>
        
        <div class="row">
            <div class="my-2">
                <p>Yo <strong>{{ $inscripcion->name }} {{ $inscripcion->name2 }}  {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</strong>, licenciado(a) en Contaduría Pública por este medio solicito al Colegio Hondureño de
                    Profesionales Universitarios en Contaduría Pública (COHPUCP) ser inscrito como miembro de este Colegio y me
                    comprometo al estricto cumplimiento de lo establecido en la Ley Orgánica, contenida en el Decreto 19-93
                    publicado en el Diario Oficial la Gaceta número 27043 de fecha 16 de mayo de 1993, para tal efecto proporcionaré la
                    siguiente información.</p>
            </div>

            <div class="text-center my-2">
                <h4>I. DATOS PERSONALES</h4>
            </div>

            {{-- I. Datos Personales --}}
            <div class="col-md-12 mb-12">
                <div>
                    <div class="col-md-12">
                        <p><strong><strong>Nombre completo:</strong></strong> {{ $inscripcion->name }} {{ $inscripcion->name2 }} {{ $inscripcion->apellido }} {{ $inscripcion->apellido2 }}</p>
                        <p><strong><strong>Numero de identidad:</strong></strong> {{ $inscripcion->numero_identidad }}</p>
                        <p><strong><strong>Lugar de nacimiento:</strong></strong> {{ $inscripcion->direccion_residencia }}</p>
                        <p><strong><strong>Fecha de nacimiento:</strong></strong> {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('d') }} de {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($inscripcion->fecha_nacimiento)->format('Y') }}</p>
                        <p><strong><strong>Dirección de residencia:</strong></strong> {{ $inscripcion->lugar_nacimiento }}</p>
                        <p><strong><strong>Teléfono fijo:</strong></strong> {{ $inscripcion->telefono }}</p>
                        <p><strong><strong>Celular:</strong></strong> {{ $inscripcion->telefono_celular }}</p>
                        <p><strong><strong>Correo electrónico</strong></strong> {{ $inscripcion->email }}</p>
                    </div> 
                </div>
            </div>
        </div>

        <div class=" text-center mt-4">
            <strong>Imagen del título</strong>
            @if($inscripcion->imagen_titulo)
                @php
                    $imagenes = json_decode($inscripcion->imagen_titulo);
                @endphp
                @if(count($imagenes) > 0)
                    <img src="{{ public_path('storage/' . $imagenes[0]) }}" alt="Título Universitario Frontal" 
                        class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                @else
                    <p>No Disponible</p>
                @endif
            @else
                <p>No Disponible</p>
            @endif
        </div>

    </div>
</body>
</html>
