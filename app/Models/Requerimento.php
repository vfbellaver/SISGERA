<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Requerimento extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'data_criacao',
        'protocolo',
        'tipo_solicitacao',
        'justificativa',
        'user_id',
        ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function tipo_requerimento(){
        return $this->belongsToMany(TipoRequerimento::class);
    }

}
