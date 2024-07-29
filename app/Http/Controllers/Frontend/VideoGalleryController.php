<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\SocialLink;
use App\Models\VideoGalleryBanner;
use App\Models\VideoGalleryPost;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner=VideoGalleryBanner::first();
        $post=VideoGalleryPost::all();
        return view('frontend.video-gallerys.index',compact('socialLink','application','banner','post'));
    }
}
