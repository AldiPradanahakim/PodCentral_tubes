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
        $podcastsPerGenre = DB::table('podcast')
            ->select('id_genre', DB::raw('count(*) as total'))
            ->groupBy('id_genre')
            ->get();


        // Podcast Terpopuler (Berdasarkan koleksi)
        $popularPodcasts = Podcast::withCount('koleksi_items')
            ->orderBy('koleksi_items_count', 'desc')
            ->take(5)
            ->get();

        // Episode Terbaru (5 episode terbaru)
        $latestEpisodes = Podcast::with('author')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        // Data Podcast untuk Tabel (Pagination dan Sorting)
        $perPage = 5;
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $podcasts = Podcast::with('author')
            ->orderBy($sort, $direction)
            ->paginate($perPage, ['*'], 'podcasts');

        // User untuk table (Pagination dan sorting)
        $sort_user = $request->input('sort_user', 'id');
        $direction_user = $request->input('direction_user', 'asc');

        $users = User::orderBy($sort_user, $direction_user)
            ->paginate($perPage, ['*'], 'users');



        return view('dashboard.index', compact(
            'totalPodcasts',
            'totalUsers',
            'totalGenres',
            'podcastsPerGenre',
            'popularPodcasts',
            'latestEpisodes',
            'podcasts',
            'users'
        ));
    }
}
