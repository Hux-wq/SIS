<?php
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::get('/Department', [DepartmentController::class, 'index'])->middleware(['auth', 'verified'])->name('department');

Route::post('/Department/Create', [DepartmentController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/Department/Edit/{id}', [DepartmentController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/Department/Update/{id}', [DepartmentController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Department/{id}', [DepartmentController::class, 'destroy'])->middleware(['auth', 'verified']);

