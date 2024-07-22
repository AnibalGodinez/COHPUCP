<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class MyResetPassword extends Notification
{
    use Queueable;

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

     public function toMail($notifiable)
     {
         $url = url(config('password.request').route('password.reset', $this->token, false));
     
         return (new MailMessage)
             ->subject(Lang::get('Restablecimiento de contraseña'))
             ->greeting('Hola, ' . $notifiable->name . ' ' . $notifiable->apellido . '.')
             ->line(Lang::get('Estás recibiendo este correo electrónico porque recibimos una solicitud de restablecimiento de contraseña para tu cuenta.'))
             ->action(Lang::get('Restablecer contraseña'), $url)
             ->line(Lang::get('Este enlace de restablecimiento de contraseña expirará en :count minutos.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
             ->line(Lang::get('Si no solicitaste un restablecimiento de contraseña, ignora este correo.'))
             ->salutation('Saludos, '.config('app.name'));
     }

}
