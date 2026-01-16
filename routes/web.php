<?php

use App\Http\Controllers\HobbiesController;
use App\Http\Controllers\NisnController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaHobiesController;
use App\Http\Controllers\SiswasController;
use App\Http\Controllers\PhoneNumberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hobbies',HobbiesController::class);
Route::resource('siswa', SiswaController::class);
Route::resource('nisn', NisnController::class);
Route::resource('siswas', SiswasController::class);
Route::resource('phone-number', PhoneNumberController::class);
Route::resource('siswa-hobbies', SiswaHobiesController::class);