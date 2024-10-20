<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// This route requires authentication
Route::get('/', function () {
    return view('home'); // Replace this with your actual home view
})->middleware(['auth']); // <-- Add auth middleware here

Route::get('/dashboard', function () {
    return view('dashboard'); // This route also requires authentication
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/about-us', function () {
    return view('about-us'); // Make sure to create a view file at resources/views/about-us.blade.php
})->name('about');

Route::get('/reports', function () {
    return view('reports'); // Make sure to create a view file at resources/views/reports.blade.php
})->name('reports');

Route::get('/community', function () {
    return view('community'); // Make sure to create a view file at resources/views/community.blade.php
})->name('community');

Route::get('/contact-us', function () {
    return view('contact-us'); // Make sure to create a view file resources/views/contact-us.blade.php
})->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include the authentication routes
require __DIR__.'/auth.php';
