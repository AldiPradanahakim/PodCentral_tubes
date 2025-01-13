<?php

namespace App\View\Components;

use App\Models\Genre;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class Sidebar extends Component
{
    public $genres;
    public $currentRoute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->genres = Genre::with('podcasts.author')->get();
        $this->currentRoute = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}
