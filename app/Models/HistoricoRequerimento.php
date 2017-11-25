<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoRequerimento extends Model
{
    protected $fillable = [
        'movimentacao',
        'usuario_id',
        'requerimento_id',
        'data_movimentacao',
    ];

    protected $table = 'historico_requerimento';

    protected $dates = [
        'data_movimentacao',
    ];

    public function requerimento()
    {
        return $this->belongsTo(Requerimento::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
