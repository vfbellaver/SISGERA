<?php

namespace Sisgera;

use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasDefender;


    protected $fillable = [
        'name',
        'email',
        'rg',
        'cpf',
        'telefone',
        'email',
        'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
