<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;


class Requerimento extends Model
{
    use Notifiable;
    use SoftDeletes;

    const ENVIADO = 'Enviado';
    const ANDAMENTO = 'Em andamento';
    const DEFERIDO = 'Deferido';
    const INDEFERIDO = 'Indeferido';

    protected $fillable = [
        'data_criacao',
        'data_fechamento',
        'protocolo',
        'nome_estudante',
        'curso',
        'turma',
        'periodo',
        'turno',
        'tipo_solicitacao',
        'justificativa',
        'resposta',
        'usuario_id',
        ];

    protected $dates = ['deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function TipoRequerimento()
    {
        return $this->belongsToMany(TiposSolicitacao::class);
    }

    public function historicos()
    {
        return $this->hasMany(HistoricoRequerimento::class);
    }

}
