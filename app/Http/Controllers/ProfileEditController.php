<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileEditController extends Controller
{
    // Tampilkan form edit
    public function edit()
    {
        $profile = Profile::first();
        return view('admin.profile.edit', compact('profile'));
    }

    // Proses update data
    public function update(Request $request)
    {
        $profile = Profile::first();

        $request->validate([
            'hero_title' => 'required',
            'hero_subtitle' => 'nullable',
            'about_text' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'capacity' => 'required',
            'established_year' => 'required',
            'activities' => 'required', 
            'public_access' => 'required',
            'address' => 'required',
            'google_maps_url' => 'required|url',
            'whatsapp_number' => 'required',
        ]);

        // Convert mission dari textarea ke array
        $missions = explode("\n", $request->mission);
        $missions = array_map('trim', $missions);
        $missions = array_filter($missions);

        $profile->update([
            'hero_title' => $request->hero_title,
            'hero_subtitle' => $request->hero_subtitle,
            'about_text' => $request->about_text,
            'vision' => $request->vision,
            'mission' => $missions,
            'capacity' => $request->capacity,
            'established_year' => $request->established_year,
            'activities' => $request->activities,
            'public_access' => $request->public_access,
            'address' => $request->address,
            'google_maps_url' => $request->google_maps_url,
            'whatsapp_number' => $request->whatsapp_number,
        ]);

        return redirect('/profil')->with('success', 'Profil berhasil diupdate!');
    }
}