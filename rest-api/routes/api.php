<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Публичные маршруты
Route::middleware('throttle:60,1')->group(function () {
    Route::get('/events', [EventController::class, 'index']);
    Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

    Route::get('/events/{event}/attendees', [AttendeeController::class, 'index']);
    Route::get('/events/{event}/attendees/{attendee}', [AttendeeController::class, 'show']);
});

Route::middleware('throttle:api')->group(function () {
    Route::apiResource('events', EventController::class)
        ->middleware('auth:sanctum')
        ->except(['index', 'show']);

    Route::apiResource('events.attendees', AttendeeController::class)
        ->scoped()
        ->middleware('auth:sanctum')
        ->except(['index', 'show']);
});


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');
