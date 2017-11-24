<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Requerimento extends Model
{
    use SoftDeletes;

    const ENVIADO = 'Enviado';
    const ANDAMENTO = 'Em andamento';
    const DEFERIDO = 'Deferido';
    const INDEFERIDO = 'Indeferido';

    protected $fillable = [
        'data_criacao',
        'data_fechamento',
        'protocolo',
        'tipo_solicitacao',
        'justificativa',
        'resposta',
        'user_id',
        ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function TipoRequerimento()
    {
        return $this->belongsToMany(TipoRequerimento::class);
    }

}
