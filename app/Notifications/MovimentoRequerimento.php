<?php

namespace Sisgera\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Sisgera\Models\HistoricoRequerimento;
use Sisgera\Models\Requerimento;
use Sisgera\Models\User;

class MovimentoRequerimento extends Notification
{
    use Queueable;

    public $requerimento;
    public $user;

    public function __construct(User $user, Requerimento $requerimento)
    {
        $this->user = $user;
        $this->requerimento = $requerimento;
    }


    public function via($notifiable)
    {
        return ['mail'];
    }


    public function toMail($notifiable)
    {
        $appName = config('app.name');
        $appRoute = route('login');
        return (new MailMessage)
                    ->subject("Movimentacão de requerimento no {$appName}!")
                    ->greeting("Olá {$this->user->name}!")
                    ->line("O requerimento de protocolo {$this->requerimento->protocolo} movimentou!")
                    ->action('Acesse o Sisgera', url($appRoute))
                    ->line('Obrigado por usar o Sisgera!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
