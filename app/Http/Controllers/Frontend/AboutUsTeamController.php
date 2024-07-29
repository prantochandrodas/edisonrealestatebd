<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\DreamTeam;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\TeamBanner;

class AboutUsTeamController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $teams=Team::all();
        $dreamTeam=DreamTeam::first();
        $banner=TeamBanner::first();
        return view('frontend.about_us.team',compact('banner','socialLink','application','teams','dreamTeam'));
    }
}
