<?php

namespace App\Http\Controllers\Backend\Landowner;

use App\Http\Controllers\Controller;
use App\Models\LandownerDescription;
use Illuminate\Http\Request;

class LandownerDescriptionController extends Controller
{
    public function index(){
        $data=LandownerDescription::first();
        return view('backend.landowners.landowner-descriptions.index',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|file|image|max:2048',
        ]);
        $data = LandownerDescription::findOrFail($id);
        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('landowner-description/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'landowner-description/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }

        
        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('landowner-descriptions.index')
            ->with('success', 'data updated successfully.');
    }
}
