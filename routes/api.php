<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\Booking\ResourceBookingController;
use App\Http\Controllers\Resource\ResourceController;
use Illuminate\Support\Facades\Route;

Route::apiResource('resources', ResourceController::class)
    ->only('index', 'store');
Route::apiResource('bookings', BookingController::class)
    ->only('store', 'destroy');
Route::get('resources/{id}/bookings', [ResourceBookingController::class, 'getResourceBookings',])
    ->whereNumber('id');

Route::apiResource('users', UserController::class)
    ->only('store');
