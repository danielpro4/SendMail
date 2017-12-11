<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => 'Daniel',
        'email' => 'daniel.perez.atanacio@gmail.com',
        'password' => $password ?: $password = bcrypt('s3cr3t'),
        'remember_token' => str_random(10),
    ];
});

