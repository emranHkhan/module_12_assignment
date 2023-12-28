<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TripController;
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

Route::get('/', [TripController::class, 'getLocations'])->name('home');
Route::get('/trips', [TripController::class, 'index'])->name('trips');
Route::post('/trip/store', [TripController::class, 'store'])->name('trip.store');
Route::get('/trip/{id}', [TripController::class, 'create'])->name('trip.create');
Route::post('/confirmTrip', [TripController::class, 'submit'])->name('trip.submit');
Route::get('/test', [TripController::class, 'test']);
// Route::get('/create-location', [LocationController::class, 'index']);
