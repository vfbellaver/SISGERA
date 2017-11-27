<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{
    protected $fillable = [
        'nome',
        'funcao',
        'status',
    ];

    public function usuarios()
    {
        $this->hasMany(User::class);
    }

    public function toArray()
    {
        return [

            'id' => (int)$this->id,
            'nome' => $this->name,
            'funcao' => $this->funcao,
            'usuarios' => $this->usuarios->toArray()
        ];
    }
}
