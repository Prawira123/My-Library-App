<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;

Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::get('/home/books', [IndexController::class, 'book_section'])->name('book_section');
Route::get('/home/about_us', [IndexController::class, 'about_us'])->name('about_us');
Route::get('/home/contact_us', [IndexController::class, 'contact_us'])->name('contact_us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
