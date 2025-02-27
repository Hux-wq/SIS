<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
class StudentController extends Controller
{
    public function index()
    {
        
        $users = User::where('account_type','student')->with('userBasicInfo')->get();

        return Inertia::render('Students', [
            'users' => $users
        ]);
    }
}
