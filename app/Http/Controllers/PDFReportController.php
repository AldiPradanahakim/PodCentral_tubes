<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFReportController extends Controller
{
    public function generateDashboardReport(Request $request)
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
        $sort = $request->input('sort', 'id');
        $direction = $request->input('direction', 'asc');

        $podcasts = Podcast::with('author')
            ->orderBy($sort, $direction)
            ->get();

        // User untuk table (Pagination dan sorting)
        $sort_user = $request->input('sort_user', 'id');
        $direction_user = $request->input('direction_user', 'asc');

        $users = User::orderBy($sort_user, $direction_user)
            ->get();
        $pdf = Pdf::loadView('pdf.dashboard_report', compact(
            'totalPodcasts',
            'totalUsers',
            'totalGenres',
            'podcastsPerGenre',
            'popularPodcasts',
            'latestEpisodes',
            'podcasts',
            'users'
        ));
        return $pdf->download('dashboard_report.pdf');
    }
}
