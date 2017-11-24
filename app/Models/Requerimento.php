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

    public function usuario()
    {
        return $this->hasOne(User::class,'id','usuario_id');
    }

    public function TipoRequerimento()
    {
        return $this->belongsToMany(TiposSolicitacao::class);
    }

    public function historico()
    {
        return $this->hasMany(HistoricoRequerimento::class);
    }

}
