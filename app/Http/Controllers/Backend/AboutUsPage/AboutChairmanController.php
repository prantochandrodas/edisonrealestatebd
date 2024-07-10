<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutChairman;
use Illuminate\Http\Request;

class AboutChairmanController extends Controller
{
    public function index(){
        $data=AboutChairman::first();
        return view('backend.about_us.about_chairman.index',compact('data'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'title' => 'required|string|max:200',
            'name' => 'required|string|max:200',
            'company_information' => 'required|string|max:2000',
            'chairman_image' => 'nullable|image|file|max:2048',
            'chairman_information' => 'required|string|max:2000',
            'institute_logo' => 'nullable|image|file|max:2048',
            'reference' => 'required|string',
        ]);

        $data=AboutChairman::findOrFail($id);
    //    chairman image  
        if($request->hasFile('chairman_image')){
            $oldImagePath=public_path($data->chairman_image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }

              // Store the new image
              $file = $request->file('chairman_image');
              $extension = $file->getClientOriginalExtension();
              $filename = time() . '_' . '.' . $extension;
              $path = 'about/chairman-image/';
              $file->move(public_path($path), $filename);
              $data->chairman_image = $path . $filename;
        }

        // institute_logo
        if($request->hasFile('institute_logo')){
            $oldImagePath=public_path($data->institute_logo);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }

              // Store the new image
              $file = $request->file('institute_logo');
              $extension = $file->getClientOriginalExtension();
              $filename = time() . '_' . '.' . $extension;
              $path = 'about/institute-logo/';
              $file->move(public_path($path), $filename);
              $data->institute_logo = $path . $filename;
        }

        $data->title=$request->title;
        $data->name=$request->name;
        $data->company_information=$request->company_information;
        $data->chairman_information=$request->chairman_information;

        $data->save();
        return redirect()->route('about-chairmans.index')->with('data updated successfull');

    }

}
