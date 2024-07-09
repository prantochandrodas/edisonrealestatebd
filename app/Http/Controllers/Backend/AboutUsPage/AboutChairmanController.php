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
                $editUrl=route('about-chairmans.edit');
                $editBtn='<a href="'. $editUrl .'" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                return $editBtn;
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
            $path='about/chairman-image/';
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

    public function edit(){
        $data=AboutChairman::first();

        return view('backend.about_us.about_chairman.edit',compact('data'));
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


    public function view($id)
    {
        
        $data = AboutChairman::find($id);
        if ($data) {
            $response = [
                'id' => $data->id,
                'company_information' => $data->company_information,
                'chairman_information' => $data->chairman_information,
                
            ];
            // dd($response);
            return response()->json($response);
        } else {
            return response()->json([
                'success'=>false,
                'message' => 'data not found'
            ], 404);
        }
    }

    public function distroy($id){
        $data=AboutChairman::findOrFail($id);
        
        $imagePath1=public_path($data->chairman_image);
        if(file_exists($imagePath1)){
            unlink($imagePath1);
        }

        $imagePath2=public_path($data->institute_logo);
        if(file_exists($imagePath2)){
            unlink($imagePath2);
        }

        $data->delete();
        return redirect()->back()->with('success','data deleted successfull');
    }

}
