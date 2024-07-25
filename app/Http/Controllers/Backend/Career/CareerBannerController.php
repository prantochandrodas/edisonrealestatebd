<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Models\CareerBanner;
use Illuminate\Http\Request;

class CareerBannerController extends Controller
{
    public function index()
    {
        $data = CareerBanner::first();
        return view('backend.career.career-banners.index', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = CareerBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $imagePath = public_path('career-banners/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'career-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('career-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
