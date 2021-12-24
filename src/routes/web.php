<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateListingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TournamentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/t/{tslug}', [TournamentController::class, 'showBySlug']);
Route::get('/ti/{tid}', [TournamentController::class, 'showById']);
Route::post('/t/{tslug}', [TournamentController::class, 'signup']);

// 
Route::get('crlisting', [CreateListingController::class, 'index']);

Route::get('/debug', function() {
    return view('debug', [
        'debug' => "none"
    ]);
});


Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
