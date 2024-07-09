<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use Illuminate\Http\Request;

class AboutUsInformationController extends Controller
{
    public function index(){
        return view ('backend.about_us.information.index');
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=AboutUsInformation::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('about-us-infos.edit');
                $editBtn='<a href="'. $editUrl .'" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                return $editBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function edit(){
        $data=AboutUsInformation::first();
        return view('backend.about_us.information.edit',compact('data'));
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

    public function view($id)
    {
        
        $data = AboutUsInformation::find($id);
        if ($data) {
            $response = [
                'id' => $data->id,
                'short_description_title' => $data->short_description_title,
                'short_description' => $data->short_description,
                'long_description_title' => $data->long_description_title,
                'long_description' => $data->long_description,
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
}
