<?php

namespace App\Http\Controllers\Frontend;
use App\Models\ImageGalleryBanner;
use App\Http\Controllers\Controller;
use App\Models\ImagegalleryPost;
use Illuminate\Http\Request;

class ImageGalleryController extends Controller
{
    public function index(){
        $banner=ImageGalleryBanner::first();
        $post = ImagegalleryPost::all();
        return view('frontend.image-gallerys.index',compact('banner','post'));
    }
}
