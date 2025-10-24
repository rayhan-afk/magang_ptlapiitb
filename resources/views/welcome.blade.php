@extends('layouts.app') {{-- Memberitahu Blade untuk menggunakan layout app.blade.php --}}

@section('title', 'Selamat Datang di Kantin Kampus') {{-- Judul spesifik untuk halaman ini --}}

@section('content')
    {{-- Konten spesifik untuk halaman welcome --}}
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
               {{-- Anda bisa meletakkan logo atau judul besar di sini --}}
               <h1 class="text-4xl font-bold text-gray-800">Kantin Kampus</h1>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                <div class="p-6">
                    <div class="text-center">
                        <h2 class="text-2xl font-semibold text-gray-700">Pesan Makanan Favoritmu!</h2>
                        <p class="mt-4 text-gray-600">
                            Login atau Register untuk mulai memesan makanan dari kantin kampus.
                        </p>
                        <div class="mt-6">
                            @guest {{-- Tampilkan hanya jika belum login --}}
                                <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Login
                                </a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                        Register
                                    </a>
                                @endif
                            @else {{-- Tampilkan jika sudah login --}}
                                 <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Masuk ke Dashboard
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>

            {{-- Anda bisa tambahkan bagian lain di sini, misal daftar kantin populer, dll. --}}

        </div>
    </div>
@endsection