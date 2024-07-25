<?php

namespace App\Http\Controllers\Backend\Newsletter;

use App\Http\Controllers\Controller;
use App\Models\NewsLetterPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsletterPostController extends Controller
{
    public function index()
    {
        return view('backend.gallery.newsletter.newsletter-post.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = NewsLetterPost::all();
            return DataTables::of($data)
                ->addColumn('image', function ($row) {
                    $firstImage = $row->image;
                    if ($firstImage) {
                        return asset('newsletter-post/' . $firstImage); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('newsletter-posts.edit', $row->id);
                    $deleteUrl = route('newsletter-posts.distroy', $row->id);

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
        return view('backend.gallery.newsletter.newsletter-post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|file|max:2048',
            'pdf' => 'required|file'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'newsletter-post/';
            $file->move(public_path($path), $fileName);
            $imagePath = $fileName;
        }

        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $extention = $file->getClientOriginalExtension();
            $fileName = time() . '_' . '_' . $extention;
            $path = 'newsletter-post-pdf/';
            $file->move(public_path($path), $fileName);
            $pdfPath = $fileName;
        }


        NewsLetterPost::create([
            'image' => $imagePath ?? null,
            'pdf' => $pdfPath ?? null
        ]);

        return redirect()->route('newsletter-posts.index')
            ->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $post = NewsLetterPost::findOrFail($id);
        return view('backend.gallery.newsletter.newsletter-post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|file|max:2048',
            'pdf' => 'nullable|file'
        ]);

        $post = NewsLetterPost::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('newsletter-post/' . $post->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }


            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '_' . $extension;
            $path = 'newsletter-post/';
            $file->move(public_path($path), $filename);
            $post->image = $filename;
        }
        if ($request->hasFile('pdf')) {
            // Delete the old image
            $oldImagePath = public_path('newsletter-post-pdf/' . $post->pdf);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            // store the new pdf 
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '_' . $extension;
            $path = 'newsletter-post-pdf/';
            $file->move(public_path($path), $filename);
            $post->pdf = $filename;
        }
        $post->save();

        return redirect()->route('newsletter-posts.index')
            ->with('success', 'data updated successfully.');
    }


    public function distroy($id)
    {
        $post = NewsLetterPost::findOrFail($id);
        // Delete the image file if it exists
        $imagePath = public_path('newsletter-post/'. $post->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $pdfPath = public_path('newsletter-post-pdf/'. $post->pdf);
        if (file_exists($pdfPath)) {
            unlink($pdfPath);
        }
        $post->delete();
        return redirect()->route('newsletter-posts.index');
    }
}
