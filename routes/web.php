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
Route::get('/reservation/{hotel_id}',[ReservationController::class, 'showForm'])->name('reservation');
//Route::get('/reservation-form/{hotel_id}', function($hotelId){
  //  return view('reservation-form', ['hotel_id'=> $hotelId]);
//})->name('form');


