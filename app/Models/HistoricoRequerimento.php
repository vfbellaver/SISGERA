<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoRequerimento extends Model
{
    protected $fillable = [
        'movimentacao',
        'user_id',
        'requerimento_id',
        'data_movimentacao',
    ];

    protected $table = 'historico_requerimento';

    protected $dates = [
        'data_movimentacao',
    ];


    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function toArray()
    {
        return [

            'id' => (int)$this->id,
            'movimentacao' => $this->movimentacao,
            'data_movimentacao' => $this->data_movimentacao,
        ];
    }
}
