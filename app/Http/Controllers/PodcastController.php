<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function show(Podcast $podcast)
    {
        $podcast->load('author'); // Memuat relasi author
        return view('podcast.index', compact('podcast'));
    }
}
