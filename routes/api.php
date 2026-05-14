<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EmailCampaignController;
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
        Route::post('/admin', [BookingController::class, 'adminStore']);
        Route::get('/statistics', [BookingController::class, 'statistics']);
        Route::get('/admin-slots', [BookingController::class, 'getAdminSlots']);
        Route::post('/custom-slots', [BookingController::class, 'addCustomSlot']);
        Route::delete('/custom-slots', [BookingController::class, 'removeCustomSlot']);
        Route::get('/{booking}', [BookingController::class, 'show']);
        Route::patch('/{booking}/status', [BookingController::class, 'updateStatus']);
        Route::post('/{booking}/accept', [BookingController::class, 'accept']);
        Route::post('/{booking}/decline', [BookingController::class, 'decline']);
        Route::post('/{booking}/reschedule', [BookingController::class, 'reschedule']);
        Route::delete('/{booking}', [BookingController::class, 'destroy']);
    });
});

// ── Email Marketing (Admin only) ──────────────────────────────────────────────
Route::prefix('email-campaigns')->middleware('auth:sanctum')->group(function () {
    Route::get('/', [EmailCampaignController::class, 'index']);
    Route::post('/', [EmailCampaignController::class, 'store']);
    Route::post('/preview', [EmailCampaignController::class, 'preview']);
    Route::get('/{campaign}', [EmailCampaignController::class, 'show']);
    Route::patch('/{campaign}', [EmailCampaignController::class, 'update']);
    Route::post('/{campaign}/send', [EmailCampaignController::class, 'sendNow']);
    Route::get('/{campaign}/logs', [EmailCampaignController::class, 'logs']);
    Route::delete('/{campaign}', [EmailCampaignController::class, 'destroy']);
});
