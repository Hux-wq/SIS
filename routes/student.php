<?php

use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\AcademicPerformanceController;
use App\Http\Controllers\StudentEditProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/Students/Profile/View/{id}', [StudentProfileController::class, 'index'])->middleware(['auth', 'verified']);
Route::put('/Students/Profile/Update/{id}', [StudentProfileController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Students/{id}', [StudentProfileController::class, 'destroy'])->middleware(['auth', 'verified']);

Route::get('/Students/Profile/View/{id}/AcademicPerformance', [AcademicPerformanceController::class, 'index'])->middleware(['auth', 'verified']);
Route::put('/Students/Profile/Update/{id}', [AcademicPerformanceController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Students/{id}', [AcademicPerformanceController::class, 'destroy'])->middleware(['auth', 'verified']);


Route::get('/Students/Profile/View/{id}/EditProfile', [StudentEditProfileController::class, 'index'])->middleware(['auth', 'verified']);
