<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class RegisteredUserNotification extends Notification
{
    use Queueable;

    private string $username;
    private string $user_role;
    private string $password;

    public function __construct(string $user, string $password)
    {
        $this->username = $user;
        
        $this->password = $password;
    }

    public function via()
    {
        return ['mail'];
    }

    public function toMail()
    {
        $login_url = url('/login');
        return (new MailMessage)
            ->subject('Usuario registrado exitosamente en EPN-TECH')
            ->line('Hola' . " $this->username")
            //->line('Tu has sido registrado en el sistema con el rol de ' . " $this->user_role")
            ->line('Has sido registrado en el sistema para realizar la gestión de contratos')
            ->line('La contraseña que ha sido generada para que puedas ingresar el sistema es:' . " $this->password")
            ->line('Puedes iniciar sesión dando clic')
            ->action('Login', $login_url)
            ->line('Recuerda: cambia la contraseña cuando verifiques el email y acceso al sistema.');
    }

}