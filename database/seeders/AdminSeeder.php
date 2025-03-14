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
            'account_type' => 'admin',
            'remember_token' => null,
        ]);

        User::create([
            'id' => 2,
            'name' => 'john smith doe',
            'email' => 'students@student.com',
            'email_verified_at' => null,
            'password' =>  Hash::make('Student123'),
            'account_type' => 'student',
            'remember_token' => null,
        ]);

        User::create([
            'id' => 3,
            'name' => 'maxim Lim smith',
            'email' => 'teacher@teacher.com',
            'email_verified_at' => null,
            'password' =>  Hash::make('Teacher123'),
            'account_type' => 'teacher',
            'remember_token' => null,
        ]);
    }
}
