<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\Purpose;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PurposeController extends Controller
{
    public function index()
    {
        $data = Purpose::all();
        return view('backend.about_us.purpose.index', compact('data'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Purpose::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('purposes.edit', $row->id);
                    $deleteUrl = route('purposes.distroy', $row->id);

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
        return view('backend.about_us.purpose.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
        ]);

        Purpose::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('purposes.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $data = Purpose::findOrFail($id);
        return view('backend.about_us.purpose.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $data = Purpose::findOrFail($id);



        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();

        return redirect()->route('purposes.index')
            ->with('success', 'data updated successfully.');
    }



    public function distroy($id)
    {

        $data = Purpose::findOrFail($id);
        if ($data) {
            $data->delete();
            return redirect()->route('purposes.index')
                ->with('success', 'data deleted successfully.');
        }else{
            return redirect()->back('error','data not found');
        }
    }
}
