<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateListingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/t/{tslug}', [TournamentController::class, 'show']);

// 
Route::get('crlisting', [CreateListingController::class, 'index']);

Route::get('/debug', function() {
    return view('debug', [
        'debug' => "none"
    ]);
});

Route::post('/t/signup', [TournamentController::class, 'signup']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
