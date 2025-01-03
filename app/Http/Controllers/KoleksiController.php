<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KoleksiController extends Controller
{
    public function index()
    {
        return view('koleksi.index');
    }
}
