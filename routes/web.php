<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',function(){
    return view('admin.admin');
})->name('admin')->middleware('admin');

Route::get('/profile',function(){
    return view('client.profile');
})->name('profile')->middleware('client');












Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
});








Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('books', BookController::class);
    Route::get('books/{book}/delete', [BookController::class, 'delete'])->name('books.delete');
    Route::get('books/{book}/restore', [BookController::class, 'restore'])->name('books.restore');
});

