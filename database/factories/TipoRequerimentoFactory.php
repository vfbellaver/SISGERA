<?php

use Faker\Generator as Faker;
use Sisgera\Models\TipoRequerimento;


$factory->define(TipoRequerimento::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
