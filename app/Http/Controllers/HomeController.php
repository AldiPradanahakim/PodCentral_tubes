<?php

namespace App\Http\Controllers;


use App\Models\Podcast;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Menampilkan halaman utama dengan podcast berdasarkan pencarian.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Ambil query pencarian dari parameter 'search'
        $search = $request->input('search');

        // Ambil data podcast dengan relasi 'author' dan filter berdasarkan pencarian
        $podcasts = Podcast::with('author')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%$search%")
                    ->orWhere('desc', 'like', "%$search%");
            })
            ->get();

        // Kembalikan view dengan data podcast yang telah difilter
        return view('home.index', compact('podcasts'));
    }

    /**
     * Menangani pencarian podcast secara langsung (AJAX).
     *
     * @param \Illuminate\Http\Request $request
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

        // Ambil data podcast dengan relasi 'author' dan filter berdasarkan pencarian
        $podcasts = Podcast::with('author')
            ->when($search, function ($query, $search) {
                return $query->where('nama', 'like', "%$search%")
                    ->orWhere('desc', 'like', "%$search%");
            })
            ->get();

        // Kembalikan data podcast dalam format JSON
        return response()->json($podcasts);
    }
}
