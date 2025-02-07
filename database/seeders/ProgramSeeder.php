<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Program;
class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'id' => 1,
            'code' => 'bsit',
            'name' => 'bachelor of science in information technology',
            'created_by' => 'admin',
            'department_id' => 1,
        ]);
    }
}
