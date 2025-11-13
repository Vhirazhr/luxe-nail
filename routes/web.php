<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/reservations', [ReservationController::class, 'create'])->name('reservations.create');
Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservations/thank-you', [ReservationController::class, 'thankYou'])->name('reservations.thank-you');
Route::get('/reservations/{queue_number}/download', [ReservationController::class, 'downloadPdf'])
    ->name('reservations.download');
Route::get('/calendar', [ReservationController::class, 'calendar'])->name('calendar');
Route::get('/schedule-data', [ReservationController::class, 'getScheduleData'])->name('schedule.data');
Route::get('/date-details/{date}', [ReservationController::class, 'getDateDetails'])->name('date.details');
Route::get('/check-availability', [ReservationController::class, 'checkAvailability']);

Route::get('/dashboard', function () { 
    return view('dashboard.index'); 
});

// LOGIN PAGE
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::view('/staff', 'staff.index')->name('staff.index');
Route::view('/profile', 'profile.index')->name('profile.index');
