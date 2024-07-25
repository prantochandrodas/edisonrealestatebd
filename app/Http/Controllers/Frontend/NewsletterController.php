<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterBanner;
use App\Models\NewsLetterPost;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $newsletterBanner=NewsletterBanner::first();
        $newsletterPost=NewsLetterPost::all();
        return view('frontend.newsletters.index',compact('newsletterBanner','newsletterPost'));
    }
}
