<?php

namespace App\Http\Controllers\Backend\Project;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectLocation;
use App\Models\ProjectPivot;
use App\Models\Projectype;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index()
    {
        return view('backend.project.project.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Project::with('images','category','type')->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('first_image', function ($row) {
                    $firstImage = $row->images->first();
                    if ($firstImage) {
                        return asset('project/'.$firstImage->image); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('category', function ($row) {
                    return $row->category ? $row->category->name : '';
                })
                ->addColumn('type', function ($row) {
                    return $row->type ? $row->type->name : '';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('projects.edit', $row->id);
                    $deleteUrl = route('projects.distroy', $row->id);

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
        $category = ProjectCategory::all();
        $type = Projectype::all();
        $location = ProjectLocation::all();
        return view('backend.project.project.create', compact('category', 'type', 'location'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'type_id' => 'required|exists:projectypes,id',
            'location_id' => 'required|exists:project_locations,id',
            'status' => 'required',
            'name' => 'nullable|string|max:255',
            'short_title' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'overview' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'apartment_tour' => 'nullable|string|max:255',
            'virtual_experience' => 'nullable|string|max:255',
            'google_map' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'beds' => 'nullable|numeric',
            'baths' => 'nullable|numeric',
            'verandas' => 'nullable|numeric',
            'area' => 'nullable|numeric',
            'plot' => 'nullable|string|max:255',            
            'road_no' => 'nullable|string|max:255',            
            'block' => 'nullable|string|max:255',            
        ]);
        $slug = $request->name ? Str::slug($request->name) : null;
        // Save the project data
        $project = Project::create([
            'project_category_id' => $request->project_category_id,
            'type_id' => $request->type_id,
            'location_id' => $request->location_id,
            'status' => $request->status,
            'name' => $request->name,
            'slug' => $slug,
            'short_title' => $request->short_title,
            'address' => $request->address,
            'overview' => $request->overview,
            'specification' => $request->specification,
            'amount' => $request->amount,
            'apartment_tour' => $request->apartment_tour,
            'virtual_experience' => $request->virtual_experience,
            'google_map' => $request->google_map,
            'beds' => $request->beds,
            'baths' => $request->baths,
            'verandas' => $request->verandas,
            'area' => $request->area,
            'plot' => $request->plot,
            'road_no' => $request->road_no,
            'block' => $request->block,
        ]);
        // Save the images to project_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'project/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;

                ProjectPivot::create([
                    'project_id' => $project->id,
                    'image' => $imagePath
                ]);
            }
        }


        return redirect()->route('projects-information.index')
            ->with('success', 'data created successfully.');
    }
    public function edit($id)
    {
        $data = Project::find($id);
        $categories = ProjectCategory::all();
        $types = Projectype::all();
        $locations = ProjectLocation::all();

        return view('backend.project.project.edit', compact('data', 'categories', 'types', 'locations'));
    }




    public function update(Request $request, $id)
    {

        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'type_id' => 'required|exists:projectypes,id',
            'location_id' => 'required|exists:project_locations,id',
            'status' => 'required',
            'name' => 'nullable|string|max:255',
            'short_title' => 'nullable|string',
            'address' => 'nullable|string|max:255',
            'overview' => 'nullable|string|max:255',
            'specification' => 'nullable|string',
            'amount' => 'nullable|numeric',
            'apartment_tour' => 'nullable|string|max:255',
            'virtual_experience' => 'nullable|string|max:255',
            'google_map' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'beds' => 'nullable|numeric',
            'baths' => 'nullable|numeric',
            'verandas' => 'nullable|numeric',
            'area' => 'nullable|numeric',
            'plot' => 'nullable|string|max:255',            
            'road_no' => 'nullable|string|max:255',            
            'block' => 'nullable|string|max:255',            
        ]);
         // Generate slug
       
        $data = Project::findOrFail($id);

        // Update the property details
        $data->update([
            'project_category_id' => $request->project_category_id,
            'type_id' => $request->type_id,
            'location_id' => $request->location_id,
            'status' => $request->status,
            'name' => $request->name,
            'short_title' => $request->short_title,
            'address' => $request->address,
            'overview' => $request->overview,
            'specification' => $request->specification,
            'amount' => $request->amount,
            'apartment_tour' => $request->apartment_tour,
            'virtual_experience' => $request->virtual_experience,
            'google_map' => $request->google_map,
            'beds' => $request->beds,
            'baths' => $request->baths,
            'verandas' => $request->verandas,
            'area' => $request->area,
            'plot' => $request->plot,
            'road_no' => $request->road_no,
            'block' => $request->block,
        ]);

      

        // Save the images to property_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'project/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;

                ProjectPivot::create([
                    'project_id' => $data->id,
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('projects-information.index')
            ->with('success', 'data updated successfully.');
    }


    public function deleteImage($id)
    {
        $image = ProjectPivot::findOrFail($id);

        // Delete the image from the public/project folder
        $imagePath = public_path('project/' . $image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }


    public function distroy($id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Delete associated images from the file system and database
        foreach ($project->images as $pivot) {
            $imagePath = public_path('project/' . $pivot->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            $pivot->delete(); // Delete the pivot record
        }

        // Delete the project
        $project->delete();

        return redirect()->route('projects-information.index')
            ->with('success', 'Project deleted successfully.');
    }


    public function view($id)
    {
        $data = Project::find($id);
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
