<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class TiposSolicitacao extends Model
{
    protected $fillable = [
        'name',
    ];

    protected $table = 'tipos_solicitacao';

    public function requerimentos(){
        return $this->belongsToMany(Requerimento::class);
    }
}
