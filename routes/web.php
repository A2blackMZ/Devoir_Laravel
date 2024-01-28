<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\RoomController;
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

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('registration.post');
Route::get('dashboard', [AuthController::class, 'dashboard']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


// RoomController
Route::get('/dashboard', [RoomController::class, 'index'])->name('dashboard');
Route::get('/create', [RoomController::class, 'create'])->name('create');
Route::post('/saveroom', [RoomController::class, 'store'])->name('saveroom');
Route::get('/rooms/{room}/detail', [RoomController::class, 'detail'])->name('roomdetail');
Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('roomedit');
Route::put('/rooms/{room}/update', [RoomController::class, 'update'])->name('roomupdate');
Route::delete('/rooms/{room}/destroy', [RoomController::class, 'destroy'])->name('roomdestroy');

