<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\TeamBanner;
use Illuminate\Http\Request;

class TeamBannerController extends Controller
{
    public function index()
    {
        $data = TeamBanner::first();
        return view('backend.about_us.team.banner', compact('data'));
    }

 
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|file|max:2048',
        ]);

        $data = TeamBanner::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImagePath = public_path('team-banner/',$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'team-banner/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }
        $data->title = $request->title;
        $data->save();
        return redirect()->route('team-banners.index')->with('success', 'successfully updated');
    }
}
