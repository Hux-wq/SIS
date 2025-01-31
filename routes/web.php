<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseListController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/students', [StudentController::class, 'index'])->middleware(['auth', 'verified'])->name('students');


Route::get('/CourseList', [CourseListController::class, 'index'])->middleware(['auth', 'verified'])->name('course-list');

require __DIR__.'/profile.php';

require __DIR__.'/department.php';

require __DIR__.'/auth.php';

require __DIR__.'/reports.php';

require __DIR__.'/api.php';





