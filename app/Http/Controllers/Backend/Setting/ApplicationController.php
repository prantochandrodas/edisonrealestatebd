<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        $data=Application::first();
        return view('backend.setting.Applications.index',compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'hotline' => 'required|numeric',
            'logo' => 'nullable|file|image|max:2048',
            'map' => 'required|string'
        ]);

        $data = Application::findOrFail($id);

        if ($request->hasFile('logo')) {
            // Delete the old image
            $oldImagePath = public_path('application/logo/'.$data->logo);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'application/logo/';
            $file->move(public_path($path), $filename);
            $data->logo = $filename;
        }

        if ($request->hasFile('footer_bg_image')) {
            // Delete the old image
            $oldImagePath = public_path('footer-background-image/'.$data->footer_bg_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('footer_bg_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'footer-background-image/';
            $file->move(public_path($path), $filename);
            $data->footer_bg_image = $filename;
        }

        $data->company_name = $request->company_name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->hotline = $request->hotline;
        $data->map = $request->map;
        $data->save();

        return redirect()->route('applications.index')
            ->with('success', 'data updated successfully.');
    }  
}
