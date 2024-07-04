<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeaturedProjectController extends Controller
{
    public function index()
    {
        return view('backend.home.featured_project.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = FeaturedProject::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('slider.edit', $row->id);
                    $deleteUrl = route('slider.distory', $row->id);

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
        return view('backend.home.featured_project.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);
        
        FeaturedProject::create([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);

        return redirect()->route('featured_project.index')
            ->with('success', 'Slider created successfully.');
    }


    public function edit($id)
    {
        $slider = FeaturedProject::findOrFail($id);
        return view('backend.home.featured_project.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|file|image|max:2048',
            'heading' => 'required|string|max:255',
        ]);

        $slider = FeaturedProject::findOrFail($id);

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

        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('featured_project.index')
            ->with('success', 'Slider updated successfully.');
    }



    public function distory($id)
    {
        
        $slider = FeaturedProject::findOrFail($id);

        // Delete the image file if it exists
        $imagePath = public_path($slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();

        return redirect()->route('slider.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
