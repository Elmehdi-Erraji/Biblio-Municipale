<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReservationController;

use App\Http\Controllers\ClientController;

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

// Admin rooutes start


 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::resource('admin/users', UserController::class);
 
 Route::resource('books', BookController::class);

 Route::post('books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');


 Route::resource('admin/reservations', ReservationController::class);

// Admin rooutes End


// Client rooutes start
 Route::get('/dash',function(){
    return view('client.dash');
 })->name('dash')->middleware('client');

 Route::resource('dash', ClientController::class);
 // Client rooutes end