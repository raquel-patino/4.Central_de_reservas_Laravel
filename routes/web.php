<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Models\Reservation;

Route::view('/', 'auth.login')->name('login-index');
Route::view('/register', 'auth.register')->name('register');

Route::get('/private', [ReservationController::class, 'showReservations'])->name('private');
//Route::post('/',[HomeController::class, 'index']); -> modificarla y modificarla en el formulario de login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register-new', [LoginController::class, 'register'])->name('register-new');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/search', [ReservationController::class, 'searchReservation'])->name('search');
Route::get('myprofile', [LoginController::class, 'showProfile'])->name('show-profile');
Route::get('/reservation',[ReservationController::class, 'showForm'])->name('reservation');
Route::get('/new-reservation', [ReservationController::class, 'makeReservation'])->name('new-reservation');
Route::get('/cancel/{reservation_id}', [ReservationController::class, 'confirmDelete'])->name('confirm-delete');
Route::delete('/cancel/{reservation_id}', [ReservationController::class ,'destroy'])->name('reservation-destroy');
Route::get('/update/{reservation_id}',[ReservationController::class, 'updateReservation'])->name('update');
Route::post('/modify/{reservation_id}', [ReservationController::class, 'modifyReservation'])->name('modify');