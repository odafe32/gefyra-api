<?php

use App\Http\Controllers\BookingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Booking API Routes
Route::prefix('bookings')->group(function () {
    // Public routes
    Route::post('/', [BookingController::class, 'store']);
    Route::get('/available-slots', [BookingController::class, 'getAvailableSlots']);

    // Admin routes (should be protected with middleware in production)
    Route::get('/', [BookingController::class, 'index']);
    Route::get('/statistics', [BookingController::class, 'statistics']);
    Route::get('/{booking}', [BookingController::class, 'show']);
    Route::patch('/{booking}/status', [BookingController::class, 'updateStatus']);
    Route::delete('/{booking}', [BookingController::class, 'destroy']);
});
