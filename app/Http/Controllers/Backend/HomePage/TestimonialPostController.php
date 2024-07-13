<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\TestimonialPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimonialPostController extends Controller
{
    public function index()
    {

        return view('backend.home.testimonial.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = TestimonialPost::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('testimonials.edit', $row->id);
                    $deleteUrl = route('testimonials.distory', $row->id);

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
        return view('backend.home.testimonial.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'thumbnail_image' => 'nullable|image|file|max:2048',
            'video' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_title' => 'required|string|max:255'
        ]);

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'home/testimonial/';
            $file->move(public_path($path), $fileName);
            $imagePath = $fileName;
        }

        TestimonialPost::create([
            'thumbnail_image' => $imagePath,
            'video' => $request->video,
            'title' => $request->title,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'owner_title' => $request->owner_title,
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $post = TestimonialPost::findOrFail($id);
        return view('backend.home.testimonial.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'thumbnail_image' => 'nullable|image|file|max:2048',
            'video' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_title' => 'required|string|max:255'
        ]);

        $post = TestimonialPost::findOrFail($id);

        if ($request->hasFile('thumbnail_image')) {
            // Delete the old image
            $oldImagePath = public_path($post->image);
            if ($oldImagePath) {
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }


            // Store the new image
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '_' . $extension;
            $path = 'home/testimonial/';
            $file->move(public_path($path), $filename);
            $post->thumbnail_image = $filename;
        }

        $post->video = $request->video;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->owner_name = $request->owner_name;
        $post->owner_title = $request->owner_title;
        $post->save();

        return redirect()->route('testimonials.index')
            ->with('success', 'data updated successfully.');
    }


    public function distroy($id)
    {
        $post = TestimonialPost::findOrFail($id);
        $post->delete();
        return redirect()->route('testimonials.index');
    }
}
