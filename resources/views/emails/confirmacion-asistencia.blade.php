@component('mail::message')
<h1 style="color: #4CAF50; font-size: 24px; text-align: center;">
    Hola, {{ $data['nombre'] }}
</h1>

<img src="data:image/jpeg;base64,{{ $data['base64Image'] }}" alt="Imagen del evento" style="max-width: 100%; height: auto;"/>


<p style="text-align: center;">
    Por favor, confirma si asistirás al evento. Haz clic en uno de los botones a continuación para registrar tu respuesta.
</p>

@component('mail::button', ['url' => route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '1'])])
    <div style="background-color: #28a745; padding: 10px 20px; color: white; border-radius: 5px; text-align: center;">
        Confirmar Asistencia
    </div>
@endcomponent

@component('mail::button', ['url' => route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '0'])])
    <div style="background-color: #dc3545; padding: 10px 20px; color: white; border-radius: 5px; text-align: center;">
        No Asistiré
    </div>
@endcomponent

<p style="text-align: center;">
    Gracias,<br>
    **El equipo de {{ config('app.name') }}**
</p>
@endcomponent
