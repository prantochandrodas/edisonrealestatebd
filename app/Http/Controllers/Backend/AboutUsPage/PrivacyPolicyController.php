<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\PrivacyPolicy;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PrivacyPolicyController extends Controller
{
    public function index(){
        $data = PrivacyPolicy::first();
        return view('backend.about_us.privacy_policy.index', compact('data'));
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
