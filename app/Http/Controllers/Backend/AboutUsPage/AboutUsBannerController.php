<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutUsBanner;
use Illuminate\Http\Request;

class AboutUsBannerController extends Controller
{
    public function index(){
        $data=AboutUsBanner::all();
        return view ('backend.about_us.about_us_banner.index',compact('data'));
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=AboutUsBanner::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('about-us-banners.edit',$row->id);
                $deleteUrl=route('about-us-banners.distroy',$row->id);

                $csrfToken=csrf_field();
                $methodField=method_field('DELETE');

                $editBtn='<a href="'. $editUrl .'" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                $deleteBtn = '
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . $csrfToken . '
                    ' . $methodField . '
                    <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                </form>';
                return $editBtn .''.$deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function create(){
        return view('backend.about_us.about_us_banner.create');
    }


    public function store(Request $request){
        
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|file|max:2048'
        ]);

       if($request->hasFile('image')){
        $file=$request->file('image');
        $extention=$file->getClientOriginalExtension();
        $fileName=time() .'_'.'_'.$extention;
        $path='about/about-us-banner/';
        $file->move(public_path($path),$fileName);
        $imagePath=$path.$fileName;
       }

       AboutUsBanner::create([
        'title' => $request->title,
        'image' => $imagePath
       ]);

       return redirect()->route('about-us-banners.index')->with('success','data added successfull');
    }


    public function edit($id){
        $data=AboutUsBanner::findOrFail($id);
        return view('backend.about_us.about_us_banner.edit',compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|file|max:2048',
        ]);

        $data=AboutUsBanner::findOrFail($id);

        if($request->hasFile('image')){
            $oldImagePath=public_path($data->image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }


            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time() .'_'.'_'.$extention;
            $path='about/about-us-banner/';
            $file->move(public_path($path),$fileName);
            $data->image=$path . $fileName;
        }

        $data->title=$request->title;
        $data->save();
        return redirect()->route('about-us-banners.index')->with('success','successfully updated');
    }

    public function distroy($id){
        $data=AboutUsBanner::findOrFail($id);

        $imagePath = public_path($data->image);
        if(file_exists($imagePath)){
            unlink($imagePath);
        }

        $data->delete();
        return redirect()->route('about-us-banners.index')->with('success','data deleted successfull');
    }
}
