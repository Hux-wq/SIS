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
        //bsit 1
        Course::create([
            'id' => 1,
            'code' => 'cap101',
            'name' => 'capstone and research 1',
            'created_by' => 'admin',
            'program_id' => 1,
        ]);
        //bsce 1
        Course::create([
            'id' => 2,
            'code' => 'mt122',
            'name' => 'engineering data analysis',
            'created_by' => 'admin',
            'program_id' => 2,
        ]);
        //bsce 2
        Course::create([
            'id' => 3,
            'code' => 'phy121',
            'name' => 'physics for engineers',
            'created_by' => 'admin',
            'program_id' => 2,
        ]);

        //bsce 3
        Course::create([
            'id' => 4,
            'code' => 'cpe221',
            'name' => 'Software Design',
            'created_by' => 'admin',
            'program_id' => 2,
        ]);

        //bsce 4
        Course::create([
            'id' => 5,
            'code' => 'cpe530',
            'name' => 'Engineering Ethics',
            'created_by' => 'admin',
            'program_id' => 2,
        ]);


        //blis 1
        Course::create([
            'id' => 6,
            'code' => 'liscc113',
            'name' => 'thesis/research writing',
            'created_by' => 'admin',
            'program_id' => 4,
        ]);

        //blis 2
        Course::create([
            'id' => 7,
            'code' => 'iselec1',
            'name' => 'living in it era',
            'created_by' => 'admin',
            'program_id' => 4,
        ]);

        //blis 3
        Course::create([
            'id' => 8,
            'code' => 'spt2',
            'name' => 'special/public librarianship',
            'created_by' => 'admin',
            'program_id' => 4,
        ]);


        //blis 4
        Course::create([
            'id' => 9,
            'code' => 'lis102',
            'name' => 'collection management of information sources',
            'created_by' => 'admin',
            'program_id' => 4,
        ]);

        //bsais 1
        Course::create([
            'id' => 10,
            'code' => 'ae324/ba416',
            'name' => 'accounting research (feasiblity study)',
            'created_by' => 'admin',
            'program_id' => 3,
        ]);

        //bsais 2
        Course::create([
            'id' => 11,
            'code' => 'ae223',
            'name' => 'financial market',
            'created_by' => 'admin',
            'program_id' => 3,
        ]);

        //bsais 3
        Course::create([
            'id' => 12,
            'code' => 'ae225',
            'name' => 'business laws and regulations',
            'created_by' => 'admin',
            'program_id' => 3,
        ]);

        //bsais 4
        Course::create([
            'id' => 13,
            'code' => 'ae124',
            'name' => 'fundamentals and accounting II',
            'created_by' => 'admin',
            'program_id' => 3,
        ]);
    }
}
