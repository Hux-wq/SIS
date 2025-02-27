<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\UserContactInfo;

class UserContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        UserContactInfo::create([
            'phone_number' => 9387161706,
            'email_address' => $faker->unique()->safeEmail,
            'facebook' => $faker->url,
            'user_id' => 2, 
        ]);
    }
}
