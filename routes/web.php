<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\NeighbourhoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;


Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'index')->name('website.index');
    Route::get('/about', 'about')->name('website.about');
    Route::get('/state', 'state')->name('website.state');
    Route::get('/city', 'city')->name('website.city');
    Route::get('/detail', 'detail')->name('website.detail');
    Route::get('/contact', 'contact')->name('website.contact');
    Route::get('/deals', 'deals')->name('website.deals');
    Route::get('/services', 'packages')->name('website.packages');
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

    Route::middleware('role:admin')->group(function () {
        Route::delete('neighbourhoods/{neighbourhood}/images/{field}', [NeighbourhoodController::class, 'destroyImage'])->name('neighbourhoods.images.destroy');
        Route::resource('users', UserController::class)->except(['show']);
        Route::resources([
            'states' => StateController::class,
            'cities' => CityController::class,
            'neighbourhoods' => NeighbourhoodController::class,
        ], ['except' => ['show']]);
    });
});

require __DIR__.'/auth.php';
