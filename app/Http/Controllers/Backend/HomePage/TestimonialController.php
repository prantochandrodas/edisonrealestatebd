<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('backend.home.testimonial.index',compact('testimonials'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Testimonial::all();
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
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);
        
        Testimonial::create([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.home.testimonial.edit', compact('testimonial'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        $slider = Testimonial::findOrFail($id);

       

        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('testimonials.index')
            ->with('success', 'Featured project updated successfully.');
    }



    public function distory($id)
    {
        
        $slider = Testimonial::findOrFail($id);
        $slider->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'data deleted successfully.');
    }
}
