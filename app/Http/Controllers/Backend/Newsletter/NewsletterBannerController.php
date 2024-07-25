<?php

namespace App\Http\Controllers\Backend\Newsletter;

use App\Http\Controllers\Controller;
use App\Models\NewsletterBanner;
use Illuminate\Http\Request;

class NewsletterBannerController extends Controller
{
    public function index(){
        $data=NewsletterBanner::first();
        return view('backend.newsletter.newsletter-banners.index',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = NewsletterBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('newsletter-banners/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'newsletter-banners/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        $data->title = $request->title;
        $data->save();

        return redirect()->route('newsletter-banners.index')
            ->with('success', 'data updated successfully.');
    }

}
