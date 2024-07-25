<?php

namespace App\Http\Controllers\Backend\Imagegallery;

use App\Http\Controllers\Controller;
use App\Models\ImagegalleryPost;
use App\Models\ImagegalleryPostImages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ImagegalleryPostController extends Controller
{
    public function index()
    {
        return view('backend.gallery.image-gallery.image-gallery-posts.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = ImagegalleryPost::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    $firstImage = $row->thumbnail_image;
                    if ($firstImage) {
                        return asset('image-gallery-thumbnail-image/' . $firstImage); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('imagegallery-posts.edit', $row->id);
                    $deleteUrl = route('imagegallery-posts.distroy', $row->id);

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
        return view('backend.gallery.image-gallery.image-gallery-posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_image' => 'nullable|image|mimes:png,jpg,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        // thumpnail_image 
        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'image-gallery-thumbnail-image/';
            $file->move(public_path($path), $fileName);
            $thumbnail_image_imagePath = $fileName;
        }

        // Save the project data
        $post = ImagegalleryPost::create([
            'title' => $request->title,
            'thumbnail_image' => $thumbnail_image_imagePath
        ]);

        // Save the images to project_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'image-gallery-images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;

                ImagegalleryPostImages::create([
                    'post_id' => $post->id,
                    'image' => $imagePath
                ]);
            }
        }


        return redirect()->route('imagegallery-posts.index')
            ->with('success', 'data created successfully.');
    }
    public function edit($id)
    {
        $data = ImagegalleryPost::find($id);

        return view('backend.gallery.image-gallery.image-gallery-posts.edit', compact('data'));
    }




    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail_image' => 'nullable|image|mimes:png,jpg,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Generate slug

        // find post with id 
        $data = ImagegalleryPost::findOrFail($id);

        $thumbnail_image_imagePath = $data->thumbnail_image; // Initialize with existing image
        // unlink thumbnail image and add new image 
        if ($request->hasFile('thumbnail_image')) {
            $oldImagePath = public_path('image-gallery-thumbnail-image/' . $data->thumbnail_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $file = $request->file('thumbnail_image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'image-gallery-thumbnail-image/';
            $file->move(public_path($path), $fileName);
            $thumbnail_image_imagePath = $fileName;
        }
        // Update the image-gallery-post details
        $data->update([
            'title' => $request->title,
            'thumbnail_image' => $thumbnail_image_imagePath
        ]);


        // Save the images to image-gallery-post table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'image-gallery-images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;

                ImagegalleryPostImages::create([
                    'post_id' => $data->id,
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('imagegallery-posts.index')
            ->with('success', 'data updated successfully.');
    }


    public function deleteImage($id)
    {
        $image = ImagegalleryPostImages::findOrFail($id);

        // Delete the image from the public/project folder
        $imagePath = public_path('image-gallery-images/' . $image->image);
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
        $post = ImagegalleryPost::findOrFail($id);


        $oldImagePath = public_path('image-gallery-thumbnail-image/' . $post->thumbnail_image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // Delete associated images from the file system and database
        foreach ($post->images as $pivot) {
            $imagePath = public_path('image-gallery-images/' . $pivot->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            $pivot->delete(); // Delete the pivot record
        }

        // Delete the data
        $post->delete();

        return redirect()->route('imagegallery-posts.index')
            ->with('success', 'data deleted successfully.');
    }
}
