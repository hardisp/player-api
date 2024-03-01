<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        Player::created([
            'name' => $faker->name(),
            'position' => 'midfielder',
            "skills" => [
                [
                    "skill" => "attack",
                    "value" => 60
                ],
                [
                    "skill" => "speed",
                    "value" => 80
                ],
            ]
        ]);
        Player::created([
            'name' => $faker->name(),
            'position' => 'forward',
            "skills" => [
                [
                    "skill" => "attack",
                    "value" => 90
                ],
                [
                    "skill" => "speed",
                    "value" => 90
                ],
            ]
        ]);
    }
}
