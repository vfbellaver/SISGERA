<?php

namespace Sisgera;

use Artesaos\Defender\Role;
use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable, HasDefender;

    const ADMIN = 'admin';
    const COORDENADOR = 'coordenador';
    const ALUNO = 'aluno';

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

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

}
