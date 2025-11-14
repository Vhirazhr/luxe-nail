<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Api\AuthController; 
use App\Http\Controllers\OwnerReservationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\StaffController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ====== LOGIN PAGE (Web) ======
Route::view('/login-page', 'auth.login')->name('login.page');

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect('/login-page')->with('success', 'You have been logged out.');
})->name('logout');

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

// ====== PROFILE (setelah login sukses) ======
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});

// ====== INCOME ======= //
Route::view('/dashboard/income', 'dashboard.income.dashboard_income')->name('dashboard.income');

// Route::get('/dashboard', function () {
//     return view('dashboard.index');
// });

// LOGIN PAGE
// ====== LOGIN DEFAULT (Laravel / redirect ke form custom) ======


Route::middleware('auth')->group(function () {
    Route::resource('staff', StaffController::class);
});

Route::get('/dashboard/reservations', [OwnerReservationController::class, 'index'])
    ->name('dashboard.reservations');


    