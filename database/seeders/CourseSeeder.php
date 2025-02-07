<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Course;
class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'id' => 1,
            'code' => 'cap101',
            'name' => 'capstone and research 1',
            'created_by' => 'admin',
            'program_id' => 1,
        ]);
    }
}
