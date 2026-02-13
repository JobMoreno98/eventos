<?php

use App\Http\Controllers\DestinatariosController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Mail\ConfirmacionAsistenciaMailable;
use App\Models\Destinatarios;
use Illuminate\Support\Facades\Mail;
use Livewire\Livewire;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
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
        'nombre' => 'Job Moreno',
        'correo' => 'job.moreno@example.com',
        'base64Image' => $imageData,
    ];

    return (new ConfirmacionAsistenciaMailable($data))->render();
});


Route::get('/correos-no-enviados', function () {

    $destinatarios = Destinatarios::where('correo', 'like', '%;%')->get();

    foreach ($destinatarios as $key => $value) {
        $correos = explode(";", $value->correo);
        Destinatarios::create([
            'nombre' => $value->nombre,
            'correo' => $correos[1],
            'cargo' => $value->cargo
        ]);
        $value->correo = $correos[0];
        $value->enviado = 0;
        $value->update();
        //dd($value);
    }
    return "Se realizo de forma exitosa.";
    dd($destinatarios);
    /*

    $failedJobs = DB::table('failed_jobs')->get();

    foreach ($failedJobs as $job) {
        // Buscar todos los correos dentro del campo exception
        preg_match_all(
            '/[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}/',
            $job->exception,
            $matches
        );

        if (!empty($matches[0])) {
            echo "ID: {$job->id}\n";
            foreach ($matches[0] as $email) {
                echo " - Email: {$email}\n";
            }
            echo "\n<br/>" ;
        }
    }*/
});
