<?php
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;


Route::get('/Program', [ProgramController::class, 'index'])->middleware(['auth', 'verified'])->name('department');

Route::post('/Program/Create', [ProgramController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/Program/Edit/{id}', [ProgramController::class, 'edit'])->middleware(['auth', 'verified']);
Route::put('/Program/Update/{id}', [ProgramController::class, 'update'])->middleware(['auth', 'verified']);
Route::delete('/Program/{id}', [ProgramController::class, 'destroy'])->middleware(['auth', 'verified']);

