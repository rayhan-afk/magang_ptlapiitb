@extends('layouts.app') @section('title', 'Dashboard') @section('content')
 <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
             <div class="p-6 bg-white border-b border-gray-200">

                 <h2 class="text-2xl font-semibold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h2>

                 <p class="mb-4">Peran Anda: <strong>{{ ucfirst(str_replace('_', ' ', Auth::user()->role)) }}</strong></p>

                 @if(Auth::user()->isAdmin())
                     <p>Anda memiliki akses ke fitur administrasi.</p>
                     <a href="#" class="text-blue-500 hover:underline">Kelola Pengguna</a>
                 @elseif(Auth::user()->isPengelolaKantin())
                     <p>Anda dapat mengelola menu dan pesanan kantin Anda.</p>
                     <div class="mt-4 space-x-4">
                         <a href="#" class="text-blue-500 hover:underline">Lihat Menu</a>
                         <a href="#" class="text-blue-500 hover:underline">Lihat Pesanan Masuk</a>
                     </div>
                 @elseif(Auth::user()->isMahasiswa())
                     <p>Silakan lihat menu dan lakukan pemesanan.</p>
                      <div class="mt-4 space-x-4">
                         <a href="#" class="text-blue-500 hover:underline">Lihat Menu Kantin</a>
                         <a href="#" class="text-blue-500 hover:underline">Riwayat Pesanan Saya</a>
                     </div>
                 @endif

             </div>
         </div>
     </div>
 </div>
 @endsection

 @push('scripts')
 @endpush