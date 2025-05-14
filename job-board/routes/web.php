<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('', static fn() => to_route('works.index'));

Route::resource('works', WorkController::class)->only(['index', 'show']);

Route::get('login', static fn() => to_route('auth.create'))->name('login');
Route::resource('auth', AuthController::class)->only(['create', 'store']);
Route::delete('logout', static fn() => to_route('auth.destroy'))->name('logout');

Route::delete('auth', [AuthController::class, 'destroy'])->name('auth.destroy');
