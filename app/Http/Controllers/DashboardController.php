<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;


class DashboardController extends Controller
{

    public function index()
    {

        $user = auth()->user(); 
        $statistics = [
        'posts' => 12,
        'comments' => 45,
        'likes' => 100,
        ];

        return Inertia::render('Dashboard', [
            'user' => $user
        ]);
    }
}
