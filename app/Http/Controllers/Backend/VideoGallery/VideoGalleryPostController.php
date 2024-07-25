<?php

namespace App\Http\Controllers\Backend\VideoGallery;

use App\Http\Controllers\Controller;
use App\Models\VideoGalleryPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class VideoGalleryPostController extends Controller
{
    public function index()
    {
        return view('backend.gallery.video-gallery.video-gallery-posts.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = VideoGalleryPost::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    $firstImage = $row->image;
                    if ($firstImage) {
                        return asset('video-gallery-thumbnail-image/' . $firstImage); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('video-gallery-posts.edit', $row->id);
                    $deleteUrl = route('video-gallery-posts.distroy', $row->id);

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
        return view('backend.gallery.video-gallery.video-gallery-posts.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,jpg,gif,svg|max:2048',
            'video_url' => 'required|string'
        ]);


        // image 
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'video-gallery-thumbnail-image/';
            $file->move(public_path($path), $fileName);
            $imagePath = $fileName;
        }

        // Save the project data
        VideoGalleryPost::create([
            'title' => $request->title,
            'image' => $imagePath,
            'video_url' => $request->video_url
        ]);
        return redirect()->route('video-gallery-posts.index')
            ->with('success', 'data created successfully.');
    }

    public function edit($id)
    {
        $data = VideoGalleryPost::find($id);
        return view('backend.gallery.video-gallery.video-gallery-posts.edit', compact('data'));
    }




    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpg,gif,svg|max:2048',
            'video_url' => 'required|string'
        ]);
        // Generate slug

        // find post with id 
        $data = VideoGalleryPost::findOrFail($id);

        $imagePath = $data->image; // Initialize with existing image

        // unlink thumbnail image and add new image 
        if ($request->hasFile('image')) {
            $oldImagePath = public_path('video-gallery-thumbnail-image/'.$data->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'video-gallery-thumbnail-image/';
            $file->move(public_path($path), $fileName);
            $imagePath = $fileName;
        }
         // Update the image-gallery-post details
         $data->update([
            'title' => $request->title,
            'image' => $imagePath,
            'video_url' => $request->video_url
        ]);


        return redirect()->route('video-gallery-posts.index')
            ->with('success', 'data updated successfully.');
    }

   public function distroy($id)
    {
        // Find the project by ID
        $post = VideoGalleryPost::findOrFail($id);


        $oldImagePath = public_path('video-gallery-thumbnail-image/'.$post->image);
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

       
        // Delete the data
        $post->delete();

        return redirect()->route('video-gallery-posts.index')
            ->with('success', 'data deleted successfully.');
    }
}
