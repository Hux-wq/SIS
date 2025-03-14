<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserSchoolInfo;


class UserSchoolInfoSeeder extends Seeder
{
    public function run():void
    {
        UserSchoolInfo::create([
            'id' => 1,
            'student_id' => 2,
            'position' => null,
            'section_id' => 1,
        ]);
    }
}