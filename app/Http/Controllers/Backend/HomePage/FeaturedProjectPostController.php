<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProject;
use App\Models\FeaturedProjectPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeaturedProjectPostController extends Controller
{
    public function index(){
        $featuredProjects=FeaturedProject::all();
        return view('backend.home.featured_project.index',compact('featuredProjects'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = FeaturedProjectPost::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('featured-project-posts.edit', $row->id);
                    $deleteUrl = route('featured-project-posts.distory', $row->id);

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
    public function create(){
        return view('backend.home.featured_project.featured_post_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|image|max:2048',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'tour_status_link' => 'required|string|max:255',
            'virtual_experience_link' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/featuredPost/';
            $file->move(public_path($path), $filename);
            $imagePath = $path . $filename;
        }

        FeaturedProjectPost::create([
            'image' => $imagePath ?? null,
            'name' => $request->name,
            'location' => $request->location,
            'description' => $request->description,
            'tour_status_link' => $request->tour_status_link,
            'virtual_experience_link' => $request->virtual_experience_link,
        ]);

        return redirect()->route('featured-project-posts.index')
            ->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $post = FeaturedProjectPost::findOrFail($id);
        return view('backend.home.featured_project.featured_post_edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|file|image|max:2048',
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'tour_status_link' => 'required|string|max:255',
            'virtual_experience_link' => 'required|string|max:255',
        ]);

        $post = FeaturedProjectPost::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path($post->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $post->image = $path . $filename;
        }

        $post->name = $request->name;
        $post->description = $request->description;
        $post->location = $request->location;
        $post->tour_status_link = $request->tour_status_link;
        $post->virtual_experience_link = $request->virtual_experience_link;
        $post->save();

        return redirect()->route('featured-project-posts.index')
            ->with('success', 'data updated successfully.');
    }


    public function distroy($id){
        $post=FeaturedProjectPost::findOrFail($id);
        $imagePath=public_path($post->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }
        $post->delete();
        return redirect()->route('featured-project-posts.index');
    }
}
