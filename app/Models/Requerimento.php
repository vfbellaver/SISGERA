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
        'situacao',
        'user_id',
    ];


    protected $dates = ['deleted_at'];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function TipoRequerimento()
    {
        return $this->belongsToMany(TiposSolicitacao::class);
    }

    public function historicos()
    {
        return $this->hasMany(HistoricoRequerimento::class,'requerimento_id','id');
    }

    public function toArray()
    {
        return [

            'id' => (int)$this->id,
            'data_criacao' => $this->data_criacao,
            'data_fechamento' => $this->data_fechamento,
            'protocolo' => $this->protocolo,
            'nome_estudante' => $this->nome_estudante,
            'curso' => $this->curso,
            'turma' => $this->turma,
            'periodo' => $this->periodo,
            'turno' => $this->turno,
            'solicitacoes' => $this->TipoRequerimento->toArray(),
            'justificativa' => $this->justificativa,
            'resposta' => $this->resposta,
            'situacao' => $this->situacao,
            'usuario' => $this->usuario->toArray(),
            'historico' => $this->historicos->toArray(),
            ];
    }
}
