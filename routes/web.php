<?php

use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

// Admin routes start
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('books', BookController::class);
    Route::post('books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
    Route::resource('reservations', ReservationController::class);
});
// Admin routes end

// Client routes start
Route::middleware('auth')->group(function () {
    Route::get('/dash', [ClientController::class, 'index'])->name('dash');
    Route::resource('clients', ClientController::class);
    Route::get('/profile', [ClientController::class, 'profile'])->name('profile');
});
// Client routes end