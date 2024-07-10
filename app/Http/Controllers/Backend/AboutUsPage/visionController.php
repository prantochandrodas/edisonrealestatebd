<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class visionController extends Controller
{
    public function index()
    {
        $data = Vision::first();
        return view('backend.about_us.vision.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = Vision::findOrFail($id);



        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('visions.index')
            ->with('success', 'data updated successfully.');
    }

}
