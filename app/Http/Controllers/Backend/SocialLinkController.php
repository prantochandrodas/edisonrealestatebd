<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CareerJobPost;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SocialLinkController extends Controller
{
    public function index()
    {
        return view('backend.social-links.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = SocialLink::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('social-links.edit', $row->id);
                    $deleteUrl = route('social-links.distroy', $row->id);

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
        return view('backend.social-links.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|image|max:2048',
            'url' => 'required|string',
        ]);
        if ($request->hasFile('logo')) {
            // Store the new image
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'application/social-link/';
            $file->move(public_path($path), $filename);
            $imagePath = $filename;
        }


        SocialLink::create([
            'name' => $request->name,
            'logo' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('social-links.index')
            ->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $data = SocialLink::findOrFail($id);
        return view('backend.social-links.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'logo' => 'nullable|file|image|max:2048',
            'url' => 'required|string',
        ]);

        $data = SocialLink::findOrFail($id);
        if ($request->hasFile('logo')) {
            // Delete the old image
            $oldImagePath = public_path('application/social-link/' . $data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'application/social-link/';
            $file->move(public_path($path), $filename);
            $data->logo =$filename;
        }

        $data->name = $request->name;
        
        $data->url = $request->url;
        $data->save();

        return redirect()->route('social-links.index')
            ->with('success', 'data updated successfully.');
    }


    public function distroy($id)
    {
        $post = SocialLink::findOrFail($id);
        $post->delete();
        return redirect()->route('social-links.index');
    }
}
