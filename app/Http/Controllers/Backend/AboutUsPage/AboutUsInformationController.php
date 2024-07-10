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

    public function update(Request $request, $id){

        $data=AboutUsInformation::findOrFail($id);
        $data->short_description_title=$request->short_description_title;
        $data->short_description=$request->short_description;
        $data->long_description_title=$request->long_description_title;
        $data->long_description=$request->long_description;
        $data->video_url=$request->video_url;
        $data->save();
        return redirect()->route('about-us-infos.index')->with('success','successfully updated');
    }

  
}
