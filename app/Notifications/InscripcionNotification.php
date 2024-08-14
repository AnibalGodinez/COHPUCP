<?php

namespace App\Notifications;

use App\Models\Inscripcion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InscripcionNotification extends Notification
{
    use Queueable;

    public function __construct(Inscripcion $inscripcion)
    {
    $this->inscripcion = $inscripcion;
    }


    public function via($notifiable)
    {
        return ['database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [

            'fecha_inscripcion' => $this->inscripcion->primer_apellido,
            'user_id' => $this->inscripcion->user_id,
            'id' => $this->inscripcion->id,
            'name' => $this->inscripcion->user->name,
        ];
    }
}
