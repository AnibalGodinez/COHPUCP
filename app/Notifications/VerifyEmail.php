<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;
use Illuminate\Notifications\Messages\MailMessage;

class VerifyEmail extends VerifyEmailBase
{
    
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Verificación de correo electrónico')
            ->greeting('Hola, ' . $notifiable->name . ' ' . $notifiable->apellido . '.')
            ->line('¡Gracias por crear una cuenta en la Plataforma tecnológica del COHPUCP!')
            ->line('Por favor, haz clic en el botón de abajo para verificar tu dirección de correo electrónico.')
            ->action('Verificar dirección de correo electrónico', $this->verificationUrl($notifiable))
            ->line('Si no creaste una cuenta, no se requiere ninguna acción adicional.')
            ->salutation('Saludos, '.config('app.name'));
    }
}
