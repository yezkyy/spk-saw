<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAWController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [SAWController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('alternatif', AlternatifController::class)->middleware('auth');
Route::resource('kriteria', KriteriaController::class)->middleware('auth');
