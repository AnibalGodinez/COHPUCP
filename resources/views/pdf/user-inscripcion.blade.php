<!DOCTYPE html>
<html>
<head>
    <title>Solicitud de Inscripción</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .details {
            margin-bottom: 20px;
        }
        .details div {
            margin-bottom: 10px;
        }
        .details strong {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Solicitud de Inscripción</h1>
        </div>
        <div class="details">
            <div><strong>ID:</strong> {{ $inscripcion->id ?? 'No disponible' }}</div>
            <div><strong>Primer Nombre:</strong> {{ $inscripcion->name ?? 'No disponible' }}</div>
            <div><strong>Segundo Nombre:</strong> {{ $inscripcion->name2 ?? 'No disponible' }}</div>
            <div><strong>Primer Apellido:</strong> {{ $inscripcion->apellido ?? 'No disponible' }}</div>
            <div><strong>Segundo Apellido:</strong> {{ $inscripcion->apellido2 ?? 'No disponible' }}</div>
            <div><strong>Correo Electrónico:</strong> {{ $inscripcion->imagen_titulo ?? 'No disponible' }}</div>
        </div>
    </div>
</body>
</html>
