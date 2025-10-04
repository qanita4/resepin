<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::get('add-recipe', function () {
    return Inertia::render('AddRecipe');
})->name('add-recipe');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
