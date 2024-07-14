<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use Illuminate\Http\Request;

class AboutUsInformationController extends Controller
{
    public function index(){
        $data=AboutUsInformation::first();
        return view('backend.about_us.information.index',compact('data'));
    }

    public function update(Request $request){

        $data=AboutUsInformation::first();
        if ($request->hasFile('thumbnail_image')) {
            // Delete the old image
            $oldImagePath = public_path('about_us/thumbnail/'.$data->thumbnail_image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('thumbnail_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'about_us/thumbnail/';
            $file->move(public_path($path), $filename);
            $data->thumbnail_image = $filename;
        }

        $data->title=$request->title;
        $data->short_description=$request->short_description;
        $data->long_description=$request->long_description;
        $data->video_url=$request->video_url;
        $data->save();
        return redirect()->route('about-companys.index')->with('success','successfully updated');
    }

  
}
