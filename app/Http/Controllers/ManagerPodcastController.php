<?php

namespace App\Http\Controllers;

use App\Models\Podcast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class ManagerPodcastController extends Controller
{
    public function index()
    {
        $podcasts = Podcast::with('author', 'genre')->get();
        return view('dashboard.managepodcast.index', compact('podcasts'));
    }

    public function create()
    {
        return view('dashboard.managepodcast.create');
    }

    public function store(Request $request)
    {
        // Debug request data
        Log::info('Request Data:', $request->all());

        try {
            // Debug sebelum upload file
            Log::info('Mulai upload file');

            $imagePath = $request->file('image')->store('podcast_images', 'public');
            $audioPath = $request->file('files')->store('podcast_audio', 'public');

            // Debug path file
            Log::info('Image Path: ' . $imagePath);
            Log::info('Audio Path: ' . $audioPath);

            // Debug data sebelum create
            $podcastData = [
                'nama' => $request->nama,
                'author_id' => $request->author_id,
                'id_genre' => $request->genre_id,
                'desc' => $request->desc,
                'duration' => $request->duration,
                'release_date' => $request->release_date,
                'files' => $audioPath,
                'image' => $imagePath,
            ];
            Log::info('Data yang akan disimpan:', $podcastData);

            $podcast = Podcast::create($podcastData);

            // Debug setelah create
            Log::info('Podcast berhasil dibuat:', $podcast->toArray());

            return redirect()->route('dashboard.managepodcast.index')
                ->with('success', 'Podcast berhasil ditambahkan');
        } catch (\Exception $e) {
            Log::error('Error detail: ' . $e->getMessage());
            Log::error('Stack trace: ' . $e->getTraceAsString());

            return redirect()->back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan: ' . $e->getMessage()]);
        }
    }


    public function edit(Podcast $podcast)
    {
        return response()->json(['podcast' => $podcast]);
    }


    public function update(Request $request, Podcast $podcast)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'author_id' => 'required|exists:users,id',
            'genre_id' => 'required|exists:genre,id'
        ]);

        try {
            // Update data podcast
            $podcast->update([
                'nama' => $request->nama,
                'author_id' => $request->author_id,
                'id_genre' => $request->genre_id,
            ]);

            // Log keberhasilan update podcast
            Log::info('Podcast dengan ID: ' . $podcast->id . ' berhasil diupdate');

            return redirect()->route('dashboard.managepodcast.index')->with('success', 'Podcast berhasil diupdate');
        } catch (\Exception $e) {

            // Log error dengan pesan yang lebih jelas
            Log::error('Error saat mengupdate podcast: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());

            return redirect()->back()->withInput()->withErrors(['error' => 'Terjadi kesalahan saat mengupdate podcast: ' . $e->getMessage()]);
        }
    }



    public function destroy(Podcast $podcast)
    {
        try {
            // Hapus file terkait dari storage sebelum menghapus database record.
            Storage::disk('public')->delete($podcast->image);
            Storage::disk('public')->delete($podcast->files);

            // Delete data podcast
            $podcast->delete();

            // Log keberhasilan delete podcast
            Log::info('Podcast dengan ID: ' . $podcast->id . ' berhasil dihapus');

            return redirect()->route('dashboard.managepodcast.index')->with('success', 'Podcast berhasil dihapus');
        } catch (\Exception $e) {
            // Log error dengan pesan yang lebih jelas
            Log::error('Error saat menghapus podcast: ' . $e->getMessage() . ' Trace: ' . $e->getTraceAsString());
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menghapus podcast: ' . $e->getMessage()]);
        }
    }
}
