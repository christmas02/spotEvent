<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RegisteredUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
  
    public function __construct($name)
    {
        //
   
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->success()
                    ->subject('Confirmation d\'Inscription sur spoteventapp')
                    
                    ->line($notifiable->name.'! Nous avons bien pris en compte votre inscription sur Spot Event !
                    Pour la finaliser, il vous faudra cliquer sur le bouton “confirmer mon adresse email”.
                    Une fois cette action effectuée, les administrateurs de Spot Event pourront activer votre compte !
                    ')
                    ->action('Confirmer mon compte', url("/confirm/{$notifiable->id}/{$notifiable->confirmation_token}"))
                    ->line('Merci d\'utiliser notre plateforme');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
