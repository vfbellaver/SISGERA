<?php

use Faker\Generator as Faker;
use Sisgera\Models\TiposSolicitacao;


$factory->define(TiposSolicitacao::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
