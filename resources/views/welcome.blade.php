@extends('layouts.app') {{-- Gunakan layout utama (dari Breeze) ----}}

@section('title', 'Selamat Datang di Kantin Kampus SCFS')

{{-- Hapus @section('header') jika layout Breeze Anda tidak punya slot header --}}
{{-- @section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Welcome') }}
    </h2>
@endsection --}}

@section('content')
    {{-- Hero Section --}}
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-20 px-4 sm:px-6 lg:px-8 text-center">
        
        <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">Pesan Makanan Kantin Jadi Lebih Mudah!</h1>
        <p class="text-lg sm:text-xl mb-8 max-w-2xl mx-auto">Temukan menu favoritmu dari berbagai kantin di kampus ITB dalam satu aplikasi.</p>
        @guest
            <a href="{{ route('register') }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-gray-800 font-bold py-3 px-6 rounded-lg text-lg transition duration-300">Daftar Sekarang</a>
            <a href="{{ route('login') }}" class="ml-4 inline-block bg-white hover:bg-gray-100 text-indigo-600 font-bold py-3 px-6 rounded-lg text-lg transition duration-300">Login</a>
        @else
             <a href="{{ route('dashboard') }}" class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg text-lg transition duration-300">Masuk ke Dashboard</a>
        @endguest
    </div>

    {{-- Section Kantin Populer --}}
    <div class="py-12 bg-gray-100 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Kantin Terpopuler</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Menggunakan data dari Controller --}}
                @forelse ($kantinPopuler as $kantin)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                        {{-- Mengakses properti objek ->gambar, beri placeholder jika null --}}
                        {{-- Ganti URL Placeholder jika Anda punya gambar kantin --}}
                        <img src="{{ $kantin->gambar ?? 'https://via.placeholder.com/300x200?text=' . urlencode($kantin->nama_kantin) }}" alt="{{ $kantin->nama_kantin }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            {{-- Mengakses properti objek ->nama_kantin --}}
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $kantin->nama_kantin }}</h3>
                            {{-- Tampilkan lokasi jika ada --}}
                            @if($kantin->lokasi)
                            <p class="text-gray-600 dark:text-gray-400 mt-1 text-sm">{{ $kantin->lokasi }}</p>
                            @endif
                            <a href="#" class="mt-4 inline-block text-indigo-500 dark:text-indigo-400 hover:underline">Lihat Menu &rarr;</a>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-gray-500 md:col-span-3">Belum ada kantin populer.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Section Menu Andalan --}}
    <div class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-800 dark:text-gray-200 mb-8">Menu Andalan Hari Ini</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                 {{-- Menggunakan data dari Controller --}}
                 @forelse ($menuAndalan as $menu)
                    <div class="border dark:border-gray-700 rounded-lg overflow-hidden shadow-sm hover:shadow-lg transition duration-300">
                         {{-- GANTI URL GAMBAR DI SINI --}}
                         @php
                             // Logika sederhana untuk memilih gambar berdasarkan nama menu
                             $imageUrl = match (strtolower($menu->nama_menu)) {
                                 'nasi goreng spesial' => 'https://images.unsplash.com/photo-1512058564366-18510be2db19?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80',
                                 'ayam geprek pedas' => 'https://images.unsplash.com/photo-1562802379-91896752763f?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80',
                                 'soto ayam lamongan' => 'https://images.unsplash.com/photo-1627803445842-140a831518ce?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80', // Contoh gambar soto
                                 'mie ayam bakso' => 'https://images.unsplash.com/photo-1582576161842-3a54d4f29631?ixlib=rb-1.2.1&auto=format&fit=crop&w=300&q=80', // Contoh gambar mie ayam
                                 default => 'https://via.placeholder.com/300x200?text=' . urlencode($menu->nama_menu) // Fallback ke placeholder
                             };
                         @endphp
                         <img src="{{ $imageUrl }}" alt="{{ $menu->nama_menu }}" class="w-full h-40 object-cover">
                         {{-- AKHIR BAGIAN GAMBAR --}}

                         <div class="p-4">
                            {{-- Mengakses properti objek ->nama_menu --}}
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $menu->nama_menu }}</h4>
                            {{-- Mengakses nama kantin melalui relasi ->kantin->nama_kantin --}}
                            <p class="text-sm text-gray-500 dark:text-gray-400">{{ $menu->kantin->nama_kantin ?? 'Kantin tidak diketahui' }}</p>
                            {{-- Mengakses properti objek ->harga dan format --}}
                            <p class="text-lg font-bold text-green-600 dark:text-green-400 mt-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <button class="mt-4 w-full bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded transition duration-300">Pesan</button>
                        </div>
                    </div>
                 @empty
                     <p class="text-center text-gray-500 sm:col-span-2 lg:col-span-4">Belum ada menu andalan.</p>
                 @endforelse
            </div>
             <div class="text-center mt-8">
                <a href="#" class="text-indigo-600 dark:text-indigo-400 hover:underline font-semibold">Lihat Semua Menu &rarr;</a>
            </div>
        </div>
    </div>

    {{-- Section Fitur (Opsional) --}}
    <div class="py-12 bg-gray-50 dark:bg-gray-700">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
              <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-8">Kenapa Pilih SCFS Kantin?</h2>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                   <div class="p-6">
                        <svg class="w-12 h-12 mx-auto mb-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">Cepat & Mudah</h3>
                        <p class="text-gray-600 dark:text-gray-300">Pesan makanan tanpa antri, langsung dari HP kamu.</p>
                   </div>
                   <div class="p-6">
                       <svg class="w-12 h-12 mx-auto mb-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">Banyak Pilihan</h3>
                        <p class="text-gray-600 dark:text-gray-300">Semua menu dari kantin favoritmu ada di sini.</p>
                   </div>
                   <div class="p-6">
                       <svg class="w-12 h-12 mx-auto mb-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                        <h3 class="text-xl font-semibold mb-2 dark:text-white">Pembayaran Mudah</h3>
                         <p class="text-gray-600 dark:text-gray-300">(Segera Hadir) Bayar langsung pakai saldo e-wallet.</p>
                   </div>
              </div>
         </div>
    </div>
@endsection

@push('scripts')
{{-- Script khusus jika ada --}}
@endpush