<?php

namespace App\Http\Controllers\Backend\BlogPage;

use App\Http\Controllers\Controller;
use App\Models\BlogBanner;
use Illuminate\Http\Request;

class BlogBannerController extends Controller
{
    public function index(){
        $data=BlogBanner::first();
        return view ('backend.blog.blog_banner.index',compact('data'));
    }


    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|file|max:2048',
        ]);

        $data=BlogBanner::findOrFail($id);

        if($request->hasFile('image')){
            $oldImagePath=public_path('blog/blog-banner/'.$data->image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }


            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time() .'_'.'_'.$extention;
            $path='blog/blog-banner/';
            $file->move(public_path($path),$fileName);
            $data->image= $fileName;
        }

        $data->title=$request->title;
        $data->save();
        return redirect()->route('blog-banners.index')->with('success','successfully updated');
    }

    public function distroy($id){
        $data=BlogBanner::findOrFail($id);

        $imagePath = public_path($data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $data->delete();
        return redirect()->route('blog-banners.index')->with('success','data deleted successfull');
    }
}
