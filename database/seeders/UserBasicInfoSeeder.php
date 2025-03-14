<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UserBasicInfo;
class UserBasicInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        UserBasicInfo::create([
            'age' => $faker->numberBetween(18, 60),
            'sex' => $faker->randomElement(['male', 'female']),
            'birthdate' => $faker->date(),
            'religion' => $faker->word,
            'place_of_birth' => $faker->city,
            'current_address' => $faker->address,
            'user_id' => 2,
        ]);

        $faker = Faker::create();
        UserBasicInfo::create([
            'age' => $faker->numberBetween(40, 60),
            'sex' => $faker->randomElement(['male', 'female']),
            'birthdate' => $faker->date(),
            'religion' => $faker->word,
            'place_of_birth' => $faker->city,
            'current_address' => $faker->address,
            'user_id' => 3,
        ]);
    }
}
