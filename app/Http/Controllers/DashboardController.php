<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use App\Models\Genre;
use App\Models\HistoryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Statistik
        $totalPodcasts = Podcast::count();
        $totalUsers = User::count();
        $totalGenres = Genre::count();

        // Podcast Per Genre
        $podcastsPerGenre = Podcast::select('id_genre', DB::raw('count(*) as total'))
            ->groupBy('id_genre')
            ->get();

        // Pengguna Aktif (Dalam 7 hari terakhir)
        $activeUsers = 0;

        // Podcast Terpopuler (Berdasarkan koleksi)
        $popularPodcasts = Podcast::withCount('koleksi_items')
            ->orderBy('koleksi_items_count', 'desc')
            ->take(5)
            ->get();

        // Episode Terbaru (5 episode terbaru)
        $latestEpisodes = Podcast::with(['author'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Data Podcast untuk Tabel (Pagination dan Sorting)
        $perPage = 5;
        $sortColumn = $request->query('sort', 'created_at');
        $sortDirection = $request->query('direction', 'desc');

        $podcasts = Podcast::with('author', 'genre')
            ->orderBy($sortColumn, $sortDirection)
            ->paginate($perPage);

        // User untuk table (Pagination dan sorting)
        $sortUserColumn = $request->query('sort_user', 'created_at');
        $sortUserDirection = $request->query('direction_user', 'desc');

        $users = User::orderBy($sortUserColumn, $sortUserDirection)
            ->paginate($perPage, ['*'], 'users');


        return view('dashboard.index', compact(
            'totalPodcasts',
            'totalUsers',
            'totalGenres',
            'activeUsers',
            'podcastsPerGenre',
            'popularPodcasts',
            'latestEpisodes',
            'podcasts',
            'users'
        ));
    }
}
