<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HistoryController extends Controller
{
    public function index()
    {
        Log::info('HistoryController: index() method called.');
        $user = Auth::user();
        if (!$user) {
            Log::error('HistoryController: User not authenticated.');
            return view('history.index', ['historyItems' => collect([])]);
        }

        $history = History::where('id_user', $user->id)
            ->with(['history_items' => function ($query) {
                $query->with(['podcast' => function ($q) {
                    $q->with(['author', 'genre']);
                }]);
            }])
            ->first();


        if ($history) {
            Log::info('HistoryController: History found for user ' . $user->id . ', history ID: ' . $history->id);
            $historyItems = $history->history_items->sortByDesc('created_at');
            Log::info('HistoryController: History Items: ', $historyItems->toArray());
        } else {
            Log::info('HistoryController: No history found for user ' . $user->id);
            $historyItems = collect([]);
        }

        return view('history.index', compact('historyItems'));
    }
}
