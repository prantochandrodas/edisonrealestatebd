<?php

namespace App\Http\Controllers\Backend\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyPivot;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PropertyController extends Controller
{
    public function index()
    {
        return view('backend.property.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Property::with('images')->get();
            return DataTables::of($data)
                ->addColumn('first_image', function ($row) {
                    $firstImage = $row->images->first();
                    if ($firstImage) {
                        return asset($firstImage->image); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('propertys.edit', $row->id);
                    $deleteUrl = route('propertys.distroy', $row->id);

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
        return view('backend.property.create',compact('images'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'nullable|string|max:255',
            'short_title' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'overview' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'type' => 'nullable|string|max:255',
            'apartment_tour' => 'nullable|string|max:255',
            'virtual_experience' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Save the property data
        $property = Property::create([
            'name' => $request->name,
            'short_title' => $request->short_title,
            'address' => $request->address,
            'overview' => $request->overview,
            'specification' => $request->specification,
            'amount' => $request->amount,
            'type' => $request->type,
            'apartment_tour' => $request->apartment_tour,
            'virtual_experience' => $request->virtual_experience
        ]);
        // Save the images to property_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'property/';
                $file->move(public_path($path), $filename);
                $imagePath = $path . $filename;

                PropertyPivot::create([
                    'property_id' => $property->id,
                    'image' => $imagePath
                ]);
            }
        }


        return redirect()->route('propertys.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $data = Property::findOrFail($id);
        return view('backend.property.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about' => 'required|string|max:2000',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = Property::findOrFail($id);

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

        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->about = $request->about;
        $data->save();

        return redirect()->route('propertys.index')
            ->with('success', 'data updated successfully.');
    }



    public function distroy($id)
    {

        $data = Property::findOrFail($id);
        // Delete the image file if it exists
        $imagePath = public_path($data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $data->delete();
        return redirect()->route('propertys.index')
            ->with('success', 'data deleted successfully.');
    }

    public function view($id)
    {
        $data = Property::find($id);
        if ($data) {
            $response = [
                'about' => $data->about
            ];
            // dd($response);
            return response()->json($response);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data not found'
            ], 404);
        }
    }
}
