<?php

use Faker\Generator as Faker;
use Sisgera\Models\User;


$factory->define(User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rg'=> $faker->randomNumber(7),
        'cpf' => $faker->randomNumber(7),
        'telefone' => $faker->phoneNumber,
        'celular' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
