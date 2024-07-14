<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\InvestorInformation;
use Illuminate\Http\Request;

class InvestorInformationController extends Controller
{
    public function index(){
        $data=InvestorInformation::first();
        return view('backend.home.investor_information.index',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail_image' => 'nullable|file|image|max:2048',
            'video' => 'required|string|max:255',
        ]);

        $data = InvestorInformation::findOrFail($id);

        if ($request->hasFile('thumbnail_image')) {
            // Delete the old image
            $oldImagePath = public_path('home/InvestorInformation/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/InvestorInformation/';
            $file->move(public_path($path), $filename);
            $data->thumbnail_image = $filename;
        }

        $data->video = $request->video;
        $data->save();

        return redirect()->route('investor-informations.index')
            ->with('success', 'data updated successfully.');
    }
}
