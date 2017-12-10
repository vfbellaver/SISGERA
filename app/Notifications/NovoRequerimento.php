<?php

namespace Sisgera\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Sisgera\Models\Requerimento;
use Sisgera\Models\User;

class NovoRequerimento extends Notification
{
    use Queueable;

    public $requerimento;
    public $user;
    public $historico;

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
            ->subject("Novo Requerimento no {$appName}!")
            ->greeting("Olá {$this->user->name}!")
            ->line("Seu Requerimento foi registrado no Sisgera!")
            ->line("Protocolo: {$this->requerimento->protocolo}")
            ->action('Acesse o Sisgera', url($appRoute))
            ->line('Em breve seu requerimento será recebido e tomada as providências')
            ->line('Obrigado por usar o Sisgera!');
    }


    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
