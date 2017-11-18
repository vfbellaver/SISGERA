<?php

namespace Sisgera;

use Artesaos\Defender\Role;
use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable, HasDefender;
    use SoftDeletes;

    const ADMIN = 'usuario';
    const COORDENADOR = 'coordenador';
    const ALUNO = 'aluno';

    protected $fillable = [
        'name',
        'email',
        'rg',
        'cpf',
        'telefone',
        'celular',
        'email',
        'password',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

}
