<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\DreamTeam;
use Illuminate\Http\Request;
class DreamTeamController extends Controller
{
    public function index(){
        $data=DreamTeam::first();
        return view('backend.about_us.dream-team.index',compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = DreamTeam::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('about/dreamTeam/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'about/dreamTeam/';
            $file->move(public_path($path), $filename);
            $data->image = $filename;
        }
        $data->save();

        return redirect()->route('dream-teams.index')
            ->with('success', 'data updated successfully.');
    }

}
