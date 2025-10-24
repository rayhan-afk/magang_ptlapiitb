<!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
 <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>@yield('title', 'Kantin Kampus')</title> @vite('resources/css/app.css') </head>
 <body class="font-sans antialiased">
     <div class="min-h-screen bg-gray-100"> <nav class="bg-white shadow-sm">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                 <div class="flex justify-between h-16">
                     <div class="flex">
                         <div class="flex-shrink-0 flex items-center">
                             <a href="{{ route('dashboard') }}">Kantin Kampus</a>
                         </div>
                         <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                             <a href="#" class="border-indigo-500 text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                             @auth
                                 @if(auth()->user()->isAdmin())
                                     <a href="#" class="border-transparent hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Kelola User</a>
                                 @elseif(auth()->user()->isPengelolaKantin())
                                     <a href="#" class="border-transparent hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Kelola Menu</a>
                                     <a href="#" class="border-transparent hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Pesanan</a>
                                 @elseif(auth()->user()->isMahasiswa())
                                     <a href="#" class="border-transparent hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Pesan</a>
                                     <a href="#" class="border-transparent hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Riwayat</a>
                                 @endif
                             @endauth
                         </div>
                     </div>
                     <div class="hidden sm:ml-6 sm:flex sm:items-center">
                         @guest
                             <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                             @if (Route::has('register'))
                                 <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                             @endif
                         @else
                             <span>{{ Auth::user()->name }}</span>
                             <form method="POST" action="{{ route('logout') }}" class="ml-4">
                                 @csrf
                                 <button type="submit" class="text-sm text-gray-700 underline">Logout</button>
                             </form>
                         @endguest
                     </div>
                 </div>
             </div>
         </nav>

         <main>
             @yield('content') </main>

         <footer class="bg-white mt-8 py-4 text-center text-sm text-gray-500">
             &copy; {{ date('Y') }} Kantin Kampus. All rights reserved.
         </footer>
     </div>

     @vite('resources/js/app.js') @stack('scripts') </body>
 </html>