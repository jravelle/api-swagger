<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nome' => $faker->firstName() . ' ' . $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'cpf' => rand(100, 999).'.'.rand(100, 999).'.'.rand(100, 999).'-'.rand(00, 99),
        'data_nascimento' => $faker->date(),
        'status' => $faker->boolean()
    ];
});
