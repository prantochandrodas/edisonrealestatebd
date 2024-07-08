<?php

namespace App\Http\Controllers\Backend\AboutUsPage;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use Illuminate\Http\Request;

class AboutUsInformationController extends Controller
{
    public function index(){
        $data=AboutUsInformation::all();
        return view ('backend.about_us.information.index',compact('data'));
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=AboutUsInformation::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('about-us-infos.edit',$row->id);
                $deleteUrl=route('about-us-infos.distroy',$row->id);

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
        return view('backend.about_us.information.create');
    }


    public function store(Request $request){
        // dd('hi');
        $request->validate([
            'short_description_title' => 'required|string|max:255',
            'short_description' => 'required|string|min:10|max:2000',
            'long_description_title' => 'required|string|max:255',
            'long_description' => 'required|string|min:10|max:5000',
            'video_url' => 'required|string',
        ]);


       AboutUsInformation::create([
        'short_description_title' => $request->short_description_title,
        'short_description' => $request->short_description,
        'long_description_title' => $request->long_description_title,
        'long_description' => $request->long_description,
        'video_url' => $request->video_url
       ]);

       return redirect()->route('about-us-infos.index')->with('success','data added successfull');
    }


    public function edit($id){
        $data=AboutUsInformation::findOrFail($id);
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

    public function distroy($id){
        $data=AboutUsInformation::findOrFail($id);
        $data->delete();
        return redirect()->route('about-us-infos.index')->with('success','data deleted successfull');
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
