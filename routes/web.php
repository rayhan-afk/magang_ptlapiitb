<?php

use Illuminate\Support\Facades\Route;
 // Pastikan Anda sudah punya Auth routes (bisa dari Laravel UI/Breeze/Jetstream atau manual)
 // Contoh jika menggunakan Laravel UI:
 // Auth::routes();

 // Route awal (jika perlu)
 Route::get('/', function () {
     return view('welcome'); //
 });

 // Route Dashboard (membutuhkan login)
 Route::middleware(['auth'])->group(function () {
     Route::get('/dashboard', function () {
         return view('dashboard');
     })->name('dashboard'); // Beri nama 'dashboard'

     // Tambahkan route lain yang butuh login di sini
 });