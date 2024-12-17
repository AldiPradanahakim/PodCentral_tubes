<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showPodcasts()
    {
        // Ambil data podcast, misalnya dari database
        $podcasts = Podcast::all(); // Ambil semua podcast dari database

        // Kirim data ke tampilan
        return view('podcast.index', compact('podcasts'));
    }
}
