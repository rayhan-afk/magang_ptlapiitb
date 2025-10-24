<?php

namespace App\Http\Controllers;

use App\Models\Kantin; // Import model Kantin
use App\Models\Menu;   // Import model Menu
use Illuminate\Http\Request;
use Illuminate\View\View; // Import View

class WelcomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan data kantin dan menu.
     */
    public function index(): View // Tentukan return type adalah View
    {
        // Ambil beberapa kantin (misal 3 teratas berdasarkan ID atau kriteria lain)
        $kantins = Kantin::where('is_open', true)->orderBy('id', 'desc')->take(3)->get();

        // Ambil beberapa menu (misal 4 terbaru atau acak)
        $menus = Menu::where('is_tersedia', true)
                     ->with('kantin') // Ambil data kantinnya juga (optimasi query)
                     ->inRandomOrder() // Ambil acak
                     ->take(4)
                     ->get();

        // Kirim data ke view 'welcome'
        return view('welcome', [
            'kantinPopuler' => $kantins, // Ganti nama variabel agar sesuai view
            'menuAndalan' => $menus,     // Ganti nama variabel agar sesuai view
        ]);
    }
}