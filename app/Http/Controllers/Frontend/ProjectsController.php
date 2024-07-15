<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectLocation;
use App\Models\ProjectPageBanner;
use App\Models\Projectype;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects=Project::all();
        $banner=ProjectPageBanner::first();
        $projectCategories=ProjectCategory::all();
        $projectType=Projectype::all();
        $projectLocation=ProjectLocation::all();
        return view('frontend.project.index',compact('projects','banner','projectCategories','projectType','projectLocation'));
    }

    public function projectDetails($slug){
        $data = Project::where('slug', $slug)->firstOrFail();

        if($data){
            return view('frontend.project.project_details',compact('data'));
        }
    }
}
