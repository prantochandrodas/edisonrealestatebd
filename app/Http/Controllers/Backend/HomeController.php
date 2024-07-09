<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FeaturedProject;
use App\Models\ScheduleMetting;
use App\Models\slider;
use App\Models\Testimonial;
use App\Models\TestimonialPost;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{

    // home page slider

    public function sliderIndex()
    {
        return view('backend.home.slider.index');
    }



    // get slider 
    public function getSliders(Request $request)
    {

        if ($request->ajax()) {
            $data = slider::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('slider.edit', $row->id);
                    $deleteUrl = route('slider.distory', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
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


    // create slider 
    public function createSlider()
    {
        return view('backend.home.slider.create');
    }


    // store slider 
    public function storeSlider(Request $request)
    {

        $request->validate([
            'image' => 'required|file|image|max:2048',
            'heading' => 'required|string|max:255',
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'home/slider/';
            $file->move(public_path($path), $filename);
            $imagePath = $path . $filename;
        }

        slider::create([
            'image' => $imagePath ?? null,
            'heading' => $request->heading,
        ]);

        return redirect()->route('slider.index')
            ->with('success', 'Slider created successfully.');
    }


    // edit slider 
    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.home.slider.edit', compact('slider'));
    }


    // update slider 
    public function updateSlider(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|file|image|max:2048',
            'heading' => 'required|string|max:255',
        ]);

        $slider = Slider::findOrFail($id);

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

        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('slider.index')
            ->with('success', 'Slider updated successfully.');
    }


    // distroy slider 
    public function distorySlider($id)
    {

        $slider = slider::findOrFail($id);

        // Delete the image file if it exists
        $imagePath = public_path($slider->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $slider->delete();

        return redirect()->route('slider.index')
            ->with('success', 'Slider deleted successfully.');
    }

    // featured Project index 
    public function featuredProjectindex()
    {
        $featuredProjects = FeaturedProject::all();
        return view('backend.home.featured_project.index', compact('featuredProjects'));
    }

    //get getFeaturedProject
    public function getFeaturedProject(Request $request)
    {

        if ($request->ajax()) {
            $data = FeaturedProject::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('featured-project.edit', $row->id);
                    $deleteUrl = route('featured-project.distory', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
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

    // create featured project 

    public function createFeaturedProject()
    {
        return view('backend.home.featured_project.create');
    }

    //store featured project
    public function storeFeaturedProject(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        FeaturedProject::create([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);

        return redirect()->route('featured-project.index')
            ->with('success', 'Slider created successfully.');
    }

    //edit featured project
    public function editFeaturedProject($id)
    {
        $featureProject = FeaturedProject::findOrFail($id);
        return view('backend.home.featured_project.edit', compact('featureProject'));
    }

    // update Featured Project
    public function updateFeaturedProject(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        $slider = FeaturedProject::findOrFail($id);



        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('featured-project.index')
            ->with('success', 'Featured project updated successfully.');
    }


    // distroy featured project 
    public function distoryFeaturedProject($id)
    {

        $slider = FeaturedProject::findOrFail($id);
        $slider->delete();

        return redirect()->route('featured-project.index')
            ->with('success', 'Featured Project title and heading deleted successfully.');
    }

    //Testimonial


    // index of Testimonial
    public function indexTestimonial()
    {
        $testimonials = Testimonial::all();
        return view('backend.home.testimonial.index', compact('testimonials'));
    }


    // get Testimonial
    public function getTestimonial(Request $request)
    {

        if ($request->ajax()) {
            $data = Testimonial::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('testimonials.edit', $row->id);
                    $deleteUrl = route('testimonials.distory', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
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

    // create Testimonial
    public function createTestimonial()
    {
        return view('backend.home.testimonial.create');
    }


    // store Testimonial
    public function storeTestimonial(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        Testimonial::create([
            'title' => $request->title,
            'heading' => $request->heading,
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'data created successfully.');
    }

    // edit testimonial 
    public function editTestimonial($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        return view('backend.home.testimonial.edit', compact('testimonial'));
    }

    // update testimonial
    public function updateTestimonial(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
        ]);

        $slider = Testimonial::findOrFail($id);



        $slider->title = $request->title;
        $slider->heading = $request->heading;
        $slider->save();

        return redirect()->route('testimonials.index')
            ->with('success', 'Featured project updated successfully.');
    }


    // distroy testimonial
    public function distoryTestimonial($id)
    {

        $slider = Testimonial::findOrFail($id);
        $slider->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'data deleted successfully.');
    }

    //  TestimonialPost index
    public function indexTestimonialPost(){
        $testimonials=Testimonial::all();
        return view('backend.home.testimonial.index',compact('testimonials'));
    }


    // getTestimonialPost 
    public function getTestimonialPost(Request $request)
    {

        if ($request->ajax()) {
            $data = TestimonialPost::all();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('testimonials.edit', $row->id);
                    $deleteUrl = route('testimonials.distory', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");
                    
                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
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

    // TestimonialPost create 
    public function createTestimonialPost(){
        return view('backend.home.testimonial.post_create');
    }

    // TestimonialPost store 
    public function storeTestimonialPost(Request $request)
    {
        $request->validate([
            'video' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_title' => 'required|string|max:255'
        ]);
       

        TestimonialPost::create([
            'video' => $request->video,
            'title' => $request->title,
            'description' => $request->description,
            'owner_name' => $request->owner_name,
            'owner_title' => $request->owner_title,
        ]);

        return redirect()->route('testimonials.index')
            ->with('success', 'Data added successfully.');
    }

    // TestimonialPost edit 
    public function editTestimonialPost($id)
    {
        $post = TestimonialPost::findOrFail($id);
        return view('backend.home.testimonial.post_edit', compact('post'));
    }

    // TestimonialPost update 
    public function updateTestimonialPost(Request $request, $id)
    {
        $request->validate([
            'video' => 'required|string',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'owner_name' => 'required|string|max:255',
            'owner_title' => 'required|string|max:255'
        ]);

        $post = TestimonialPost::findOrFail($id);

      

        $post->video = $request->video;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->owner_name = $request->owner_name;
        $post->owner_title = $request->owner_title;
        $post->save();

        return redirect()->route('testimonials.index')
            ->with('success', 'data updated successfully.');
    }


    // TestimonialPost distroy 
    public function distroyTestimonialPost($id){
        $post=TestimonialPost::findOrFail($id);
        $post->delete();
        return redirect()->route('testimonials.index');
    }


    // ScheduleMetting index 
    public function indexScheduleMetting(){
        $scheduleMetting=ScheduleMetting::all();
        return view('backend.home.schedule-metting.index',compact('scheduleMetting'));
    }

       // get ScheduleMetting index 
    public function getScheduleMetting(Request $request){
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

    // ScheduleMetting create
    public function createScheduleMetting(){
        return view('backend.home.schedule-metting.create');
    }

    // ScheduleMetting index 
    public function storeScheduleMetting(Request $request){
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

    public function editScheduleMetting($id){
        $data=ScheduleMetting::findOrFail($id);
        return view('backend.home.schedule-metting.edit',compact('data'));
    }

    public function updateScheduleMetting(Request $request, $id)
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

    public function distroyScheduleMetting($id)
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
