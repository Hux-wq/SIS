<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class StudentProfileController extends Controller
{
    public function index($id)
    {
        
        $students = User::with('userBasicInfo')->findOrFail($id);
        return Inertia::render('StudentProfile', [

            'students' => $students,
        
        ]); 
    }

    
 
}
