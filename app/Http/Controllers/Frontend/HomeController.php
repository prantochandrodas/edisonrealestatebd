<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUsInformation;
use App\Models\Application;
use App\Models\InvestorInformation;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ScheduleMetting;
use App\Models\slider;
use App\Models\SocialLink;
use App\Models\Team;
use App\Models\TestimonialPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $application=Application::first();
        $socialLink=SocialLink::all();

        $projectCategories = ProjectCategory::all();
        $sliders = slider::all();
        $aboutCompanyInformation = AboutUsInformation::first();
        $ongoingProjects = Project::with('images')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'ongoing');
            })
            ->get();
        $upcomingProjects = Project::with('images')
            ->whereHas('category', function ($query) {
                $query->where('slug', 'upcoming');
            })
            ->get();
        $handedOverProjects = Project::with('images')->where('status', 'HandedOver')->get();
        $testimonials = TestimonialPost::all();
        $investorInformation = InvestorInformation::first();
        $ScheduleMettings = ScheduleMetting::first();

        return view('frontend.home.index', compact('socialLink','application','projectCategories', 'sliders', 'aboutCompanyInformation', 'ongoingProjects', 'upcomingProjects', 'handedOverProjects', 'testimonials', 'investorInformation', 'ScheduleMettings'));
    }
}
