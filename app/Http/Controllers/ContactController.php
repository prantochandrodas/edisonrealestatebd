<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\ContactBanner;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $socialLink=SocialLink::all();
        $application=Application::first();
        $banner=ContactBanner::first();
        $applicationInfo=Application::first();
        return view('frontend.contacts.index',compact('socialLink','application','banner','applicationInfo'));
    }
}
