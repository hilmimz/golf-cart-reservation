<?php

use App\Http\Controllers\TestDatabase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CekRuteController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\RiwayatController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/test', [TestDatabase::class, 'test']);

// GUEST
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::get('/', function () {
        return view('landing-page/landing-page');
    });
    Route::get('/cek_rute', [CekRuteController::class, 'index'])->name('cek_rute');
    Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

});

// Route::middleware(['user'])->group(function () {
    Route::get('/dashboard_user', [UserDashboardController::class, 'index'])->name('dashboard_user');
// });

Route::middleware(['driver'])->group(function () {
    Route::get('/dashboard_driver', [DriverDashboardController::class, 'index'])->name('dashboard_driver');
});
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');
// });


// USER
Route::middleware(['user'])->group(function () {
    Route::get('/dashboard_user', [UserDashboardController::class, 'index'])->name('dashboard_user');
});
Route::get('/dashboard_user/profile', function () {
    return view('user/profile');
})->name('profile');


// SOPIR
Route::middleware(['driver'])->group(function () {
    Route::get('/dashboard_driver', [DriverDashboardController::class, 'index'])->name('dashboard_driver');
});

