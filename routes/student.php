<?php

use App\Http\Controllers\StudentProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/Students/Profile/View/{id}', [StudentProfileController::class, 'index'])->middleware(['auth', 'verified']);
Route::put('/Program/Update/{id}', [StudentProfileController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Program/{id}', [StudentProfileController::class, 'destroy'])->middleware(['auth', 'verified']);