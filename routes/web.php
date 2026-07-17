<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('website.index');
    Route::get('/about', 'about')->name('website.about');
    Route::get('/state', 'state')->name('website.state');
    Route::get('/city', 'city')->name('website.city');
    Route::get('/neighborhood', 'neighborhood')->name('website.neighborhood');
    Route::get('/contact', 'contact')->name('website.contact');
    Route::get('/deals', 'deals')->name('website.deals');
    Route::get('/packages', 'packages')->name('website.packages');
    Route::get('/privacy', 'privacy')->name('website.privacy');
    Route::get('/service-area', 'serviceArea')->name('website.serviceArea');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
