<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PodcastController extends Controller
{
    public function index()
    {
        $podcasts = [
            [
                'id' => 1,
                'title' => 'Sleepy Stories',
                'episode' => 'Episode 12: Magical Nights',
                'description' => 'Harry Potter, The Lord of the Rings',
                'release_date' => '2024-06-01, 18:30',
                'profile_img' => 'https://via.placeholder.com/100',
                'thumbnail_img' => 'https://via.placeholder.com/600x200'
            ],
            [
                'id' => 2,
                'title' => 'Adventure Tales',
                'episode' => 'Episode 5: Into the Jungle',
                'description' => 'Jungle Book, Tarzan',
                'release_date' => '2024-06-02, 15:00',
                'profile_img' => 'https://via.placeholder.com/100',
                'thumbnail_img' => 'https://via.placeholder.com/600x200'
            ],
            [
                'id' => 3,
                'title' => 'Nature\'s Secrets',
                'episode' => 'Episode 7: Whispering Winds',
                'description' => 'Earth Wonders',
                'release_date' => '2024-06-03, 10:15',
                'profile_img' => 'https://via.placeholder.com/100',
                'thumbnail_img' => 'https://via.placeholder.com/600x200'
            ],
        ];

        // Kirim data ke view
        return view('podcast.index', compact('podcasts'));
    }
}
