<?php

use Carbon\Carbon;
use Sisgera\Models\Requerimento;

function gerar_protocolo()
{
    $numero = Requerimento::all()->count();

    $data = 'IFCX'.Carbon::now()->year.'-'.$numero;
    return $data;

}