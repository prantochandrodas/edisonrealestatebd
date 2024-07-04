<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProject;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class FeaturedProjectController extends Controller
{
    public function index()
    {
        $featuredProjects=FeaturedProject::all();
        return view('backend.home.featured_project.index',compact('featuredProjects'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = FeaturedProject::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('featured_project.edit', $row->id);
                    $deleteUrl = route('featured_project.distory', $row->id);

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
        return view('backend.home.featured_project.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);
        
        FeaturedProject::create([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);

        return redirect()->route('featured_project.index')
            ->with('success', 'Slider created successfully.');
    }


    public function edit($id)
    {
        $featureProject = FeaturedProject::findOrFail($id);
        return view('backend.home.featured_project.edit', compact('featureProject'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        $slider = FeaturedProject::findOrFail($id);

       

        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('featured_project.index')
            ->with('success', 'Featured project updated successfully.');
    }



    public function distory($id)
    {
        
        $slider = FeaturedProject::findOrFail($id);
        $slider->delete();

        return redirect()->route('featured_project.index')
            ->with('success', 'Featured Project title and heading deleted successfully.');
    }
}
