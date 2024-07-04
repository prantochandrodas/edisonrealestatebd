<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutus;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeAboutusController extends Controller
{
    public function index()
    {   
        $about=HomeAboutus::all();
        return view('backend.home.aboutus.index',compact('about'));
    }


    public function getAbout(Request $request)
    {

        if ($request->ajax()) {
            $data = HomeAboutus::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('home_about.edit', $row->id);
                    $deleteUrl = route('home_about.distory', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");
                    $viewBtn = '<button data-id="' . $row->id . '" class="view ms-2 btn btn-primary btn-sm">View</button>';
                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                    $deleteBtn = '
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                            ' . $csrfToken . '
                            ' . $methodField . '
                            <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                        </form>';

                    return $editBtn . ' ' . $deleteBtn . ' ' . $viewBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }


    public function create()
    {
        return view('backend.home.aboutus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|string',
        ]);

        HomeAboutus::create($request->all());

        return redirect()->route('home_about.index')
            ->with('success', 'About created successfully.');
    }

    public function edit($id)
    {
        $homeabout = HomeAboutus::findOrFail($id);
        return view('backend.home.aboutus.edit', compact('homeabout'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'video' => 'nullable|string',
        ]);
        

        $homeabout = HomeAboutus::findOrFail($id);
        $homeabout->title = $request->title;
        $homeabout->heading = $request->heading;
        $homeabout->description = $request->description;
        $homeabout->video = $request->video;

        $homeabout->save();

        return redirect()->route('home_about.index')
            ->with('success', 'About updated successfully.');
    }

    public function destroy($id)
    {
        $homeabout = HomeAboutus::findOrFail($id);
        $homeabout->delete();

        return redirect()->route('home_about.index')
            ->with('success', 'About deleted successfully.');
    }

    public function view($id)
    {
        // dd($id);
        $homeAboutus = HomeAboutus::find($id);
        if ($homeAboutus) {
            $response = [
                'id' => $homeAboutus->id,
                'title' => $homeAboutus->title,
                'heading' => $homeAboutus->heading,
                'description' => $homeAboutus->description,
                'video' => $homeAboutus->video,
            ];
            // dd($response);
            return response()->json($response);
        } else {
            return response()->json([
                'success'=>false,
                'message' => 'Expense not found'
            ], 404);
        }
    }
}
