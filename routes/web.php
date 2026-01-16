<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\NisnController;
use App\Http\Controllers\SiswaHobiesController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Middleware\AlreadyLoggedIn;
use App\Http\Middleware\AuthCheck;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware(AlreadyLoggedIn::class);
Route::post('/login', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('auth.register')->middleware(AlreadyLoggedIn::class);
Route::post('/register', [AuthController::class, 'store'])->name('auth.store');

Route::middleware([AuthCheck::class])->group(function () {
    Route::resource('hobbies',HobbiesController::class);
    // Route::resource('siswa', SiswaController::class);
    Route::resource('nisn', NisnController::class);
    Route::resource('siswas', SiswasController::class);
    Route::resource('phone-number', PhoneNumberController::class);
    Route::resource('siswa-hobbies', SiswaHobiesController::class);
});