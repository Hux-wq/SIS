<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => null,
            'password' =>  Hash::make('Administrator'),
            'remember_token' => null,
        ]);

        User::create([
            'id' => 2,
            'name' => 'Mark Ryan Liscabo',
            'email' => 'students@student.com',
            'email_verified_at' => null,
            'password' =>  Hash::make('Students'),
            'remember_token' => null,
        ]);
    }
}
