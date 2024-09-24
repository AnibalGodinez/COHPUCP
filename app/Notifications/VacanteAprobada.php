<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class VacanteAprobada extends Notification
{
    use Queueable;

    protected $vacante;

    public function __construct($vacante)
    {
        $this->vacante = $vacante;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('¡Tu vacante ha sido publicada exitosamente! 🎉')
            ->greeting('¡Hola ' . $notifiable->name . '!')
            ->line('Nos complace informarte que la vacante de **' . $this->vacante->nombre_vacante . '** en **' . $this->vacante->nombre_empresa . '** ha sido publicada en nuestra plataforma.')
            ->action('Ver Vacante', route('vacantes.ver', $this->vacante->id))
            ->line('¡Gracias por confiar en nuestra plataforma para publicitar tu vacante!')
            ->salutation('Saludos, COHPUCP.');
    }

    public function toArray($notifiable)
    {
        return [
            'vacante_id' => $this->vacante->id,
            'nombre_vacante' => $this->vacante->nombre_vacante,
        ];
    }
}
