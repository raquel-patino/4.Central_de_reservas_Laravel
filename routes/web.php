<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::view('/', 'auth.login')->name('login-index');
Route::view('/register', 'auth.register')->name('register');
Route::view('/private', 'private')->name('private');
//Route::post('/',[HomeController::class, 'index']); -> modificarla y modificarla en el formulario de login
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register-new', [LoginController::class, 'register'])->name('register-new');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


