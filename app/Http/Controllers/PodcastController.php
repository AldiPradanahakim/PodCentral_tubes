<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\History;
use App\Models\Podcast;
use App\Models\HistoryItem;
use App\Models\Koleksi;
use App\Models\KoleksiItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; // Import Log

class PodcastController extends Controller
{
    public function show(Podcast $podcast)
    {
        $podcast->load('author', 'genre');
        $genres = Genre::with(['podcasts' => function ($query) use ($podcast) {
            $query->with('author')->where('id', $podcast->id);
        }])->get();

        return view('podcast.index', compact('podcast', 'genres'));
    }

    public function index(User $author = null)
    {
        if ($author) {
            $podcasts = Podcast::with(['author', 'genre'])
                ->where('author_id', $author->id)
                ->orderBy('release_date', 'desc')
                ->get();

            return view('podcast.podcasts', compact('podcasts'));
        }


        $genres = Genre::with(['podcasts' => function ($query) {
            $query->with('author');
        }])->get();

        return view('podcast.index', compact('genres'));
    }


    public function list()
    {
        $genres = Genre::with(['podcasts' => function ($query) {
            $query->with('author');
        }])->get();

        return view('podcast.index', compact('genres'));
    }
    public function userPodcasts()
    {
        $user = Auth::user(); // Ambil user yang sedang login
        $podcasts = Podcast::with('author')
            ->where('author_id', $user->id)
            ->orderBy('release_date', 'desc')
            ->get();

        return view('podcast.user_podcasts', compact('podcasts'));
    }

    public function addToHistory(Request $request, Podcast $podcast)
    {
        Log::info('addToHistory: Request received for Podcast ID: ' . $podcast->id);

        if (!Auth::check()) {
            Log::error('addToHistory: User not authenticated.');
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $user = Auth::user();
        Log::info('addToHistory: User ID: ' . $user->id . ', Podcast ID: ' . $podcast->id);

        try {
            // Get or create history for user
            $history = History::firstOrCreate([
                'id_user' => $user->id
            ]);
            Log::info('addToHistory: History ID: ' . $history->id . ', Podcast ID: ' . $podcast->id);
            // Add podcast to history items
            HistoryItem::firstOrCreate([
                'history_id' => $history->id,
                'id_podcast' => $podcast->id
            ]);

            Log::info('addToHistory: History item added with History ID: ' . $history->id . ', Podcast ID: ' . $podcast->id);
            return response()->json(['message' => 'Added to history successfully']);
        } catch (\Exception $e) {
            Log::error('addToHistory: Error saving to history: ' . $e->getMessage());
            return response()->json(['message' => 'Error adding to history'], 500);
        }
    }
    public function addToKoleksi(Request $request, Podcast $podcast)
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }
        $user = Auth::user();
        Log::info('addToKoleksi: User ID: ' . $user->id . ', Podcast ID: ' . $podcast->id);

        try {
            $koleksi = Koleksi::firstOrCreate([
                'id_user' => $user->id,
            ]);
            $existingItem = KoleksiItem::where('koleksi_id', $koleksi->id)
                ->where('id_podcast', $podcast->id)
                ->first();
            if ($existingItem) {
                $existingItem->delete();
                Log::info('addToKoleksi: Removed from koleksi with id: ' . $koleksi->id . 'and Podcast ID: ' . $podcast->id);
                return response()->json(['message' => 'Removed from koleksi successfully']);
            } else {
                KoleksiItem::create([
                    'koleksi_id' => $koleksi->id,
                    'id_podcast' => $podcast->id
                ]);
                Log::info('addToKoleksi: Added to koleksi with id: ' . $koleksi->id . ', Podcast ID: ' . $podcast->id);
                return response()->json(['message' => 'Added to koleksi successfully']);
            }
        } catch (\Exception $e) {
            Log::error('addToKoleksi: Error adding/removing to koleksi: ' . $e->getMessage());
            return response()->json(['message' => 'Error adding to koleksi'], 500);
        }
    }
}
