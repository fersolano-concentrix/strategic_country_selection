<?php

declare(strict_types=1);

use App\Http\Controllers\CountryController;
use App\Http\Controllers\AuthController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// ==========================================
// PUBLIC & AUTH ROUTES
// ==========================================
Route::get('/', fn () => view('index'))->name('index');
Route::get('/login', fn () => view('auth.login'))->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.post');

// ==========================================
// DASHBOARD ADMIN
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('auth.index'))->name('dashboard');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');

    // Wrapped named group for managing country matrix assets
    Route::name('admin.')->group(function () {
        
        // Form Ingestion Creation Workflows
        Route::get('/create-node', [CountryController::class, 'create'])->name('countries.create');
        Route::post('/create-node', [CountryController::class, 'store'])->name('countries.store');
        
        // Primary Dashboard Matrix Asset Index
        // Adding an explicit alias 'nodes' so any route('nodes') requests redirect safely!
        Route::get('/nodes', [CountryController::class, 'index'])
            ->name('countries.index');
            
        // Individual Resource Updates & Modifiers
        Route::get('/admin/countries/{country}/edit', [CountryController::class, 'edit'])->name('countries.edit');
        Route::put('/admin/countries/{country}', [CountryController::class, 'update'])->name('countries.update');
        Route::delete('/admin/countries/{country}', [CountryController::class, 'destroy'])->name('countries.destroy');
    });

    // Fallback Alias Group for Legacy/Navigation Links
    // This catches route('nodes') or route('create-node') safely outside the prefix block
    Route::get('/nodes', [CountryController::class, 'index'])->name('nodes');
    Route::get('/create-node', [CountryController::class, 'create'])->name('create-node');
});
