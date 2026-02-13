<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Destinatarios extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected function asistencia(): Attribute
    {
        $status = ['Sin respuesta', 'Asistencia', 'No asistencia'];
        return Attribute::make(get: fn() => ucfirst($status[$this->aceptado]));
    }
}
