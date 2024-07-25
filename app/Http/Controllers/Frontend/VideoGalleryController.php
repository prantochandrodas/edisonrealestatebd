<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VideoGalleryBanner;
use App\Models\VideoGalleryPost;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index(){
        $banner=VideoGalleryBanner::first();
        $post=VideoGalleryPost::all();
        return view('frontend.video-gallerys.index',compact('banner','post'));
    }
}
