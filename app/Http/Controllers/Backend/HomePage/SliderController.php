<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\slider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SliderController extends Controller
{
    public function index()
    {
        return view('backend.home.slider.index');
    }

    public function getSliders(Request $request)
    {

        if ($request->ajax()) {
            $data = slider::all();
            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    $firstImage = $row->image;
                    if ($firstImage) {
                        return asset('home/slider/' . $firstImage); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
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
        return view('backend.home.slider.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required|file|image|max:2048',
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $imagePath = $filename;
        }

        slider::create([
            'image' => $imagePath ?? null,
            'heading' => $request->heading,
            'short_description' => $request->short_description,
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'Slider created successfully.');
    }


    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.home.slider.edit', compact('slider'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|file|image|max:2048',
            'heading' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
        ]);

        $slider = Slider::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('home/slider/', $slider->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $slider->image = $filename;
        }

        $slider->heading = $request->heading;
        $slider->short_description = $request->short_description;
        $slider->save();

        return redirect()->route('slider.index')
            ->with('success', 'Slider updated successfully.');
    }



    public function distory($id)
    {

        $slider = slider::findOrFail($id);
        // Delete the image file if it exists
        $imagePath = public_path('home/slider/', $slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $slider->delete();
        return redirect()->route('slider.index')
            ->with('success', 'Slider deleted successfully.');
    }
}
