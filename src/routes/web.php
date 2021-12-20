<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\CreateListingController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/t/{tslug}', function($tslug) {
    
});
//  [TournamentController::class, 'index']);

// 
Route::get('crlisting', [CreateListingController::class, 'index']);

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
