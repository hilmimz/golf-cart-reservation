<?php

use App\Http\Controllers\TestDatabase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\AdminDashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', function () {
    return view('landing-page/landing-page');
});

Route::get('/test', [TestDatabase::class, 'test']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::get('/dashboard_user', [UserDashboardController::class, 'index'])->name('dashboard_user');
Route::get('/dashboard_driver', [DriverDashboardController::class, 'index'])->name('dashboard_driver');
Route::get('/dashboard_admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');