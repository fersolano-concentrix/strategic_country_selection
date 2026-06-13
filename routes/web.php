<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CountryController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    Route::get('/profile/security', [AuthController::class, 'editPassword'])
        ->name('profile.password.edit');

    Route::put('/profile/security', [AuthController::class, 'updatePassword'])
        ->name('profile.password.update');

    Route::get('/dashboard', [CountryController::class, 'dashboard'])->name('dashboard');
    Route::get('/pipeline', [CountryController::class, 'pipeline'])->name('pipeline');

    Route::get('/countries/create', [CountryController::class, 'create'])->name('countries.create');
    Route::post('/countries', [CountryController::class, 'store'])->name('countries.store');

    Route::get('/countries/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
    Route::put('/countries/{country}', [CountryController::class, 'update'])->name('countries.update');
    Route::delete('/countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
});

Route::get('/', [CountryController::class, 'index'])->name('countries.index');
Route::get('/index', [CountryController::class, 'index'])->name('countries.index');
Route::get('/recommender', [CountryController::class, 'recommender'])->name('countries.recommender');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.post');
Route::get('/countries/{country}', [CountryController::class, 'show'])->name('countries.show');
