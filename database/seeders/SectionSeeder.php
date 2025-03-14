<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;


class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'section' => 1,
            'adviser' => 3,
            'year' => 2,
            'semester' => 1,
            'specialization' =>  null,
            'created_by' => 'admin',
            'department_id' => 1,
        ]);

        
    }
}
