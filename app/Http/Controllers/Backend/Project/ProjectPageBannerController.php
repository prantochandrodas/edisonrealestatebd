<?php

namespace App\Http\Controllers\Backend\Project;

use App\Http\Controllers\Controller;
use App\Models\ProjectPageBanner;
use Illuminate\Http\Request;

class ProjectPageBannerController extends Controller
{
    public function index(){
        $data=ProjectPageBanner::first();
        return view('backend.project.project_banner.index',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = ProjectPageBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('project_banner/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'project_banner/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }
        $data->save();

        return redirect()->route('projectpage-banners.index')
            ->with('success', 'data updated successfully.');
    }
}
