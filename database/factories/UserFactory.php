<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'rg'=> $faker->randomNumber(),
        'cpf' => $faker->randomNumber(),
        'telefone' => $faker->phoneNumber,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
