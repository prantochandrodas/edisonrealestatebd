<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutChairman;
use Illuminate\Http\Request;

class AboutChairmanController extends Controller
{
    public function index(){
        $data=AboutChairman::all();
        return view('backend.about_us.about_chairman.index',compact('data'));
    }

    public function create(){
        return view('backend.about_us.about_chairman.create');
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=AboutChairman::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('about-chairmans.edit',$row->id);
                $deleteUrl=route('about-chairmans.distroy',$row->id);

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

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:200',
            'name' => 'required|string|max:200',
            'company_information' => 'required|string|max:2000',
            'chairman_image' => 'required|image|file|max:2048',
            'chairman_information' => 'required|string|max:2000',
            'institute_logo' => 'required|image|file|max:2048',
            'reference' => 'required|string',
        ]);


        if($request->hasFile('chairman_image')){
            $file = $request->file('chairman_image');
            $extention = $file->getClientOriginalExtension();
            $fileName = time().'_'.'_'.$extention;
            $path='about/about-chairman-image/';
            $file->move(public_path($path),$fileName);
            $imagePath1=$path.$fileName;
        }

        if($request->hasFile('institute_logo')){
            $file = $request->file('institute_logo');
            $extention = $file->getClientOriginalExtension();
            $fileName = time().'_'.'_'.$extention;
            $path='about/institute-logo/';
            $file->move(public_path($path),$fileName);
            $imagePath2=$path.$fileName;
        }

        AboutChairman::create([
            'title' => $request->title,
            'name' => $request->name,
            'company_information' => $request->company_information,
            'chairman_information' => $request->chairman_information,
            'chairman_image' => $imagePath1,
            'institute_logo' => $imagePath2,
            'reference' => $request->reference,
        ]);


        return redirect()->route('about-chairmans.index')->with('success','data added successfull');
    }

    public function edit($id){
        $data=AboutChairman::findOrFail($id);

        return view('backend.about_us.about_chairman.edit',compact('data'));
    }
    

}
