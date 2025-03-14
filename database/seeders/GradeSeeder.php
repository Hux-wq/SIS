<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Grade::create([
            'type' => 'Prelim Examination',
            'test_no' => 1,
            'score' => 50,
            'total' => 50,
            'student_id' => 2,
            'course_id' => 1,
            'section_id' => 1,
        ]);

        Grade::create([
            'type' => 'Midterm Examination',
            'test_no' => 1,
            'score' => 50,
            'total' => 50,
            'student_id' => 2,
            'course_id' => 1,
            'section_id' => 1,
        ]);

        Grade::create([
            'type' => 'Final Examination',
            'test_no' => 1,
            'score' => 50,
            'total' => 50,
            'student_id' => 2,
            'course_id' => 1,
            'section_id' => 1,
        ]);

        for ($quizNo = 1; $quizNo <= 12; $quizNo++) 
        { 
            Grade::create([
                'type' => 'Quiz',
                'test_no' => $quizNo,
                'score' => rand(25, 30), 
                'total' => 30,
                'student_id' => 2,
                'course_id' => 1,
                'section_id' =>1,
            ]);
        }

        for ($ass = 1; $ass <= 6; $ass++)
        { 
            Grade::create([
                'type' => 'Assignment',
                'test_no' => $ass,
                'score' => rand(25, 30), 
                'total' => 30,
                'student_id' => 2,
                'course_id' => 1,
                'section_id' =>1,
            ]);
        }

        for ($ass = 1; $ass <= 3; $ass++)
        { 
            Grade::create([
                'type' => 'Project',
                'test_no' => $ass,
                'score' => rand(90, 95), 
                'total' => 100,
                'student_id' => 2,
                'course_id' => 1,
                'section_id' =>1,
            ]);
        }


        
    }
}
