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
        return new Envelope(subject: 'Confirmacion Asistencia');
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
        $svgPath = public_path('img/protesta.jpg');

        if (!file_exists($svgPath)) {
            \Log::error("El archivo de imagen no se encuentra: " . $svgPath);
            return $this; // Si el archivo no existe, no continuar
        }
        $svgBase64 = base64_encode(file_get_contents($svgPath));
        // Crear la URL de la imagen en base64
        $imageDataUrl = 'data:image/jpeg;base64,' . $svgBase64;

        // Añadir la imagen a los datos
        $this->data['image'] = $imageDataUrl;

        // Usamos 'view()' para pasar los datos a la vista Blade
        $email = $this->view('emails.confirmacion-asistencia')
            ->subject('Confirmación de asistencia')
            ->with([
                'data' => $this->data
            ]);


        return $email;
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
