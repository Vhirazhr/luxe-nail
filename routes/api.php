<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReservationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// =============== AUTH API ===================
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum')
    ->name('api.logout');
Route::post('/register', [AuthController::class, 'register'])->name('api.register');

// =============== USER (Protected) ===================
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

// =============== RESERVATION API ===================
Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/reservations', [ReservationController::class, 'index']);
        Route::post('/reservations', [ReservationController::class, 'store']);
        Route::get('/reservations/{queue_number}', [ReservationController::class, 'show']);
        Route::put('/reservations/{id}', [ReservationController::class, 'update']);
        Route::delete('/reservations/{id}', [ReservationController::class, 'destroy']);
    });
});
