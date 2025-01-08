<?php

namespace App\Http\Controllers;

use App\Models\Koleksi;
use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $koleksis = Koleksi::where('id_user', $user->id)
            ->with(['koleksi_items.podcast.author'])
            ->get();

        return view('koleksi.index', compact('koleksis'));
    }
}
