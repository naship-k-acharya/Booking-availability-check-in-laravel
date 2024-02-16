<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReserveroomController;
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
    return view('index');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::get('/userdashboard', function () {
    return view('userdashboard');
})->middleware(['auth', 'role:user'])->name('userdashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
});

require __DIR__.'/auth.php';

Route::get('/add', function () {
    return view('add');
});
// Route::get('/bookingroom', [ReserveroomController::class, 'booking'])->name('booking');
Route::get('/booking/{id}', [ReserveroomController::class, 'showbookdata'])->name('booking');
Route::post('/booked', [BookingController::class, 'store'])->name('bookingconform');
Route::post('/add', [ReserveroomController::class, 'addstore'])->name('add');


Route::get('/list', [ReserveroomController::class, 'list'])->name('list');
