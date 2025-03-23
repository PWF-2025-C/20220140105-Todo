<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route utama (halaman welcome)
Route::get('/', function () {
    return view('welcome');
});

// Route untuk dashboard, hanya bisa diakses oleh pengguna yang sudah login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard'); // Hapus 'verified' sementara jika login bermasalah

// Memuat route auth secara global (Breeze sudah mengelola autentikasi di sini)
require __DIR__.'/auth.php';

// Route yang membutuhkan autentikasi
Route::middleware('auth')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // TODO Routes
    Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
    Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
    Route::get('/todo/edit', [TodoController::class, 'edit'])->name('todo.edit');

    // User Routes
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});
