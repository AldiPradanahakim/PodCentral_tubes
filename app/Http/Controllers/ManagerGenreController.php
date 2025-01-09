<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ManagerGenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('dashboard.managegenre.index', compact('genres'));
    }


    public function create()
    {
        return view('dashboard.managegenre.create');
    }

    public function store(Request $request)
    {
        // Log seluruh data request untuk debugging
        Log::info('Menerima data request: ' . json_encode($request->all()));
        $request->validate([
            'nama' => 'required|string|max:255|unique:genre',
        ]);

        try {
            Genre::create([
                'nama' => $request->nama,
            ]);
            // Log keberhasilan pembuatan genre
            Log::info('Genre baru berhasil dibuat dengan nama: ' . $request->nama);

            return redirect()->route('dashboard.managegenre.index')->with('success', 'Genre berhasil ditambahkan');
        } catch (\Exception $e) {
            // Log error dengan pesan yang lebih jelas
            Log::error('Error saat membuat genre: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan genre: ' . $e->getMessage()]);
        }
    }

    public function edit(Genre $genre)
    {
        return response()->json(['genre' => $genre]);
    }

    public function update(Request $request, Genre $genre)
    {
        $request->validate([
            'nama' => 'required|string|max:255|unique:genre,nama,' . $genre->id,
        ]);
        try {
            $genre->update([
                'nama' => $request->nama,
            ]);
            // Log keberhasilan pembuatan genre
            Log::info('Genre dengan ID: ' . $genre->id . ' berhasil diupdate');

            return redirect()->route('dashboard.managegenre.index')->with('success', 'Genre berhasil diupdate');
        } catch (\Exception $e) {
            // Log error dengan pesan yang lebih jelas
            Log::error('Error saat mengupdate genre: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat mengupdate genre: ' . $e->getMessage()]);
        }
    }

    public function destroy(Genre $genre)
    {
        try {
            // Delete data genre
            $genre->delete();
            // Log keberhasilan delete genre
            Log::info('Genre dengan ID: ' . $genre->id . ' berhasil dihapus');

            return redirect()->route('dashboard.managegenre.index')->with('success', 'Genre berhasil dihapus');
        } catch (\Exception $e) {
            // Log error dengan pesan yang lebih jelas
            Log::error('Error saat menghapus genre: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus genre: ' . $e->getMessage()]);
        }
    }
}
