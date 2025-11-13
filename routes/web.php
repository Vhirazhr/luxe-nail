<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Api\AuthController; // tambahkan ini untuk pakai AuthController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====== LOGIN PAGE (Web) ======
Route::view('/login-page', 'auth.login')->name('login.page');

// Route POST untuk form login web
Route::post('/login-page', [AuthController::class, 'login'])->name('login.page.submit');

// ====== DASHBOARD (setelah login sukses) ======
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

// ====== HALAMAN UTAMA ======
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

// ====== RESERVATION (pemanggilan controller) ======
Route::get('/reservations', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/thank-you', [ReservationController::class, 'thankYou'])->name('reservations.thank-you');
Route::get('/reservations/{queue_number}/download', [ReservationController::class, 'downloadPdf'])
    ->name('reservations.download');

// ====== KALENDER & CEK JADWAL ======
Route::get('/calendar', [ReservationController::class, 'calendar'])->name('calendar');
Route::get('/schedule-data', [ReservationController::class, 'getScheduleData'])->name('schedule.data');
Route::get('/date-details/{date}', [ReservationController::class, 'getDateDetails'])->name('date.details');
Route::get('/check-availability', [ReservationController::class, 'checkAvailability']);

// ====== LOGIN DEFAULT (Laravel / redirect ke form custom) ======
Route::get('/login', function () {
    return redirect()->route('login.page');
})->name('login');
