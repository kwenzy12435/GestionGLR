<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;    


Route::middleware('guest')->group(function () {
    Route::get('/', fn() => redirect('/login')); // raíz -> login
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register.post');
});

/* INICIO SESION */
Route::middleware('auth')->group(function () {

   Route::get('/', fn () => view('dashboard'))->name('dashboard');


    // cerrar sesion
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
