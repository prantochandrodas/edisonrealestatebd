<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TeamController extends Controller
{
    public function index()
    {
        return view('backend.about_us.team.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Team::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('teams.edit', $row->id);
                    $deleteUrl = route('teams.distroy', $row->id);

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
        return view('backend.about_us.team.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about' => 'required|string|max:2000',
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

        Team::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'about' => $request->about,
            'image' => $imagePath ?? null,
        ]);

        return redirect()->route('teams.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $data = Team::findOrFail($id);
        return view('backend.about_us.team.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'about' => 'required|string|max:2000',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $data = Team::findOrFail($id);

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

        return redirect()->route('teams.index')
            ->with('success', 'data updated successfully.');
    }



    public function distroy($id)
    {

        $data = Team::findOrFail($id);
        // Delete the image file if it exists
        $imagePath = public_path($data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $data->delete();
        return redirect()->route('teams.index')
            ->with('success', 'data deleted successfully.');
    } 

    public function view($id){
        $data = Team::find($id);
        if ($data) {
            $response = [
                'about' => $data->about
            ];
            // dd($response);
            return response()->json($response);
        } else {
            return response()->json([
                'success'=>false,
                'message' => 'data not found'
            ], 404);
        }
    }
}
