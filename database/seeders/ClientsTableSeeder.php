<?php

namespace Database\Seeders;
namespace Database\Factories;

use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
/*         Client::insert([
            'name'    => Str::random(10),
            'email'   => Str::random(11) . "@" . Str::random(7) . '.' . Str::random(3),
            'age'     => rand(0, 100),
            'photo'   => Str::random(100),
            'user_id' => 1
        ]); */
        factory(Client::class, 3)->create();
    }
}
