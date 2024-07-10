<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\ScheduleMetting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleMettingController extends Controller
{
    public function index(){
        $data=ScheduleMetting::first();
        return view('backend.home.schedule-metting.index',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $slider = ScheduleMetting::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path($slider->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $slider->image = $path . $filename;
        }

        $slider->title = $request->title;
        $slider->save();

        return redirect()->route('schedule-mettings.index')
            ->with('success', 'data updated successfully.');
    }

}
