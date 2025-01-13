<?php

namespace App\View\Components;

use App\Models\Genre;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Layout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $genres = Genre::with('podcasts.author')->get();
        $currentRoute = Route::currentRouteName();
        return view('components.layout', compact('currentRoute', 'genres'));
    }
}
