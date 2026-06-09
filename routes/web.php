<?php

declare(strict_types=1);

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('index'))->name('index');
Route::get('/login', fn () => view(Login::class))->name('login');
Route::get('/dashboard', fn () => view('auth.index'))->name('dashboard');
Route::get('/nodes', fn () => view('auth.show'))->name('nodes');
Route::get('/create-node', fn () => view('auth.create'))->name('create-node');
