<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ListingsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ListingsController::class, 'index']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
