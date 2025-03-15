<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//Pertemuan 3 (TODO & USER)

// TODO
Route::get('/todo', [TodoController::class, 'index'])->name(name:'todo.index');
Route::get('/todo/create', [TodoController::class, 'create'])->name(name:'todo.create');
Route::get('/todo/edit', [TodoController::class, 'edit'])->name(name:'todo.edit');

// User
Route::get('/user', [UserController::class, 'index'])->name(name:'user.index');

require __DIR__.'/auth.php';

// kesalahan pesan commit