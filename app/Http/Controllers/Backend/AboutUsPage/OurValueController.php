<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\OurValues;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OurValueController extends Controller
{
    public function index()
    {
        $data = OurValues::all();
        return view('backend.about_us.our_values.index', compact('data'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = OurValues::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('our-values.edit', $row->id);
                    $deleteUrl = route('our-values.distroy', $row->id);

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
        return view('backend.about_us.our_values.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'value' => 'required|string|max:255',
        ]);

        OurValues::create([
            'value' => $request->value,
        ]);

        return redirect()->route('our-values.index')
            ->with('success', 'data created successfully.');
    }


    public function edit($id)
    {
        $data = OurValues::findOrFail($id);
        return view('backend.about_us.our_values.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'value' => 'required|string|max:255',
        ]);
        $data = OurValues::findOrFail($id);
        $data->value = $request->value;
        $data->save();
        return redirect()->route('our-values.index')
            ->with('success', 'data updated successfully.');
    }



    public function distroy($id)
    {

        $data = OurValues::findOrFail($id);
        if ($data) {
            $data->delete();
            return redirect()->route('our-values.index')
                ->with('success', 'data deleted successfully.');
        }else{
            return redirect()->back('error','data not found');
        }
    } 
}
