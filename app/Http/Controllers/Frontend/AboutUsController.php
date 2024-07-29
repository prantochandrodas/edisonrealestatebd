<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutChairman;
use App\Models\AboutUsBanner;
use App\Models\AboutUsInformation;
use App\Models\Application;
use App\Models\OurValues;
use App\Models\Purpose;
use App\Models\SocialLink;
use App\Models\Timeline;
use App\Models\Team;
use App\Models\Vision;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner=AboutUsBanner::first();
        $aboutCompanyInformation=AboutUsInformation::first();
        $purpose=Purpose::first();
        $vision=Vision::first();
        $ourvalues=OurValues::all();
        $chairman=AboutChairman::first();
        $timelines=Timeline::all();
        $teams=Team::all();
        return view('frontend.about_us.index',compact('socialLink','application','banner','aboutCompanyInformation','purpose','vision','ourvalues','chairman','timelines','teams'));
    }
}
