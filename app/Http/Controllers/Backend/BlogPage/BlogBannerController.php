<?php

namespace App\Http\Controllers\Backend\BlogPage;

use App\Http\Controllers\Controller;
use App\Models\BlogBanner;
use Illuminate\Http\Request;

class BlogBannerController extends Controller
{
    public function index(){
        $data=BlogBanner::all();
        return view ('backend.blog.blog_banner.index',compact('data'));
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=BlogBanner::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('blog-banners.edit',$row->id);
                $deleteUrl=route('blog-banners.distroy',$row->id);

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
        return view('backend.blog.blog_banner.create');
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
        $path='blog/blog-banner/';
        $file->move(public_path($path),$fileName);
        $imagePath=$path.$fileName;
       }

       BlogBanner::create([
        'title' => $request->title,
        'image' => $imagePath
       ]);

       return redirect()->route('blog-banners.index')->with('success','data added successfull');
    }


    public function edit($id){
        $data=BlogBanner::findOrFail($id);
        return view('backend.blog.blog_banner.edit',compact('data'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|file|max:2048',
        ]);

        $data=BlogBanner::findOrFail($id);

        if($request->hasFile('image')){
            $oldImagePath=public_path($data->image);
            if(file_exists($oldImagePath)){
                unlink($oldImagePath);
            }


            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time() .'_'.'_'.$extention;
            $path='blog/blog-banner/';
            $file->move(public_path($path),$fileName);
            $data->image=$path . $fileName;
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
