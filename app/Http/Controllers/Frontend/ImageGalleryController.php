<?php

namespace App\Http\Controllers\Frontend;
use App\Models\ImageGalleryBanner;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ImagegalleryPost;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner=ImageGalleryBanner::first();
        $post = ImagegalleryPost::all();
        return view('frontend.image-gallerys.index',compact('socialLink','banner','post','application'));
    }
}
