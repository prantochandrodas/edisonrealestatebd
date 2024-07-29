<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use App\Models\ContactBanner;
use Illuminate\Http\Request;

class ContactBannerController extends Controller
{
    public function index()
    {
        $data = ContactBanner::first();
        return view('backend.contact.contact-banners.index', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = ContactBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $imagePath = public_path('contact-banners/' . $data->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'contact-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('contact-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
