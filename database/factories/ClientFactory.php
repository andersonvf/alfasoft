<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{

    public function definition()
    {
$factory->define(App\Models\Client::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'age'               => $faker->randomNumber(2),
        'photo'             => $faker->imageUrl(),
        'remember_token'    => Str::random(10),
        'user_id'           => 1
        
    ];
});
}
}