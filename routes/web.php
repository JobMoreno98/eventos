<?php

use App\Http\Controllers\DestinatariosController;
use Illuminate\Support\Facades\Route;

use App\Mail\ConfirmacionAsistenciaMailable;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('destinatarios', DestinatariosController::class)->names('destinatarios');
    Route::get('/enviar-correos', [DestinatariosController::class, 'enviarCorreos'])->name('enviar.correos');
});

Route::post('/destinatarios-confirmacion/{correo}', [DestinatariosController::class, 'confirmacion'])->name('confirmar.asistencia');
Route::get('/verificacion-corracta', [DestinatariosController::class, 'verificacionCorrecta'])->name('verificacion.correcta');

Route::get('correo', function () {
    $data = ['nombre' => 'Job Moreno', 'correo' => 'jobmoreno98@gmail.com'];
    return view('emails.notificacion', compact('data'));
});


Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/eventos/public/livewire/update', $handle);
});



Route::get('/confirmar-asistencia/{correo}', [DestinatariosController::class, 'confirmarAsistencia'])->name('confirmar.asistencia');


Route::get('/preview-correo', function () {

    $path = asset('img/protesta.jpg');
    $imageData = base64_encode(file_get_contents($path));

    $data = [
        'nombre' => 'Carlos',
        'correo' => 'carlos@example.com',
        'base64Image' => $imageData
    ];

    return (new ConfirmacionAsistenciaMailable($data))->render();
});