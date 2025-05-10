<?php

use App\Http\Controllers\WorkController;
use Illuminate\Support\Facades\Route;

Route::get('', fn() => to_route('works.index'));

Route::resource('works', WorkController::class)->only(['index', 'show']);
