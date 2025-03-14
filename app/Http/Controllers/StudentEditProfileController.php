<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;

class StudentEditProfileController extends Controller
{
    public function index($id)
    {
        
        $students = User::with('userBasicInfo','userBasicNameInfo')->findOrFail($id);
        return Inertia::render('StudentEditProfile', [

            'students' => $students,
        
        ]); 
    }
}
