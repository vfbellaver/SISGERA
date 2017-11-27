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
    const CEREL = 'cerel';
    const ALUNO = 'aluno';
    const CIVIL = 'civil';

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
        'conta_id',
        'password',
    ];

    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token', 'cadastro_token',
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
        return $this->hasMany(Requerimento::class,'id','id');
    }

    public function historicoRequerimento()
    {
        return $this->hasMany(HistoricoRequerimento::class);
    }

    public function conta()
    {
        return $this->hasOne(Conta::class,'id','conta_id');
    }


    public function toArray()
    {
        $role = [];

        if ($this->role) {

            $role = [

                'id' => $this->role->id,
                'name' => $this->role->name,

            ];

            return [

                'id' => (int)$this->id,
                'name' => $this->name,
                'email' => $this->email,
                'rg' => $this->rg,
                'org_emissor' => $this->org_emissor,
                'cpf' => $this->cpf,
                'telefone' => $this->telefone,
                'celular' => $this->celular,
                'status' => $this->status,
                'role' => $role,
                'roles' => $this->roles->pluck('name')->all(),
                'conta' => $this->conta ? $this->conta->toArray() : null,

            ];

        }
    }

}
