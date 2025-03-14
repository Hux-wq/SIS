<?php
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;


Route::get('/Sections', [SectionController::class, 'index'])->middleware(['auth', 'verified'])->name('course');

Route::post('/Section/Create', [SectionController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/Section/Edit/{id}', [SectionController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/Section/Update/{id}', [SectionController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Section/{id}', [SectionController::class, 'destroy'])->middleware(['auth', 'verified']);