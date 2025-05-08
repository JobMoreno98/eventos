<?php

namespace App\Jobs;

use App\Mail\ConfirmacionAsistenciaMailable;
use App\Mail\envioCorreos;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Mail\NotificacionMasivaMail;
use Illuminate\Support\Facades\Mail;


class EnviarCorreoMasivoJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public $email, public $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ConfirmacionAsistenciaMailable($this->data));
    }
}
