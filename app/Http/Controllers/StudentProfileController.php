<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Grade;
use Inertia\Inertia;

class StudentProfileController extends Controller
{
    public function index($id)
    {
        
        $students = User::with('userBasicInfo','userBasicNameInfo')->findOrFail($id);
        $grades = Grade::where('student_id', $id)->get();
        return Inertia::render('StudentProfile', [

            'students' => $students,
            'grades' => $grades,
        
        ]); 
    }

    
 
}
