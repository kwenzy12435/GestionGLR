<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/* Invitados (no logueados) */
Route::middleware('guest')->group(function () {
    Route::redirect('/', '/login'); // raíz -> login
    Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login',   [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register',[AuthController::class, 'register'])->name('register.post');
});

/* Autenticados */
Route::middleware('auth')->group(function () {
    Route::get('/', fn () => view('dashboard'))->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // aquí irán tus módulos protegidos (laptops, dispositivos, etc.)
    // Route::prefix('laptops')->group(function(){ ... });
});
