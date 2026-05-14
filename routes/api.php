<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── Auth ──────────────────────────────────────────────────────────────────────
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/me', [AuthController::class, 'me']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

// ── Booking API ───────────────────────────────────────────────────────────────
Route::prefix('bookings')->group(function () {
    // Public
    Route::post('/', [BookingController::class, 'store']);
    Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);

    // Admin — protected
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/', [BookingController::class, 'index']);
        Route::get('/statistics', [BookingController::class, 'statistics']);
        Route::get('/{booking}', [BookingController::class, 'show']);
        Route::patch('/{booking}/status', [BookingController::class, 'updateStatus']);
        Route::delete('/{booking}', [BookingController::class, 'destroy']);
    });
});
