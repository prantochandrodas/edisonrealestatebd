<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use App\Models\InvestorInformation;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ScheduleMetting;
use App\Models\slider;
use App\Models\Team;
use App\Models\TestimonialPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $projectCategories=ProjectCategory::all();
        $sliders=slider::all();
        $aboutCompanyInformation=AboutUsInformation::first();
        $ongoingProjects=Project::with('images')->where('project_category_id',1)->get();
        $upcomingProjects=Project::with('images')->where('project_category_id',2)->get();
        $handedOverProjects=Project::with('images')->where('status','HandedOver')->get();
        $testimonials=TestimonialPost::all();
        $investorInformation=InvestorInformation::first();
        $ScheduleMettings=ScheduleMetting::first();
       
        return view('frontend.home.index',compact('projectCategories','sliders','aboutCompanyInformation','ongoingProjects','upcomingProjects','handedOverProjects','testimonials','investorInformation','ScheduleMettings'));
    }
}
