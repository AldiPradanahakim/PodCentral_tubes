<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Podcast;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama dengan podcast berdasarkan genre.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil semua data genre beserta podcast dan author terkaitnya
        $genres = Genre::with('podcasts.author')->get();

        // Kirim view dengan data genre
        return view('home.index', compact('genres'));
    }

    /**
     * Menangani pencarian podcast secara langsung (AJAX).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search' => 'nullable|string|max:255',  // Validasi untuk search
        ]);

        // Ambil query pencarian dari parameter 'search'
        $search = $request->input('search');

        $podcasts = Podcast::with('author', 'genre')
            ->where('nama', 'LIKE', "%$search%")
            ->orWhereHas('author', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%");
            })
            ->orWhereHas('genre', function ($query) use ($search) {
                $query->where('nama', 'LIKE', "%$search%");
            })
            ->get();

        // Kembalikan data podcast dalam format JSON
        return response()->json($podcasts);
    }
}
