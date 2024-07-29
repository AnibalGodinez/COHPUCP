<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.view');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'facebook_link' => 'nullable|url',
            'twitter_link' => 'nullable|url',
            'bio' => 'nullable|string|max:1000',
        ]);

        $user = Auth::user();

        if ($request->hasFile('profile_image')) {
            if ($user->profile_image && Storage::exists('public/' . $user->profile_image)) {
                Storage::delete('public/' . $user->profile_image);
            }

            $user->profile_image = $request->file('profile_image')->store('profile_images', 'public');
        }

        $user->facebook_link = $request->input('facebook_link');
        $user->twitter_link = $request->input('twitter_link');
        $user->bio = $request->input('bio');

        $user->save();

        return redirect()->route('profile.show')->with('success', 'Perfil actualizado con éxito.');
    }
}
