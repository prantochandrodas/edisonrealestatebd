<?php

namespace App\Http\Controllers\Backend\HomePage;

use App\Http\Controllers\Controller;
use App\Models\ScheduleMetting;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Http\Request;

class ScheduleMettingController extends Controller
{
    public function index(){
        $scheduleMetting=ScheduleMetting::all();
        return view('backend.home.schedule-metting.index',compact('scheduleMetting'));
    }

    public function getdata(Request $request){
        if($request->ajax()){
            $data=ScheduleMetting::all();
            return datatables($data)
            ->addColumn('action',function($row){
                $editUrl=route('schedule-mettings.edit',$row->id);
                $deleteUrl=route('schedule-mettings.distory',$row->id);


                $csrfToken=csrf_field();
                $methodField=method_field('DELETE');

                $editBtn="<a href='" .$editUrl. "' class='edit btn btn-primary btn-sm me-2'>Edit</a>";
                $deleteBtn = '
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . $csrfToken . '
                    ' . $methodField . '
                    <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                </form>';
                return $editBtn . ' ' . $deleteBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function create(){
        return view('backend.home.schedule-metting.create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|file|image|max:2048'
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $extention=$file->getClientOriginalExtension();
            $fileName=time() . '_' . '.' . $extention;
            $path='home/schedule-metting/';
            $file->move(public_path($path), $fileName);
            $imagePath=$path . $fileName;
        }

        ScheduleMetting::create([
            'title' => $request->title,
            'image' => $imagePath
        ]);

        return redirect()->route('schedule-mettings.index')->with('success','data added successful');
    }

    public function edit($id){
        $data=ScheduleMetting::findOrFail($id);
        return view('backend.home.schedule-metting.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|file|image|max:2048',
        ]);

        $slider = ScheduleMetting::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path($slider->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }

            // Store the new image
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $slider->image = $path . $filename;
        }

        $slider->title = $request->title;
        $slider->save();

        return redirect()->route('schedule-mettings.index')
            ->with('success', 'Slider updated successfully.');
    }

    public function distroy($id)
    {
        
        $slider = ScheduleMetting::findOrFail($id);

        // Delete the image file if it exists
        $imagePath = public_path($slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();

        return redirect()->route('schedule-mettings.index')->with('success','data added deleted'); 
    }

}
