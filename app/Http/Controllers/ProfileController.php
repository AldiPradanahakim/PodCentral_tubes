<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show($id = null)
    {
        $user = null;
        if ($id) {
            $user = User::findOrFail($id);
        } else {
            $user = Auth::user();
        }

        if (!$user) {
            abort(404);
        }

        return view('profile.index', compact('user'));
    }
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete('public/' . $user->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
            $user->save();

            session()->flash('success', 'Profile picture updated successfully');
        } else {
            session()->flash('error', 'No image file was provided');
        }

        return back();
    }
    public function deleteProfilePicture()
    {
        $user = auth()->user();
        if ($user->profile_image) {
            Storage::delete('public/' . $user->profile_image);
            $user->profile_image = null;
            $user->save();
            session()->flash('success', 'Profile picture deleted successfully.');
        }
        return back();
    }
}
