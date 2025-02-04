<?php
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;


Route::get('/Courses', [CourseController::class, 'index'])->middleware(['auth', 'verified'])->name('course');

Route::post('/Course/Create', [CourseController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/Course/Edit/{id}', [CourseController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/Course/Update/{id}', [CourseController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Course/{id}', [CourseController::class, 'destroy'])->middleware(['auth', 'verified']);

