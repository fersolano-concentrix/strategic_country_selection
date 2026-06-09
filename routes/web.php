<?php

declare(strict_types=1);

use App\Http\Controllers\CountryController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// ==========================================
// PUBLIC & AUTH ROUTES
// ==========================================
Route::get('/', fn () => view('index'))->name('index');
Route::get('/login', fn () => view('auth.login'))->name('login');

// ==========================================
// DASHBOARD
// ==========================================
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', fn () => view('auth.index'))->name('dashboard');
    
    // I commented these out as they are likely being replaced by the CountryController.
    // If you still have hardcoded links pointing to these, you can uncomment them or 
    // update your links to point to route('admin.countries.index') instead.
    Route::get('/nodes', fn () => view('auth.show'))->name('nodes');
    Route::get('/create-node', fn () => view('auth.create'))->name('create-node');
});

// ==========================================
// ADMIN PANEL (STRATEGIC MATRIX)
// ==========================================
/* 
 * This group automatically applies:
 * - URL Prefix: /admin/... (e.g., /admin/countries/create)
 * - Route Name Prefix: admin.* (e.g., route('admin.countries.create'))
 * - Middleware: Must be logged in
 */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    
    // Route::resource automatically creates the routes for index, create, store, edit, update, and destroy.
    // We exclude 'show' since your controller doesn't currently use a dedicated view-only page.
    Route::resource('countries', CountryController::class)->except(['show']);
    
});