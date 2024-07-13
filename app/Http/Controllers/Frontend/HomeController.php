<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use App\Models\Project;
use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $sliders=slider::all();
        $aboutCompanyInformation=AboutUsInformation::first();
        $ongoingProjects=Project::with('images')->where('project_category_id',1)->get();
        $upcomingProjects=Project::with('images')->where('project_category_id',2)->get();
        $handedOverProjects=Project::with('images')->where('status','HandedOver')->get();
        return view('frontend.home.index',compact('sliders','aboutCompanyInformation','ongoingProjects','upcomingProjects','handedOverProjects'));
    }
}
