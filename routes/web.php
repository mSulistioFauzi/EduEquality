<?php

use App\Http\Controllers\C_AdminDashboard;
use App\Http\Controllers\C_AuthController;
use App\Http\Controllers\C_StudentDashboard;
use App\Http\Controllers\C_TutorDashboard;
use Illuminate\Support\Facades\Route;

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
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [C_AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [C_AuthController::class, 'login'])
        ->name('login.process');

    Route::get('/register', [C_AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [C_AuthController::class, 'register'])
        ->name('register.process');
});

// Logout dan dashboard hanya untuk pengguna login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [C_AuthController::class, 'logout'])->name('logout');

    Route::prefix('admin')->name('admin.')->middleware('role:admin')->group(function () {
            Route::get('/dashboard', [C_AdminDashboard::class, 'index'])->name('dashboard');
        });

    Route::prefix('student')->name('student.')->middleware('role:student')->group(function () {
            Route::get('/dashboard', [C_StudentDashboard::class, 'index'])->name('dashboard');
        });

    Route::prefix('tutor')->name('tutor.')->middleware('role:tutor')->group(function () {
            Route::get('/dashboard', [C_TutorDashboard::class, 'index'])->name('dashboard');
        });
});
