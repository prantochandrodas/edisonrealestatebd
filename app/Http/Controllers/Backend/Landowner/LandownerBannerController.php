<?php

namespace App\Http\Controllers\Backend\Landowner;

use App\Http\Controllers\Controller;
use App\Models\LandownerBanner;
use Illuminate\Http\Request;

class LandownerBannerController extends Controller
{
    public function index(){
        $data=LandownerBanner::first();
        return view('backend.landowners.landowner-banners.index',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = LandownerBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('landowner-banners/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'landowner-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('landowner-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
