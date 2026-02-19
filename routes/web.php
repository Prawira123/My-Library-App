<?php

use App\Http\Controllers\BorrowingItemController;
use App\Http\Controllers\IndexController as GuestController;
use App\Http\Controllers\Member\IndexController as MemberController;
use App\Http\Controllers\member\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/books', [GuestController::class, 'book_section'])->name('book_section');
Route::get('/about_us', [GuestController::class, 'about_us'])->name('about_us');
Route::get('/contact_us', [GuestController::class, 'contact_us'])->name('contact_us');
Route::get('/detail_book/{id}', [GuestController::class, 'detail_book'])->name('detail_book');

Route::get('/force-logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/login');
});

Route::middleware('auth')->group(function () {
    Route::post('/borrowings/{book}', [BorrowingItemController::class, 'store'])
    ->name('borrowings.store')->middleware(['role:member']);
    Route::get('/borrowings/create/{book}', [BorrowingItemController::class, 'create'])
    ->name('borrowings.create')->middleware(['role:member']);

    Route::get('/home/member',[MemberController::class, 'index'])->name('home_member')->middleware(['role:member']);
    Route::resource('profiles', ProfileController::class)->middleware(['role:member']);
    Route::put('/edit_bg', [ProfileController::class, 'edit_bg'])->name('edit_bg')->middleware(['role:member']);
  
});

require __DIR__.'/auth.php';
