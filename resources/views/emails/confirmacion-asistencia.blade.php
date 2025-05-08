@component('mail::message')
# Hola, {{ $data['nombre'] }}


<img src="data:image/jpeg;base64,{{ $data['base64Image'] }}" alt="Imagen del evento" style="max-width: 100%; height: auto;"/>


Estamos organizando un evento y nos encantaría contar con tu presencia. Por favor, confirma si asistirás:

@component('mail::button', ['url' => route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '1'])])
Confirmar Asistencia
@endcomponent

@component('mail::button', ['url' => route('confirmar.asistencia', ['correo' => $data['correo'], 'asistencia' => '0'])])
No Asistiré
@endcomponent
Si no asistirás, puedes ignorar este correo o contactarnos directamente.

Gracias,<br>
**El equipo de {{ config('app.name') }}**
@endcomponent
