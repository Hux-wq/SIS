<?php
use Inertia\Inertia;

Route::get('/StudentReports', function () {
    return Inertia::render('StudentReports');
})->middleware(['auth', 'verified'])->name('StudentsReports');