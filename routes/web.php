<?php

use App\Http\Controllers\DestinatariosController;
use App\Models\Destinatarios;
use Illuminate\Support\Facades\Route;

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
