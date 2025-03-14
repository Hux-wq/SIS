<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create([
            'id' => 1,
            'code' => 'ccs',
            'name' => 'college of computer science',
            'head' => 'default',
            'created_by' => 'admin',
        ]);

        Department::create([
            'id' => 2,
            'code' => 'clis',
            'name' => 'college of library and information science',
            'head' => 'default',
            'created_by' => 'admin',
        ]);

        Department::create([
            'id' => 3,
            'code' => 'cba',
            'name' => 'college of business and accountancy',
            'head' => 'default',
            'created_by' => 'admin',
        ]);

        
    }
}
