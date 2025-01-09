<?php

namespace App\Http\Controllers;


use App\Models\Podcast;
use App\Models\User;
use Illuminate\Http\Request;

class PodcastController extends Controller
{

    public function show(Podcast $podcast)
    {
        $podcast->load('author'); // Memuat relasi author
        return view('podcast.index', compact('podcast'));
    }

    public function index(User $author)
    {
        $podcasts = Podcast::with(['author', 'genre'])
            ->where('author_id', $author->id)
            ->orderBy('release_date', 'desc')
            ->get();

        return view('podcast.podcasts', compact('podcasts'));
    }
}
