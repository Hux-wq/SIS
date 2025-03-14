<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UserBasicNameInfo;
class UserBasicNameInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        UserBasicNameInfo::create([
            'first_name' => 'john',
            'middle_name' => 'Doe',
            'last_name' => 'Smith',
            'suffix_name' => $faker->optional()->word,
            'user_id' => 2, // Assume there are at least 50 users
        ]);

        $faker = Faker::create();
        UserBasicNameInfo::create([
            'first_name' => 'maxim',
            'middle_name' => 'smith',
            'last_name' => 'lim',
            'suffix_name' => $faker->optional()->word,
            'user_id' => 3, // Assume there are at least 50 users
        ]);
    }
}
