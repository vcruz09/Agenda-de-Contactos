<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\DatabaseMessage;

class EventoRecordatorio extends Notification
{
    use Queueable;

    private $evento;

    public function __construct($evento)
    {
        $this->evento = $evento;
    }

    public function via($notifiable)
    {
        return ['database']; // Solo guardaremos en la base de datos
    }

    public function toDatabase($notifiable)
{
    return [
        'titulo' => 'Recordatorio: ' . ($this->evento['titulo'] ?? 'Nuevo evento'),
        'mensaje' => 'Evento programado para ' . ($this->evento['fecha'] ?? now()->toDateString()),
        'fecha' => $this->evento['fecha'] ?? now()->toDateString(),
        'id' => $this->evento['id'] ?? null
    ];
}

}
