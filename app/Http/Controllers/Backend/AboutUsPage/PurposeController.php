<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PurposeController extends Controller
{
    public function index()
    {
        $data = Purpose::first();
        return view('backend.about_us.purpose.index', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = Purpose::findOrFail($id);



        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('purposes.index')
            ->with('success', 'data updated successfully.');
    }
      
}
