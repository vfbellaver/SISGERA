<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;

class TipoRequerimento extends Model
{
    protected $fillable = [
        'name',
    ];

    public function requerimentos(){
        return $this->belongsToMany(Requerimento::class);
    }
}
