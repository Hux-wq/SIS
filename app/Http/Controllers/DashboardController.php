<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Course;
use App\Models\Program;
use App\Models\Department;

class DashboardController extends Controller
{

    public function index()
    {

        $studentsEnrolled = User::where('account_type', 'student')->count(); 
        $courseCount = Course::count(); 
        $programCount = Program::count(); 
        $departmentCount = Department::count(); 
        
        $statistics = [
        'posts' => 12,
        'comments' => 45,
        'likes' => 100,
        ];

        return Inertia::render('Dashboard', [
            'userEnrolled' => $studentsEnrolled,
            'courseCount' => $courseCount,
            'programCount' => $programCount,
            'departmentCount' => $departmentCount,
           
        ]);
    }
}
