<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController; // 1. Import WelcomeController

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// 2. Ubah route '/' untuk memanggil WelcomeController@index
Route::get('/', [WelcomeController::class, 'index'])->name('welcome'); // 3. Pastikan ada nama 'welcome'

// Route Dashboard bawaan Breeze (sudah benar)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profile bawaan Breeze (sudah benar)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include route autentikasi dari Breeze (sudah benar)
require __DIR__.'/auth.php';