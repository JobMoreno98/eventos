<?php

namespace App\Http\Controllers;

use App\Models\Destinatarios;
use Illuminate\Http\Request;

class DestinatariosController extends Controller
{
    public function index()
    {
        $destinatarios = Destinatarios::all();
        return view('destinatarios.index', compact('destinatarios'));
    }
}
