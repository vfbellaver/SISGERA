<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use Sisgera\Models\HistoricoRequerimento;
use Sisgera\Models\Requerimento;


$factory->define(HistoricoRequerimento::class, function (Faker $faker) {

    $status = ['Enviado','Em andamento','Deferido','Indeferido'];

    return [
        'data_movimentacao' => $faker->dateTimeInInterval('-2 month','now'),
        'movimentacao'=> 'data_movimentacao' == Carbon::now() ? Requerimento::ENVIADO : $status[rand(1, 3)],
    ];
});
