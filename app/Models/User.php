<?php

namespace Sisgera\Models;

use Artesaos\Defender\Role;
use Artesaos\Defender\Traits\HasDefender;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
   use Notifiable, HasDefender;
   use SoftDeletes;

    const ADMIN = 'admin';
    const COORDENADOR = 'coordenador';
    const ALUNO = 'aluno';

    protected $fillable = [
        'name',
        'email',
        'rg',
        'org_emissor',
        'cpf',
        'telefone',
        'celular',
        'status',
        'email',
        'password',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token','cadastro_token',
    ];

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function requerimentos()
    {
        return $this->belongsToMany(Requerimento::class);
    }

    public function historicoRequerimento()
    {
        return $this->hasMany(HistoricoRequerimento::class);
    }

}
