<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(Request $request)
    {
        try {
            $podcasts = Podcast::with('author')
                ->take(6)  // This will limit to 6 records
                ->latest('release_date')  // Optional: sort by newest first
                ->get();

            return view('landingpage', compact('podcasts'));
        } catch (\Exception $e) {
            \Log::error('Error loading podcasts: ' . $e->getMessage());
            return view('landingpage', ['podcasts' => collect()]);
        }
    }
}
