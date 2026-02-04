<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BorrowingItemController;

Route::get('/home', [IndexController::class, 'index'])->name('home');
Route::get('/home/books', [IndexController::class, 'book_section'])->name('book_section');
Route::get('/home/about_us', [IndexController::class, 'about_us'])->name('about_us');
Route::get('/home/contact_us', [IndexController::class, 'contact_us'])->name('contact_us');
Route::get('/home/detail_book/{id}', [IndexController::class, 'detail_book'])->name('detail_book');


Route::middleware('auth')->group(function () {
    Route::post('/borrowings/{book}', [BorrowingItemController::class, 'store'])
    ->name('borrowings.store');
    Route::get('/borrowings/create/{book}', [BorrowingItemController::class, 'create'])
    ->name('borrowings.create');
});

require __DIR__.'/auth.php';
