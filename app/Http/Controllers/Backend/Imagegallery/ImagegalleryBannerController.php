<?php

namespace App\Http\Controllers\Backend\Imagegallery;

use App\Http\Controllers\Controller;
use App\Models\ImageGalleryBanner;
use Illuminate\Http\Request;

class ImagegalleryBannerController extends Controller
{
    public function index(){
        $data=ImageGalleryBanner::first();
        return view('backend.image-gallery.image-gallery-banners.index',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = ImageGalleryBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
          
            

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'imagegallery-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('imagegallery-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
