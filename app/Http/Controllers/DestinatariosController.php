<?php

namespace App\Http\Controllers;

use App\Jobs\EnviarCorreoMasivoJob;
use App\Models\Destinatarios;
use Illuminate\Http\Request;

class DestinatariosController extends Controller
{
    public function index()
    {
        $destinatarios = Destinatarios::all();
        return view('destinatarios.index', compact('destinatarios'));
    }
    public function enviarCorreos()
    {
        //$destinatarios = Destinatarios::where('aceptado', 0)->get();
        $path = asset('img/protesta.jpg');
        $imageData = base64_encode(file_get_contents($path));
    
        EnviarCorreoMasivoJob::dispatch('jobmoreno98@gmail.com', ['nombre' => 'Job Moreno', 'correo' => 'jobmoreno98@gmail.com','base64Image' => $imageData])->delay(now()->addSeconds(2));
        return redirect()->route('destinatarios.index');
    }
    public function confirmarAsistencia(Request $request, $correo)
    {

        $usuario = Destinatarios::where('correo', $correo)->firstOrFail();
        $asistencia = $request->query('asistencia'); // 1 o 0
        if (!$usuario) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        // Lógica para procesar la asistencia
        if ($asistencia == 1) {
            // Confirmación de asistencia
            $usuario->aceptado = 1;
        } else {
            // No asistirá
            $usuario->aceptado = 2;
        }
        $usuario->update();
        return redirect()->route('verificacion.correcta');
    }
    public function verificacionCorrecta()
    {
        return view('veificacionCorrecta');
    }
}
