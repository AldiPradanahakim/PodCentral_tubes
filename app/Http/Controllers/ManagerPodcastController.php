<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerPodcastController extends Controller
{
    public function index()
    {
        return view('dashboard.managepodcast.index');
    }
}
