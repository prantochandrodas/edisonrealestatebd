<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CareerBanner;
use App\Models\CareerDescription;
use App\Models\CareerJobPost;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $socialLink=SocialLink::all();
        $banner=CareerBanner::first();
        $description=CareerDescription::first();
        $jobpost=CareerJobPost::all();
        $application=Application::first();
        return view('frontend.careers.index',compact('socialLink','banner','description','jobpost','application'));
    }
}
