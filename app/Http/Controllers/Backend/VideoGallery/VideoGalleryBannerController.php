<?php

namespace App\Http\Controllers\Backend\VideoGallery;

use App\Http\Controllers\Controller;
use App\Models\VideoGalleryBanner;
use Illuminate\Http\Request;

class VideoGalleryBannerController extends Controller
{
    public function index()
    {
        $data = VideoGalleryBanner::first();
        return view('backend.gallery.video-gallery.video-gallery-banners.index', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = VideoGalleryBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $imagePath = public_path('video-gallery-banners/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'video-gallery-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('videogallery-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
