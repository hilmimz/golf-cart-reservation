<?php

use App\Http\Controllers\TestDatabase;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::get('/register', [RegisterController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
