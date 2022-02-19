<?php

use Faker\Generator as Faker;

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'password'          => 'EoC9ShWd1hWq4vBgFw',
        'remember_token'    => Str::random(10),
        
    ];
});