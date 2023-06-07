<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomTypeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/room-type', RoomTypeController::class);
    Route::resource('/room', RoomController::class);
    Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');
    Route::get('/booking/{room_id}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking/{room_id}', [BookingController::class, 'store'])->name('booking.store');
    Route::post('/booking/{id}/update-status', [BookingController::class, 'updateStatus'])->name('booking.update-status');
});
