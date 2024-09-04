<!DOCTYPE html>
<html>
<head>
    <title>Detalles del usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.74); /* Color de fondo blanco con opacidad para mejor legibilidad */
            border-radius: 10px; /* Opcional: redondea las esquinas del contenedor */
            box-shadow: 0 0 10px rgba(78, 73, 73, 0.1); /* Opcional: agrega sombra al contenedor */
        }
        .section {
            margin-bottom: 20px;
        }
        .section strong {
            display: block;
            margin-bottom: 5px;
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
            opacity: 0.2; /* Ajusta este valor para cambiar la transparencia */
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
        h2{
            text-align: center;
        }
        h4{
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>INFORMACIÓN DEL USUARIO</h2>
        <img src="white/img/logo-empresa.png" alt="Logo" style="margin-left: -20px; margin-top:-110px; width: 90px; height: auto;">
        <div class="section">
            <div class="section text-center">
                <h4 style="text-decoration: underline;">DATOS PERSONALES</h4>
            </div>
            
            <p><strong>Nombre completo:</strong>{{ $user->name }} {{ $user->name2 }} {{ $user->apellido }} {{ $user->apellido2 }}</p>
            <p><strong>Número de colegiación:</strong> {{ $user->numero_colegiacion }} </p>
            <p><strong>DNI:</strong>{{ $user->numero_identidad }}</p>
            <p><strong>RTN:</strong> {{ $user->rtn }} </p>
            <p><strong>Sexo:</strong>{{ $user->sexo->nombre ?? 'No disponible' }}</p>
            <p><strong>Fecha de nacimiento:</strong> {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('d') }} de {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->translatedFormat('F') }} del {{ \Carbon\Carbon::parse($user->fecha_nacimiento)->format('Y') }}</p>
            <p><strong>Edad:</strong>{{ \Carbon\Carbon::parse($user->fecha_nacimiento)->age }} años</p>
            <p><strong>País:</strong>{{ $user->pais->nombre ?? 'No disponible' }}</p>
            <p><strong>Teléfono Fijo:</strong>{{ $user->telefono ? ($user->pais ? $user->pais->codigo . ' ' . $user->telefono : $user->telefono) : 'No disponible' }}</p>
            <p><strong>Celular:</strong>{{ $user->telefono_celular ? ($user->pais ? $user->pais->codigo . ' ' . $user->telefono_celular : $user->telefono_celular) : 'No disponible' }}</p>
            <p><strong>Correo Electrónico:</strong>
                {{ $user->email }}</p>
        </div>
    </div>
</body>
</html>
