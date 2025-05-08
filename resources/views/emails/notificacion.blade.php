<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Hola, {{ $data['nombre'] }}</title>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; background-color: #f8f9fa;">

    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: white;">
        <h1 style="color: #212529; text-align: center;">Hola, {{ $data['nombre'] }}</h1>

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="{{ asset('img/protesta.jpg') }}" alt="Imagen" style="max-width: 100%; height: auto;">
        </div>

        <form action="{{ route('confirmar.asistencia', $data['correo']) }}" method="POST" style="text-align: center;">
            @csrf
            @method('post')

            <div style="margin: 20px 0;">
                <label style="margin-right: 10px;">
                    <input type="radio" name="asistencia" value="1">
                    <span style="display: inline-block; padding: 10px 20px; border: 1px solid #198754; color: #198754; border-radius: 4px; text-decoration: none;">
                        Asistiré
                    </span>
                </label>

                <label>
                    <input type="radio" name="asistencia" value="0">
                    <span style="display: inline-block; padding: 10px 20px; border: 1px solid #dc3545; color: #dc3545; border-radius: 4px; text-decoration: none;">
                        No asistiré
                    </span>
                </label>
            </div>

            <button type="submit" style="padding: 10px 20px; background-color: #198754; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Enviar
            </button>
        </form>
    </div>

</body>
</html>
