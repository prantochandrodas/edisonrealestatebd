<?php

namespace App\Http\Controllers\Backend\Career;

use App\Http\Controllers\Controller;
use App\Models\CareerJobPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CareerJobPostController extends Controller
{
    public function index()
    {
        return view('backend.career.career-job-posts.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = CareerJobPost::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('job-posts.edit', $row->id);
                    $deleteUrl = route('job-posts.distroy', $row->id);

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
        return view('backend.career.career-job-posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'vacancy' => 'required|integer',
            'employment_status' => 'required|string |max:1000',
            'experience' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        
        

        CareerJobPost::create([
            'title' => $request->title,
            'vacancy' => $request->vacancy,
            'employment_status' => $request->employment_status,
            'experience' => $request->experience,
            'description' => $request->description,
        ]);

        return redirect()->route('job-posts.index')
            ->with('success', 'Data added successfully.');
    }

    public function edit($id)
    {
        $data = CareerJobPost::findOrFail($id);
        return view('backend.career.career-job-posts.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'vacancy' => 'nullable|numeric',
            'employment_status' => 'nullable|string |max:1000',
            'experience' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $post =CareerJobPost::findOrFail($id);

        $post->title = $request->title;
        $post->vacancy = $request->vacancy;
        $post->employment_status = $request->employment_status;
        $post->experience = $request->experience;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('job-posts.index')
            ->with('success', 'data updated successfully.');
    }


    public function distroy($id)
    {
        $post = CareerJobPost::findOrFail($id);
        $post->delete();
        return redirect()->route('job-posts.index');
    }
}
