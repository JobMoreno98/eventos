<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmacionAsistenciaMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Confirmacion Asistencia Mailable');
    }

    /**
     * Get the message content definition.
     */
    /**
     * Obtener la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.confirmacion-asistencia'
        );
    }

    /**
     * Construir el mensaje.
     */
    public function build()
    {
        // Aquí usamos 'with' para pasar los datos a la vista
        return $this->markdown('emails.confirmacion-asistencia')
                    ->subject('Confirmación de asistencia')
                    ->with('data', $this->data); // Pasamos los datos aquí
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
