<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de Asistencia</title>
    <style>
        /* Definir estilos comunes para la vista */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            width: 100%;
        }
        .email-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
        }
        .email-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .email-content {
            margin-bottom: 20px;
        }
        .image-container {
            text-align: center;
            margin-top: 20px;
        }
        .button-container {
            text-align: center;
            margin-top: 30px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
        }
        .button-danger {
            background-color: #f44336;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div class="email-container">
        <div class="email-header">
            <h1>Hola {{ $data['nombre'] }}</h1>
        </div>

        <div class="image-container">
            <img src="https://sige.cucsh.udg.mx/protesta.jpg" alt="imagen">
        </div>

        <div class="email-content">
            <p style="text-align: center;">
                Por favor, confirma si asistirás al evento. Haz clic en uno de los botones a continuación para registrar tu respuesta.
            </p>
        </div>

        <div class="button-container">
            <a href="{{ route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '1']) }}" class="button">
                Confirmar Asistencia
            </a>
            <a href="{{ route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '0']) }}" class="button button-danger">
                No Asistiré
            </a>
        </div>

        <div class="footer">
            <p>Gracias,<br>
            **El equipo de {{ config('app.name') }}**
            </p>
        </div>
    </div>

</body>
</html>
