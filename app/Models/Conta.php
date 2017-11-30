<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class Conta extends Model
{

    protected $fillable = [
        'name',
        'funcao',
        'status',
    ];

    public function requerimentos()
    {
        return $this->hasMany(Requerimento::class,'conta_id','id');
    }

    public function toArray()
    {
        return [

            'id' => (int)$this->id,
            'name' => $this->name,
            'funcao' => $this->funcao,
            'status' => $this->status,
        ];
    }
}
