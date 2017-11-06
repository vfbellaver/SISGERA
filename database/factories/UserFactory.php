<?php

use Faker\Generator as Faker;


$factory->define(Sisgera\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rg'=> $faker->randomNumber(7),
        'cpf' => $faker->randomNumber(7),
        'telefone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
