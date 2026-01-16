<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\HobbiesController;
use App\Http\Controllers\Api\NisnController;
use App\Http\Controllers\Api\PhoneNumberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/auth/register',RegisterController::class);
Route::post('/auth/login',LoginController::class);

Route::apiResource('hobbies',HobbiesController::class);
Route::apiResource('phone-numbers',PhoneNumberController::class);
Route::apiResource('nisn',NisnController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');