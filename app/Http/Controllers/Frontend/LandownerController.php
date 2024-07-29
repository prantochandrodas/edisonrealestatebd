<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\LandownerBanner;
use App\Models\LandownerDescription;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class LandownerController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner=LandownerBanner::first();
        $description=LandownerDescription::first();
        return view('frontend.landowners.index',compact('socialLink','application','banner','description'));
    }
}
