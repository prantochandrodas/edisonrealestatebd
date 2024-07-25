<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Models\CareerDescription;
use Illuminate\Http\Request;

class CareerDescriptionController extends Controller
{
    public function index()
    {
        $data = CareerDescription::first();
        return view('backend.career.career-descriptions.index', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = CareerDescription::findOrFail($id);


        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('career-descriptions.index')
            ->with('success', 'data updated successfully.');
    }
}
