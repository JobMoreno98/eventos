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
        $destinatarios = Destinatarios::where('aceptado', 0)->get();

        EnviarCorreoMasivoJob::dispatch('jobmoreno98@gmail.com', ['nombre' => 'Job Moreno']);
        return "termino";
    }
}
