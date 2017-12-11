<?php

use Faker\Generator as Faker;

$factory->define(\App\Message::class, function (Faker $faker) {

    $langs = ['Español', 'Inglés', 'Alemán', 'Chino', 'Frances'];
    $branchs = ['Zavaleta', 'Diagonal', 'San Manuel', 'Planta'];

    return [
        'name'   => $faker->firstName,
        'email'  => $faker->unique()->safeEmail,
        'lang'   => $faker->randomElement($langs),
        'branch' => $faker->randomElement($branchs),
        'phone'  => $faker->phoneNumber,
        'text'   => $faker->paragraph
    ];
});