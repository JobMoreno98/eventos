<?php

namespace App\Http\Controllers;

use App\Models\Destinatarios;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $destinatarios = Destinatarios::all()->groupBy('asistencia');
        $conteoPorAsistencia = $destinatarios->map(function ($grupo) {
            return $grupo->count();
        });
        return view('dashboard', compact('conteoPorAsistencia'));
    }
}
