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

        EnviarCorreoMasivoJob::dispatch('jobmoreno98@gmail.com', ['nombre' => 'Job Moreno', 'correo' => 'jobmoreno98@gmail.com'])->delay(now()->addSeconds(2));
        return redirect()->route('destinatarios.index');
    }
    public function confirmacion(Request $request, $correo)
    {
        $user = Destinatarios::where('correo', $correo)->first();
        if (!$user) {
            return response()->json(['message' => 'Not Found'], 404);
        }
        $user->aceptado = 1;
        $user->update();
        return $request;
        return redirect()->route('verificacion.correcta');
    }
    public function verificacionCorrecta()
    {
        return view('veificacionCorrecta');
    }
}
