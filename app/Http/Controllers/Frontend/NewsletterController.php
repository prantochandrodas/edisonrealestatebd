<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\NewsletterBanner;
use App\Models\NewsLetterPost;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $newsletterBanner=NewsletterBanner::first();
        $newsletterPost=NewsLetterPost::all();
        return view('frontend.newsletters.index',compact('socialLink','newsletterBanner','newsletterPost','application'));
    }
}
