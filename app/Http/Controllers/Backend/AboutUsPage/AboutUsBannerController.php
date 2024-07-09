<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutUsBanner;
use Illuminate\Http\Request;

class AboutUsBannerController extends Controller
{
    public function index()
    {
        $data = AboutUsBanner::all();
        return view('backend.about_us.about_us_banner.index', compact('data'));
    }

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = AboutUsBanner::all();
            return datatables($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('about-us-banners.edit');
                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                    return $editBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function edit()
    {
        $data = AboutUsBanner::first();
        return view('backend.about_us.about_us_banner.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|file|max:2048',
        ]);

        $data = AboutUsBanner::findOrFail($id);

        if ($request->hasFile('image')) {

            $oldImagePath = public_path($data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'about/about-us-banner/';
            $file->move(public_path($path), $filename);
            $data->image = $path . $filename;
        }
        $data->title = $request->title;
        $data->save();
        return redirect()->route('about-us-banners.index')->with('success', 'successfully updated');
    }
}
