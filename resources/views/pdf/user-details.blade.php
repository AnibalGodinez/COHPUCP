<!DOCTYPE html>
<html>
<head>
    <title>Detalles del usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('white/img/watermark.png');
            background-repeat: no-repeat;
            background-size: 150%; /* Ajusta el tamaño de la imagen para cubrir el área del fondo */
            background-attachment: fixed; /* Fija la imagen de fondo al viewport */
            background-position: center center; /* Centra la imagen de fondo */
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.74); /* Color de fondo blanco con opacidad para mejor legibilidad */
            border-radius: 10px; /* Opcional: redondea las esquinas del contenedor */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Opcional: agrega sombra al contenedor */
        }
        .section {
            margin-bottom: 20px;
            margin-inline-end: 50%
        }
        .section strong {
            display: block;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Información de {{ $user->name }} {{ $user->apellido }}</h1>

        <div class="section">
            <strong>Primer Nombre:</strong>
            <p>{{ $user->name }}</p>
        </div>
        
        <div class="section">
            <strong>Segundo Nombre:</strong>
            <p>{{ $user->name2 }}</p>
        </div>

        <div class="section">
            <strong>Primer Apellido:</strong>
            <p>{{ $user->apellido }}</p>
        </div>

        <div class="section">
            <strong>Segundo Apellido:</strong>
            <p>{{ $user->apellido2 }}</p>
        </div>

        <div class="section">
            <strong>DNI:</strong>
            <p>{{ $user->numero_identidad }}</p>
        </div>

        <div class="section">
            <strong>Nº de Colegiación:</strong>
            <p>{{ $user->numero_colegiacion }}</p>
        </div>

        <div class="section">
            <strong>RTN:</strong>
            <p>{{ $user->rtn }}</p>
        </div>

        <div class="section">
            <strong>Sexo:</strong>
            <p>{{ $user->sexo }}</p>
        </div>

        <div class="section">
            <strong>Fecha de Nacimiento:</strong>
            <p>{{ $user->fecha_nacimiento }}</p>
        </div>

        <div class="section">
            <strong>Edad:</strong>
            <p>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años</p>
        </div>

        <div class="section">
            <strong>País:</strong>
            <p>{{ $user->pais->nombre ?? 'No disponible' }}</p>
        </div>

        <div class="section">
            <strong>Teléfono Fijo:</strong>
            <p>{{ $user->telefono ? ($user->pais ? $user->pais->codigo . ' ' . $user->telefono : $user->telefono) : 'No disponible' }}</p>
        </div>

        <div class="section">
            <strong>Celular:</strong>
            <p>{{ $user->telefono_celular ? ($user->pais ? $user->pais->codigo . ' ' . $user->telefono_celular : $user->telefono_celular) : 'No disponible' }}</p>
        </div>

        <div class="section">
            <strong>Correo Electrónico:</strong>
            <p>{{ $user->email }}</p>
        </div>

    </div>
</body>
</html>
