<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\Timeline;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TimelineController extends Controller
{
    public function index()
    {
        return view('backend.about_us.timeline.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Timeline::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('timelines.edit', $row->id);
                    $deleteUrl = route('timelines.distroy', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                    $deleteBtn = '
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                            ' . $csrfToken . '
                            ' . $methodField . '
                            <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                        </form>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create()
    {
        return view('backend.about_us.timeline.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'year' => 'required|string|max:255',
            'image' => 'required|file|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'about/timeline/';
            $file->move(public_path($path), $filename);
            $imagePath = $path . $filename;
        }

        Timeline::create([
            'title' => $request->title,
            'description' => $request->description,
            'year' => $request->year,
            'image' => $imagePath ?? null,
        ]);

        return redirect()->route('timelines.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $data = Timeline::findOrFail($id);
        return view('backend.about_us.timeline.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'year' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = Timeline::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path($data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'about/timeline/';
            $file->move(public_path($path), $filename);
            $data->image = $path . $filename;
        }

        $data->title = $request->title;
        $data->description = $request->description;
        $data->year = $request->year;
        $data->save();

        return redirect()->route('timelines.index')
            ->with('success', 'data updated successfully.');
    }



    public function distroy($id)
    {

        $data = Timeline::findOrFail($id);
        // Delete the image file if it exists
        $imagePath = public_path($data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $data->delete();
        return redirect()->route('timelines.index')
            ->with('success', 'data deleted successfully.');
    }
}
