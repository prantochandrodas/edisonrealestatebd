<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrivacyPolicyController extends Controller
{
    public function index(){
        return view('backend.about_us.privacy_policy.index');
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = PrivacyPolicy::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('privacy-policys.edit');
                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                    return $editBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function edit()
    {
        $data = PrivacyPolicy::first();
        return view('backend.about_us.privacy_policy.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string',
        ]);

        $data = PrivacyPolicy::findOrFail($id);
        $data->description = $request->description;
        $data->save();

        return redirect()->route('privacy-policys.index')
            ->with('success', 'data updated successfully.');
    }

}
